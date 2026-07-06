<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignInRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function store(SignInRequest $request)
    {
        $data = $request->validated();
        // Attempt to authenticate the user. If it fails, return with error.
        if (!Auth::attempt($data)) {
            return back()->with("error", "Credenciales incorrectas. Por favor, verifica tu email y contraseña.");
        }

    }
}

