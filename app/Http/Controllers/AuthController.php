<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDOException;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginSubmit(Request $request) {
        //Form Validation
        $request->validate(
            //rules 
            [
                'text_username' => 'required|email',
                'text_password' => 'required|min:6|max:16'
            ],
            //error messages
            [
                'text_username.required'    => 'O Username é obrigatório!',
                'text_username.email'       => 'O Username deve ser um e-mail válido!',
                'text_password.required'    => 'O Password é obrigatório!',
                'text_password.min'         => 'O Password deve ter pelo menos :min caracteres!',
                'text_password.max'         => 'O Password deve ter no máximo :max caracteres!',
            ]
        );

        //Get user imput
        $username = $request->input('text_username');
        $password = $request->input('text_password');

        //test database connection
        try {
            DB::connection()->getPdo();
            echo "Connection is OK!";
        }
        catch (PDOException $e) {
            echo "Connection failed: ". $e->getMessage();
        }

    }

    public function logout() {
        echo 'logout';
    }
}
