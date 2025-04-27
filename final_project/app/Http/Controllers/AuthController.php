<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = User::where('user_email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->user_password)) {
            session(['uid' => $user->user_id, 'uname' => $user->user_name]);

            return redirect()->route('welcome')->with('success', 'Login successful');
        } else {
            return back()->with('error', 'Invalid email or password');
        }
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('welcome')->with('success', 'Logged out successfully');
    }
}
