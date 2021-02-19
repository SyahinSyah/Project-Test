<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create(Request $request)
    {
        $credential = $request->only('email','password');
    
        if(Auth::attempt($credential))
        {
            $request->session()->regenerate();
            return redirect('/home');
        }

        return back()->withErrors([
            'email' => 'email is incorrect',
            'password' => 'password is incorrect'
        ])->withInput();
    }

    public function destroy(Request $request)
    {

        // dd($request);
        //logout function 
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/welcome');
    }
}
