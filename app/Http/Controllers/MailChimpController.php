<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MailchimpMarketing\ApiClient;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;
use \Exception;


class MailChimpController extends Controller {
    
    //use Automatic resolution for newsletter
    public function __invoke(Request $req, Newsletter $newsletter)
    {

        request()->validate([
            'email' => 'required|email'
        ]);
        
        try{

         $newsletter->subscribe(request('email'));
         
        } catch(Exception $e){
    
          throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newletter list'
            ]);
        }
    
        return back()->with('success', 'Thanks for joining!');
    }
}
