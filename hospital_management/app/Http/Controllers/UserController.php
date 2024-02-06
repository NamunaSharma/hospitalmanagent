<?php

namespace App\Http\Controllers;

use App\Mail\UserCreated;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index')->with(compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:3|max:255",
            "email" => "required|email|unique:users",
            "password" => "required|min:8|max:255"
        ]);

        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password)
        ]);

        Mail::to($request->email)->send(new UserCreated($request->name));

        return redirect('/user');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        return redirect('/user');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit')->with(compact('user'));
    }

    public function update(Request $request, $id)
    {
        User::findOrFail($id)->update([
            "name" => $request->name,
            "email" => $request->email
        ]);

        return redirect('/user');
    }

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function attemptLogin(Request $request)
    {
        $user = Auth::attempt([
            "email" => $request->email,
            "password" => $request->password
        ]);

        if ($user) {
            return redirect('');
        }else{
            return redirect('/login');
        }
}
}