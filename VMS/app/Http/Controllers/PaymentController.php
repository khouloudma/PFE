<?php

namespace App\Http\Controllers;
use App\Config\paypal;
use App\Http\Controllers\Session;
use App\User;
use PayPal\Api\PaymentExecution;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
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
    private $paypal;
    
    public function __construct(){

        
    }
    public function Paywithpaypal(Request $request){
       $clientId ='AQ-pfQX5Us0NdQJYpduRy5kh1JkUSxtcf4jlQGTXeoUhUoZohORi7c2mJJhkB9zUyMXKeMX6nNu-NNrQ';
        $secret ='EIJQYjkNkf_JFU5PfK0QtIWuCTMX3rdMZzrIp2XWnqi0mXJ67xwGCivg_gLjHR6Pdw-DbrQiuLKdQgD9';
           
        //dd(config('paypal.settings.mode')); ya9ra feha sandbox
        $paypal = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                $clientId, $secret
            )
        );

        
        $paypal->setConfig([
                'mode'=> env('PAYPAL_MODE', 'sandbox'),
                'http.ConnectionTimeOut'=>3000,
                'log.LogEnabled' =>true,
                'log.FileName' =>'../PayPal.log',
                'log.LogLevel' =>'FINE',
                'cache.enabled' => true,
            ]);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'Company_name' => ['required', 'string', 'max:40'],
            'Country' => ['required', 'string','max:25'],
            'Phone_number' => ['required', 'integer', 'max:99999999'],
            'Category_field' => ['required', 'string','max:255'],

        ]);
        
       
        $price = $request->input('plan');
        //set payer
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        //set item 
        $item = new Item();
        $item->setName('Plan')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($price);
        //set itemlist
            $itemList = new ItemList();
            $itemList->setItems(array($item));
        //amount
        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($price);
        //set transaction
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Plan Payment");
        //redirect
        $name=$request->input('name');
        $email=$request->input('email');
        $Company_name=$request->input('Company_name');
        $Country=$request->input('Country');
        $Category_field=$request->input('Category_field');
        $Phone_number=$request->input('Phone_number');
        $plan=$request->input('plan');
        $password=Hash::make($request->input('password'));
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl("http://127.0.0.1:8000/Status?name=$name&email=$email&Company_name=$Company_name&Country=$Country&Category_field=$Category_field&Phone_number=$Phone_number&plan=$plan&password=$password")
                    ->setCancelUrl("http://127.0.0.1:8000/cancelled");
        //payment

        $payment = new Payment();
        $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));
        try{
         $payment->create($paypal);
            } catch (Exception $e){
                    die($e);}

            
        $approvalUrl=$payment->getApprovalLink();
                header("Location: {$approvalUrl}");
           
            return redirect($approvalUrl);
            
        }
    function Status(Request $request){
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
      
        return view('/home');     
        

      /*   $payment_id = Session::get('paypal_payment_id');

    // clear the session payment ID
    Session::forget('paypal_payment_id');

    
    $user = new User([   
        'name' => $request['name'],
        'email' => $request['email'],
        'Company_name' => $request['Company_name'],
        'Country' => $request['Country'],
        'Category_field' => $request['Category_field'],
        'Phone_number' => $request['Phone_number'],
        'plan' => $request['plan'],
        'password' => Hash::make($request['password']),]);

    $payment = Payment::get($payment_id, $this->_api_context);
    $execution->setPayerId($request->input('PayerID'));

    $result = $payment->execute($execution, $this->_api_context);

    echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

    if ($result->getState() == 'approved') { // payment made
        return Redirect('home')->with('success', 'Payment success')->compact('user');
                            }
                            return Redirect('auth.register')
                                ->with('error', 'Payment failed');
 */ 

    }
    function cancelled(){ 
        return view('auth.register');
    }
    //
}
