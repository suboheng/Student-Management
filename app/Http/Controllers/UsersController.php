<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UsersController extends Controller
{
    //
    public function showLogin()
    {
        return view('user.login');
    }
    public function showRegister()
    {
        return view('user.register');
    }
    public function register(Request $request){
        $request->validate([
            'name'=>'required|string|max:200',
            'email'=>'required|string|email|max:200|unique:users',
            'password'=>'required|string|min:6',
        ]);
        $user = User::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect('/dashboard')->with('success', 'Registration successful');
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email',
            'password'=>'required',
        ]);
        $remember = $request->has('remember');

        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'email'=> 'Incorrect password',
        ])->onlyInput('email');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
