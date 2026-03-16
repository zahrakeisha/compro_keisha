<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;
use App\Visitor;
use App\Clients;
use App\Blogs;
use App\Contacts;

class AuthController extends Controller
{
    public function showformlogin()
    {
        return view('auth.login');
    }

    public function proseslogin(Request $request)
    {
        $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => ' Oppes! you have entered invalid credentials',
        ])->withInput();

        return back()->withErrors(['email' => 'Oppes! you have entered invalid credentials']);
    }

    public function dashboard()
    {
        $totalvisitor = Visitor::count();
        $totalclient = Clients::count();
        $totalblog = Blogs::count();
        $totalmessage = Contacts::count();
        
        return view('auth.dashboard', compact('totalvisitor', 'totalclient', 'totalblog', 'totalmessage'));
    }
    public function profile()
    {
        return view('auth.profile');
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}
