<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Error;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(Request $request, $guard)
    {
        if(Auth::guard('admin')->check() || Auth::guard('seller')->check())
        {
            return redirect()->route('dashboard.index');
        }
        else{
            // return route('login', $guard);
            if ($guard == 'admin' || $guard == 'seller'){
                return response()->view('back.auth.login', ['guard'=> $guard]);
            }
            else{
                return response()->view('front.auth.login', ['guard'=> $guard]);
            }
        }

    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = ['email'=> $request->input('email'),'password'=> $request->input('password')];
        if (Auth::guard($request->input('guard'))->attempt($credentials, $request->input('remember_me')))
        {
            $request->session()->regenerate();
            return response()->json(['message'=> __('login.logged-successfully')], Response::HTTP_OK);

        }
        else{
            return response()->json(['message' => __('login.incorrect')], Response::HTTP_BAD_REQUEST);
        }
    }

    
	public function logout(Request $request)
    {
        $guard = $this->GetGuardName();
        Auth::guard($guard)->logout();
        $request->session()->invalidate();
        return redirect()->route('login', $guard);
    }

    public function GetGuardName()
    {
        if (auth('admin')->check()) { 
            $guard = 'admin';
         }
        elseif (auth('seller')->check()) {
             $guard = 'seller'; 
        }
        else{
             $guard = 'web';
        }
        return $guard;
    }


}
