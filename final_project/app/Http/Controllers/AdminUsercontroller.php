<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = DB::table('tbl_user')->get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|unique:tbl_user,user_email',
            'user_password' => 'required|string|min:6',
        ]);

        // Hashing the password before storing it
        $data['user_password'] = Hash::make($data['user_password']);

        DB::table('tbl_user')->insert($data);

        return redirect()->route('adminuser.index')->with('success', 'User added!');
    }

    public function edit($id)
    {
        $user = DB::table('tbl_user')->where('user_id', $id)->first();
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = DB::table('tbl_user')->where('user_id', $id)->first();

        $data = $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|unique:tbl_user,user_email,' . $id . ',user_id',
        ]);

        // If password is provided, hash it before saving
        if ($request->filled('user_password')) {
            $data['user_password'] = Hash::make($request->input('user_password'));
        }

        DB::table('tbl_user')->where('user_id', $id)->update($data);

        return redirect()->route('adminuser.index')->with('success', 'User updated!');
    }

    public function destroy($id)
    {
        DB::table('tbl_user')->where('user_id', $id)->delete();
        return redirect()->route('adminuser.index')->with('success', 'User deleted!');
    }
}
