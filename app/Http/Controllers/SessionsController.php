<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;


class SessionsController extends Controller
{
    //
    public function create()
    {
        return view('sessions.create');

    }

    public function destroy()
    {
         auth()->logout();
         return redirect('/')->with('success', 'Goodbye!');
    }

    public function store()
    {
     $attributes = request()->validate([
           'email' => 'required|email',
           'password' => 'required'
       ]);

  
    
   /*  return back()
    ->withInput()
    ->withErrors([
        'email' => 'Your provided credentails could not be varified.'
    ]); */  
    
    
    if(! auth()->attempt($attributes))
    {
        throw ValidationException::withMessages([
            'email' => 'The provided credentails could not be verified.',
            'password' => 'The provided credentails could not be varified.'
        ]);
    }

        session()->regenerate();
        
        return redirect('/')->with('success', 'Welcome Back!');
        
    }
}
