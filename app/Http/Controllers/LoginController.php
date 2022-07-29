<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLogin () 
    {
        if(Auth::check()) {

            return redirect()->route('admin.categories.index');

        }
        
        return view('login.index');
        

    }

    public function postLogin (Request $request) 
    {
        $login = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
            'level' => ['1']
        ],[
            'email.required' => 'Vui Lòng Nhập Email',
            'password.required' => 'Vui Lòng Nhập Mật Khẩu',
        ]);
 
        if (Auth::attempt($login)) {
            $request->session()->regenerate();
 
            return redirect()->route('admin.categories.index');
        }

        return back()->with([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect()->route('getLogin');
    }
}
