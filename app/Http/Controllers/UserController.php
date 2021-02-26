<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query();
        $role  = $request->query('role');
        $users->where('role', 'admin');
        if ($request->query('findRole')) {
            $users->when($role, function ($query) use ($role) {
                return $query->where('role', $role);
            });
            return response()->json($users->get());
        }
        $data = $users->get();
        return view('admin.user.index', compact('data'));
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
        $data['password'] = bcrypt($request->input('password'));
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
    public function gantiPassword(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->fill(['password' => bcrypt($request->input('password'))]);
        if ($user->save()) {
            return response()->json(true);
        } else {
            return response()->json(false);
        }
    }
}
