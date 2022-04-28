<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request){
        
        ray(request()->all());

        $attributes = $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users,username',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:8|max:255'
        ]); 

       $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Welcome, ' . $attributes['name'] . '. Your account has been created.');
    }
}
