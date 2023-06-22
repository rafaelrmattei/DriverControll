<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function index()
    {
        if(Auth::check()){
            return redirect(route('routes'));
        }
        return view('login');
    }

    public function login(Request $request)
    {

        $validator = $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);     

        if(Auth::attempt($validator)){
            return redirect(route('routes'));
        }

        return redirect()->back()->withErrors(['Erro! Usuário ou senha inválido'])->withInput();
        
    }

    public function logout()
    {      
        Auth::logout();
        return redirect()->route('login');
    }

}
