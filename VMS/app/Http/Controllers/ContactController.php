<?php

namespace App\Http\Controllers;
use App\Contact;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ContactController extends Controller
{
     /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255' ,'min:2'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'integer'],
            'message' => ['required', 'string', 'max:1500','min:10'],
        ]);
    }
    function index(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255' ,'min:2'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'integer'],
            'message' => ['required', 'string', 'max:1500','min:10'],
        ]);
       $contact  = new Contact([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
         ]);

      $contact->save();
      return redirect('/contact');
    }
}
