<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class userController extends Controller
{
    public function index(){
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create(){
        return view('user.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|max:50',
            'username' => 'required|max:30|unique:user,username',
            'password' => 'required|min:6|max:100',
            'role' => 'required|in:Admin,Operator',
        ]);

        $user = new User();
        $user->id_user = (string) Str::uuid();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save();

        return redirect()
            ->route('user.index')
            ->with('success', 'Data pengelola berhasil ditambahkan.');
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|max:50',
            'username' => 'required|max:30|unique:user,username,' . $user->id_user . ',id_user',
            'role' => 'required|in:Admin,Operator',
        ]);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->role = $request->role;
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:6|max:100',
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()
            ->route('user.index')
            ->with('success', 'Data pengelola berhasil diperbarui.');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()
            ->route('user.index')
            ->with('success', 'Data pengelola berhasil dihapus.');
    }
}
