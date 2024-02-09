<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function indexLogin(Request $request)
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/task/my-task');
        }

        return back()->withErrors(['email' => 'Your provided credentials do not match in our records.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }

    public function indexRegister(Request $request)
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        Auth::attempt($request->only('email', 'password'));
        return redirect('dashboard');
    }
    public function dashboard(Request $request)
    {
        return view('auth.dashboard');
    }
}
