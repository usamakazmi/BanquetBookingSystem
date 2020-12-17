<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class OwnerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout']]);
    
        //$this->middleware('guest:admin', ['except' => ['logout']]);
    }
    
    public function showLoginForm()
    {
        if (Auth::guard('owner')->check()) {
            return redirect('/owner');
        }
        else
        {
            return view('auth.owner-login');
        }
       
    }

    public function login(Request $request)
    {
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        //Attempt to log the user in
        if(Auth::guard('owner')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            //if successful, then redirect to their intended location
            return redirect()->intended(route('owner.dashboard'));
        }

        //if unsuccessful, then redirect back to login with form data
        return redirect()->back()->with('error', 'Invalid Email or Password')->withInput($request->only('email', 'remember'));
    }
    
    public function logout()
    {
        Auth::guard('owner')->logout();

        //$request->session()->flush();
        //$request->session()->regenerate();
        
        return redirect('/');
    }
}
