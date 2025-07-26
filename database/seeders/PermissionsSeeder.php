<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'configuration',
            'slider',
            'tambah slider',
            'edit slider',
            'hapus slider',
            'about',
            'superiority',
            'tambah superiority',
            'edit superiority',
            'hapus superiority',
            'service',
            'tambah service',
            'edit service',
            'hapus service',
            'impersonate',
            'blog',
            'tambah blog',
            'edit blog',
            'hapus blog',
            'trash blog',
            'team',
            'tambah team',
            'edit team',
            'hapus team',
            'tenant',
            'tambah tenant',
            'edit tenant',
            'hapus tenant',
            'paid',
            'sudah bayar',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission], ['guard_name' => 'web']);
        }

        $superAdmin = Role::firstOrCreate(
            ['name' => 'super_admin'],
            ['guard_name' => 'web']
        );

        $allPermissions = Permission::all();
        $superAdmin->syncPermissions($allPermissions);
    }
}
