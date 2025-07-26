<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomRole as Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $query = Role::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $roles = $query->paginate(10);
        return view('admin.pages.users.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.pages.users.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array',
        ]);

        try {
            $role = Role::create(['name' => $request->name]);

            if ($request->has('permissions')) {
                $role->syncPermissions($request->permissions);
            }

            return redirect()->route('roles.index')->with('success', 'Role berhasil dibuat.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan role.');
        }
    }

    public function show($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.pages.users.roles.show', compact('role'));
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $rolePermissions = $role->permissions->pluck('name')->toArray();

        return view('admin.pages.users.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:roles,name,' . $id,
            'permissions' => 'array',
        ]);

        try {
            $role->update(['name' => $request->name]);

            if ($request->has('permissions')) {
                $role->syncPermissions($request->permissions);
            } else {
                $role->syncPermissions([]);
            }

            return redirect()->route('roles.index')->with('success', 'Role berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui role.');
        }
    }

    public function trashList()
    {
        $roles = Role::onlyTrashed()->paginate(10);
        return view('admin.pages.users.roles.trash-list', compact('roles'));
    }

    public function restore($id)
    {
        $role = Role::onlyTrashed()->findOrFail($id);
        $role->restore();
        return redirect()->route('roles.index')->with('success', 'Role restored successfully.');
    }

    public function trash($id)
    {
        $role = Role::findOrFail($id);

        if ($role->name === 'super admin') {
            return redirect()->route('roles.index')->with('error', 'Role super admin tidak bisa dihapus.');
        }

        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role berhasil dipindahkan ke Trash.');
    }

    public function forceDelete($id)
    {
        $role = Role::withTrashed()->findOrFail($id);

        if ($role->name === 'super admin') {
            return redirect()->route('roles.index')->with('error', 'Role super admin tidak bisa dihapus permanen.');
        }

        $role->forceDelete();

        return redirect()->route('roles.index')->with('success', 'Role berhasil dihapus secara permanen.');
    }
}
