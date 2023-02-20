<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Client\Request;



class AuthController extends Controller
{


    public function login()
    {

        return view('login.index');
    }

    public function loginStore()
    {

        if (auth()->attempt(['email' => request('email'), 'password' => request('password')])) {
          return redirect('/')->with('success', 'welcome back');
        
           //return redirect()->intended($this->redirectPath())->with('success', 'welcome back');
        }
        return back()->withErrors([
            'email' => 'Email does not exits',
        ])->onlyInput('email');
    }

    public function create()
    {
        return view(('register.create'));
    }

    public function registerStore()
    {

        $cleanData =   request()->validate(
            [
                'name' => 'required',
                'email' => ['required', 'email', 'unique:users,email'],
                'password' => 'required',
            ],
            [
                'email.required' => 'Please add valid email address',
                'email.email' => 'Your email address is not valid',
            ]
        );

        $user = new User();
        $user->name = $cleanData['name'];
        $user->email = $cleanData['email'];
        $user->password = $cleanData['password'];

        $user->save();

        auth()->login($user);

        return redirect('/')->with('success', 'Welcome Back');
    }



    public function logout()
    {

        auth()->logout();
        return redirect('/');
    }
}
