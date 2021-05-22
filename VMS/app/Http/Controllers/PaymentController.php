<?php

namespace App\Http\Controllers;
use App\Config\paypal;
use Session;
use App\User;
use PayPal\Api\PaymentExecution;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use URL;
use Redirect;
use PayPal\Api\Details;
use Illuminate\Support\Facades\Hash;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;


class PaymentController extends Controller
{   
    private $apiContext;
    
    public function __construct(){

        $client_id='AQ-pfQX5Us0NdQJYpduRy5kh1JkUSxtcf4jlQGTXeoUhUoZohORi7c2mJJhkB9zUyMXKeMX6nNu-NNrQ';
        $secret ='EIJQYjkNkf_JFU5PfK0QtIWuCTMX3rdMZzrIp2XWnqi0mXJ67xwGCivg_gLjHR6Pdw-DbrQiuLKdQgD9';
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $client_id,$secret)
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function Paywithpaypal(Request $request){
    
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'Company_name' => ['required', 'string', 'max:40'],
            'Country' => ['required', 'string','max:25'],
            'Phone_number' => ['required', 'integer', 'max:99999999'],
            'Category_field' => ['required', 'string','max:255'],

        ]);
        
		$montant=$request->input('plan');
		$desc='Plan';
		//dd($reservation);
		$payer = new Payer();
        $payer->setPaymentMethod('paypal');
		$item_1 = new Item();
		$item_1->setName('Item 1') /** item name **/
            ->setCurrency('EUR')
            ->setQuantity(1)
            ->setPrice($montant); /** unit price **/
		$item_list = new ItemList();
        $item_list->setItems(array($item_1));
		$amount = new Amount();
        $amount->setCurrency('EUR')
            ->setTotal($montant);
		$transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription($desc);
            $name=$request->input('name');
            $email=$request->input('email');
            $Company_name=$request->input('Company_name');
            $Country=$request->input('Country');
            $Category_field=$request->input('Category_field');
            $Phone_number=$request->input('Phone_number');
            $plan=$request->input('plan');
            $password=Hash::make($request->input('password'));
		$redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl("http://127.0.0.1:8000/Status?name=$name&email=$email&Company_name=$Company_name&Country=$Country&Category_field=$Category_field&Phone_number=$Phone_number&plan=$plan&password=$password") /** Specify return URL **/
            ->setCancelUrl(URL::route('Status'));
		$payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
		$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PayPalConnectionException $ex) {
		if (\Config::get('app.debug')) {
	 	\Session::put('error', 'Session expirée');
     //           return Redirect::route('pay');
				return redirect('/cancelled')->with('error', ' Session expirée  ');

		} else {
		// \Session::put('error', 'erreur survenue');
        //        return Redirect::route('pay');
			 return redirect('/cancelled')->with('error', ' erreur survenue  ');

		}
		}
		foreach ($payment->getLinks() as $link) {
		if ($link->getRel() == 'approval_url') {
		$redirect_url = $link->getHref();
                break;
		}
		}
		/** add payment ID to session **/
        $paypal_payment_id=$payment->getId();
        Session::put('paypal_payment_id',$paypal_payment_id );
		if (isset($redirect_url)) {
		/** redirect to paypal **/
            return Redirect::away($redirect_url);
		}
	//	\Session::put('error', 'Erreur survenue');
    //    return Redirect::route('pay');
	 return redirect('/cancelled')->with('error', ' erreur survenue  ');

       
      
            
        }
    function Status(Request $request){
        //dd($reservation);

    /** Get the payment ID before session clear **/
    $payment_id =Session::GET('paypal_payment_id');   

    /** clear the session payment ID **/
    Session::forget('paypal_payment_id');
    if (empty($request->get('PayerID')) || empty($request->get('token'))) {
     \Session::put('error', 'Paiement échouée');
   //     return Redirect::route('/pay');
     return redirect('/cancelled')->with('error', ' Paiement échouée  ');

    }
    $payment = Payment::get($payment_id, $this->_api_context);
    $execution = new PaymentExecution();
    $execution->setPayerId($request->get('PayerID'));
    /**Execute the payment **/
    $result = $payment->execute($execution, $this->_api_context);
    if ($result->getState() == 'approved') {
     \Session::put('success', 'Paiement avec succès');
   
     $user = new User([   
        'name' => $request['name'],
        'email' => $request['email'],
        'Company_name' => $request['Company_name'],
        'Country' => $request['Country'],
        'Category_field' => $request['Category_field'],
        'Phone_number' => $request['Phone_number'],
        'plan' => $request['plan'],
        'password' => Hash::make($request['password']),]);
    $user->save();
    $user = auth()->user();
    return view('/home', compact('user'));
    }
    \Session::put('error', 'Paiement échoué');
  //  return Redirect::route('/pay');
    return redirect('/cancelled/')->with('error', ' Paiement échoué  ');

    }
    function cancelled(){ 
        return view('auth.register');
    }
    //
}
