<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function  create(){
        return view('register.create');
    }

    public function store(){
       $attributes=request()->validate([
            'firstname' => 'required|min:3max:255|',
            'lastname' => 'required|min:3max:255|',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:4|max:255|',
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')
            ->with('success','User registered successfully.');


    }
}
