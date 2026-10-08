<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    private function authorizeAdmin()
    {
        if (!Auth::check() || strtolower(Auth::user()->role) !== 'admin') {
            abort(403, 'Akses ditolak.');
        }
    }

    private function authorizeAdminOrSelf($id)
    {
        if (!Auth::check()) {
            abort(403, 'Akses ditolak.');
        }

        $isAdmin = strtolower(Auth::user()->role) === 'admin';
        $isSelf = Auth::user()->id_user == $id;

        if (!$isAdmin && !$isSelf) {
            abort(403, 'Akses ditolak.');
        }
    }

    public function index()
    {
        $this->authorizeAdmin();
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $this->authorizeAdmin();
        return view('user.create');
    }

    public function store(Request $request)
{
    $this->authorizeAdmin();

    $request->validate([
        'username' => 'required|string|max:30|unique:users,username',
        'password' => 'required|string|min:6',
        'role'     => 'required|in:Admin,Operator,admin,operator',
    ]);

    User::create([
        'username' => $request->username,
        'password' => Hash::make($request->password),
        'role'     => ucfirst(strtolower($request->role)), // Diseragamkan menjadi huruf kapital di awal (Admin/Operator)
    ]);

    return redirect()->route('user.index')->with('success', 'Akun berhasil dibuat.');
}

    public function edit($id)
    {
        $this->authorizeAdminOrSelf($id);
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->authorizeAdminOrSelf($id);
        $user = User::findOrFail($id);

        $isAdmin = strtolower(Auth::user()->role) === 'admin';

        $rules = [
            'username' => 'required|string|max:30|unique:users,username,' . $id . ',id_user',
            'password' => 'nullable|string|min:6',
        ];

        if ($isAdmin) {
            $rules['role'] = 'required|in:Admin,Operator';
        }

        $request->validate($rules);

        $data = [
            'username' => $request->username,
        ];

        if ($isAdmin && $request->filled('role')) {
            $data['role'] = $request->role;
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'Akun berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $this->authorizeAdmin();
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Akun berhasil dihapus.');
    }
}