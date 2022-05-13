<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        $hideNavbar = true;
        return view('pages.login.index', compact('hideNavbar'));
    }
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'correo' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Error al iniciar sesión',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (Auth::attempt(['email' => $request->correo, 'password' => $request->password])) {
            $request->session()->regenerate();

            return response()->json([
                'message' => 'Benvenido',
            ], Response::HTTP_OK);
        }

        return response()->json([
            'message' => 'Usuario y/o contraseña incorrectos',
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        $request->session()->invalidate();

        return redirect('/login');
    }
}
