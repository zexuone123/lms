<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permission = Permission::firstOrCreate(
            ['name' => 'impersonate'],
            ['guard_name' => 'web']
        );

        $role = Role::firstOrCreate(
            ['name' => 'super_admin'],
            ['guard_name' => 'web']
        );

        if (!$role->hasPermissionTo('impersonate')) {
            $role->givePermissionTo($permission);
        }

        $user = User::firstOrCreate(
            ['email' => 'SuperAdmin@example.com'],
            [
                'name' => 'Super Admin',
                'username' => 'super_admin',
                'password' => bcrypt('password'),
            ]
        );

        if (!$user->hasRole('super_admin')) {
            $user->assignRole($role);
        }

        $permissions = Permission::all();

        $role->syncPermissions($permissions);
    }
}
