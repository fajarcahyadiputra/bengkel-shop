<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('pesan', 'Your Password Or Email Is Wrong');
        }
        $data = auth()->user();
        if ($data->status_aktif === 'tidak') {
            return back()->with('pesan', 'Your Account Is Not Active');
        }
        if ($data->role === 'admin') {
            return redirect()->route('dashboard');
        } else if ($data->role === 'user') {
            return redirect('/');
        } else {
            return abort(403, 'Who Are You');
        }
    }
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
    public function logoutUser()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
