<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function login () {
        return view ('auth.login');
    }


    public function register () {
        return view ('auth.register');
    }
    
    public function registerSubmit (Request $request) {
        $response = Http::post('http://127.0.0.1:8002/api/user/register', [
            'name' => $request->email,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        return redirect()->route('login');
    }
}
