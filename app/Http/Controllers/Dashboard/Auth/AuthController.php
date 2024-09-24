<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Auth\LoginRequest;
use App\Http\Services\Dashboard\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function _login()
    {
        return view('dashboard.site.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        $credentials['is_active'] = true;
        $rememberMe = $request->remember_me == 'on';
        if (auth()->attempt($credentials, $rememberMe)) {
            return redirect()->route('/');
        } else {
            return redirect()->route('auth.login')->with(['error' => __('messages.Incorrect email or password')]);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('auth.login');
    }
}
