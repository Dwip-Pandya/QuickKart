<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        return view('register');
    }

    // Handle user registration
    public function registerUser(Request $request)
    {
        // Validate user input
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:tbl_user,user_email',
            'password' => 'required|min:8',
        ]);

        // Create a new user
        $user = new User();
        $user->user_name = $request->username;
        $user->user_email = $request->email;
        $user->user_password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login')->with('success', 'You have successfully registered.');
    }
}
