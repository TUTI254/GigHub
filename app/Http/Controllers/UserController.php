<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    //this is a function for showing the register form
    public function create()
    {
        return view('users.register');
    }
    //this is a function for storing the user
    public function store(Request $request){
        $formfields = $request->validate([
            'name' => 'required|min:3',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:8|confirmed',
        ]);
        //this hashes the password
        $formfields['password'] = bcrypt($formfields['password']);

        //this creates the user
        $user = User::create($formfields);
        //this logs the user in
        auth()->login($user);
        //this redirects the user to the home page
        return redirect('/')->with('message', 'User created & Logged in !');
    }

    //this is a function for logging out
    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate(); //this invalidates the session
        $request->session()->regenerateToken();//this regenerates the token
        return redirect('/')->with('message', 'You have been logged out !');
    }

    //this is a function for showing the login form
    public function login(){
        return view('users.login');
    }
 
    //this is a function for authenticating the user
    public function authenticate(Request $request){
        $formfields = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //this checks if the user is authenticated
        if(auth()->attempt($formfields)){
            $request->session()->regenerate();
            //this redirects the user to the home page
            return redirect('/')->with('message', 'You have been logged in !');
        }
        return back()->withErrors([
                'email' => ' Invalid credentials',
            ])->onlyInput('email');
    }
}
