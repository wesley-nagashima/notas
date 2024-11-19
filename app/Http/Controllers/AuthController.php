<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginSubmit(Request $request) {
        //Form Validation
        $request->validate(
            [
                'text_username' => 'required',
                'text_password' => 'required'
            ]
        );

        //Get user imput
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        echo 'OK';
    }

    public function logout() {
        echo 'logout';
    }
}