<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auth.login');
    }


    public function check(Request $request)
    {   
    	$this->validate($request, [
        	'admin_email' => 'required|email',
        	'admin_pwd' => 'required'
        ],
    	[
            'admin_email.required' => 'Email is required!',
            'admin_pwd.required' => 'Password is required!',
        ]);

        $email = $request->admin_email;
        $password = $request->admin_pwd;

        if(Auth::attempt(['admin_email' => $email, 'password' => $password])) {
            Session::put('logged_in', 'logged_in');

        	return redirect()->intended('admin/dashboard');
        }
        else {
        	return redirect('admin/login')->with('failed', 'email or password is wrong');
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        return redirect('admin/login');
    }
}
