<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function show()
    {
        if(Auth::check())
        {
            return redirect('/inicio');
        }
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $crendentials = $request->getCredentials();

        if(!Auth::validate($crendentials))
        {
            return redirect()->to('/login')->withErrors('auth.failed');
        }
        $user = Auth::getProvider()->retrieveByCredentials($crendentials);
        Auth::login($user);
        return $this->authenticated($request,$user);
    }

    public function authenticated(Request $request, $user)
    {
        return redirect('/inicio');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->to('/');
    }
}
