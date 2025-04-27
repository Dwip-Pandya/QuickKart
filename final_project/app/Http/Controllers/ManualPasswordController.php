<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ManualPasswordController extends Controller
{
    public function updatePassword(Request $request)
    {
        $userId = session('user_id'); // Adjust based on your session setup
        $user = User::find($userId);

        if (!$user || !Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password is incorrect.');
        }

        if ($request->new_password !== $request->confirm_password) {
            return back()->with('error', 'New password and confirmation do not match.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }
}
