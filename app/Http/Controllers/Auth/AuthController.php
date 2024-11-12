<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginAdmin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(!Auth::guard('admin')->attempt($request->only('email','password'))) {
            return redirect()->back()->withErrors('Invalid credentials');
        }
        
        return redirect()->intended(route('dashborad'));

    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return to_route('login');
    }

}
