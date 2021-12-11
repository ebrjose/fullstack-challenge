<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return $this->response(['user' => auth()->user()], 200);
    }

    public function logout(Request $request)
    {
        auth('web')->logout();

        $request->user()->tokens()->delete();
        $request->user()->currentAccessToken()->delete();


        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return $this->response(null, 200);
    }
}
