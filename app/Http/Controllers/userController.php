<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    // Middleware tambahan di constructor untuk memastikan hanya admin yang bisa akses index, create, store, destroy
    public function index(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('admin.index')->with('error', 'Anda tidak memiliki hak akses ke menu Manajemen User.');
        }

        $search = $request->input('search');
        $users = User::when($search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                         ->orWhere('username', 'like', "%{$search}%")
                         ->orWhere('email', 'like', "%{$search}%");
        })->latest()->paginate(10);

        return view('user.index', compact('users', 'search'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('admin.index')->with('error', 'Akses ditolak.');
        }
        return view('user.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('admin.index')->with('error', 'Akses ditolak.');
        }

        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6',
            'role'     => 'required|in:admin,operator',
            'foto'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ];

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('users', 'public');
        }

        User::create($data);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        // Jika yang login operator, dia HANYA boleh edit profilnya sendiri
        if (Auth::user()->role === 'operator' && Auth::id() != $user->id && (isset($user->id_user) && Auth::id() != $user->id_user)) {
            return redirect()->route('admin.index')->with('error', 'Anda hanya dapat mengedit profil Anda sendiri.');
        }

        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Jika operator mencoba mengedit user lain
        if (Auth::user()->role === 'operator' && Auth::id() != $user->id && (isset($user->id_user) && Auth::id() != $user->id_user)) {
            return redirect()->route('admin.index')->with('error', 'Akses ditolak.');
        }

        $idColumn = isset($user->id_user) ? 'id_user' : 'id';

        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id . ',' . $idColumn,
            'email'    => 'required|email|unique:users,email,' . $id . ',' . $idColumn,
            'foto'     => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Jika yang login admin, role boleh ikut diubah. Jika operator, role tetap.
        $data = [
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
        ];

        if (Auth::user()->role === 'admin' && $request->has('role')) {
            $data['role'] = $request->role;
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            if ($user->foto) {
                $oldPath = str_replace('public/', '', $user->foto);
                if (Storage::disk('public')->exists($oldPath)) {
                    Storage::disk('public')->delete($oldPath);
                }
            }
            $data['foto'] = $request->file('foto')->store('users', 'public');
        }

        $user->update($data);

        // Jika operator yang edit, kembalikan ke dashboard. Jika admin, kembalikan ke index user.
        if (Auth::user()->role === 'operator') {
            return redirect()->route('admin.index')->with('success', 'Profil Anda berhasil diperbarui.');
        }

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hanya admin yang bisa menghapus user
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('admin.index')->with('error', 'Akses ditolak.');
        }

        $user = User::findOrFail($id);

        if ($user->foto) {
            $oldPath = str_replace('public/', '', $user->foto);
            if (Storage::disk('public')->exists($oldPath)) {
                Storage::disk('public')->delete($oldPath);
            }
        }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus.');
    }
}