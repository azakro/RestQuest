<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    //
    public function __construct()
    {
    	$this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }

    public function login(Request $request)
    {
    	//validate the form data
    	$this->validate($request, [
    		'email' => 'required|email',
    		'password' => 'required|min:6'
    	]);
    	//attempt to login the user
    	if(Auth::guard('web')->attempt(['email'=>$request->email, 'password' => $request->password], $request->remember)){
    		//if successful, then redirect to their intended location
    		//intended is laravel function that keeps track of where user was trying to go - ex: user deep in app, checks email, logs back in, then back at current page they were on before
    		return redirect()->intended(route('admin.dashboard'));
    	}

    	//if unsuccessful, then redirect back to the login with the form data - keeps login inputs
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }
}
