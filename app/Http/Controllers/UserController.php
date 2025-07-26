<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomPermission as Permission;
use App\Models\CustomRole as Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::with('roles')
            ->when(
                $search,
                fn($query) =>
                $query->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
            )
            ->paginate(10);

        return view('admin.pages.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|exists:roles,name',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole($validated['role']);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan dan diberikan role.');
    }

    public function edit($id)
    {
        $user       = User::findOrFail($id);
        $roles      = Role::all();
        $permissions = Permission::all();
        return view('admin.pages.users.edit', compact('user', 'roles', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
            'role'     => 'required|exists:roles,name',
        ]);

        $user->name  = $validated['name'];
        $user->email = $validated['email'];
        if ($validated['password']) {
            $user->password = Hash::make($validated['password']);
        }
        $user->save();

        $user->syncRoles([$validated['role']]);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    public function trashList()
    {
        $users = User::onlyTrashed()->paginate(10);
        return view('admin.pages.users.trash-list', compact('users'));
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->route('users.index')->with('success', 'User berhasil dikembalikan.');
    }

    public function trash($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User berhasil dipindahkan ke Trash.');
    }

    public function forceDelete($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus permanen.');
    }
}
