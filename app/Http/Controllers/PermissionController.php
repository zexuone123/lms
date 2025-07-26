<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomPermission as Permission;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $query = Permission::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $permissions = $query->orderBy('name')->paginate(10);
        return view('admin.pages.users.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.pages.users.permissions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->name]);

        return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('admin.pages.users.permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);

        $request->validate([
            'name' => 'required|unique:permissions,name,' . $id,
        ]);

        $permission->update(['name' => $request->name]);

        return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
    }

    public function trashList()
    {
        $permissions = Permission::onlyTrashed()->paginate(10);
        return view('admin.pages.users.permissions.trash-list', compact('permissions'));
    }

    public function restore($id)
    {
        $permission = Permission::onlyTrashed()->findOrFail($id);
        $permission->restore();
        return redirect()->route('permissions.index')->with('success', 'Permission berhasil dipulihkan.');
    }

    public function trash($id)
    {
        $permission = Permission::findOrFail($id);

        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission berhasil dipindahkan ke Trash.');
    }

    public function forceDelete($id)
    {
        $permission = Permission::withTrashed()->findOrFail($id);
        $permission->forceDelete();
        return redirect()->route('permissions.index')->with('success', 'Permission berhasil dihapus permanen.');
    }
}
