<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class AuthenticateController extends Controller
{
    public function index()
    {
         
        if (Auth::check())
        {
            return view("home.index");
        }

        return view('login.index');
    }

    public function login(Request $request)
    {   
        if (!Auth::attempt($request->only(['login','password'])))
        {
            return redirect()
            ->back() 
            ->withErrors('Usuário ou senha incorreto'); 
        }
            return view("home.index");
    }

    public function logout(Request $request)
    {
        //DESTRUINDO A SESSÃO
        $request->session()->flush();

        return redirect()
        ->route("firstPage")
        ->with('message', 'Usuário desconectado com sucesso');
    }

}
