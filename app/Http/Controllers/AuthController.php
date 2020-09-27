<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {

        // Validation Rules
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        // if validator fails
        if ($validator->fails()) {
            return redirect()->back()->WithErrors($validator)->withInput();
        }

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'status' => 1
        ], $request->input('remember'))
        ) {
            session()->flash('message', 'Welcome to dashboard.');
            return redirect()->intended('dashboard');
        }
        // authentication failed...
        session()->flash('message', 'Invalid login credentials.');
        return redirect()->back();

    }
}
