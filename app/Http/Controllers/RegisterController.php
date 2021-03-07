<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        if ($request->input('checkEmail')) {
            $user = User::where('email', $request->input('email'))->exists();
            return response()->json($user);
        }
        $rule = [
            'nama' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'avatar' => 'mimes:jpg,png,jpeg,gift|max:2000|required'
        ];

        $validate = Validator::make($data, $rule);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validate->errors()
            ]);
        }
        if ($request->hasFile('avatar')) {
            if ($request->file('avatar')->isValid()) {
                $fileName = time() . '-' . date('M') . '.' . $request->file('avatar')->extension();
                $request->file('avatar')->move(public_path('foto/users'), $fileName);
                $data['avatar'] = $fileName;
            }
        }
        $data['password'] = Hash::make($request->input('password'));
        $newUser = User::create($data);
        if ($newUser) {
            auth()->attempt($request->only('email', 'password'));
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
