<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }
    public function checkEmail(Request $request)
    {
        if ($request->ajax()) {
            $validasi = User::where('email', $request->input('email'))->exists();
            if (!$validasi) {
                return response()->json(['message' => true]);
            } else {
                return response()->json(['message' => false]);
            }
        }
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $create = User::create($data);
        if ($create) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(true);
        } else {
            return response()->json(true);
        }
    }
    public function show($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function update($id, Request $request)
    {
        $user = User::find($id);
        $data = $request->except('_token');
        $user->fill($data);
        if ($user->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
