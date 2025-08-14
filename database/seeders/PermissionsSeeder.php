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
            'siswa',
            'siswa create',
            'siswa edit',
            'siswa delete',
            'category-quiz',
            'category-quiz create',
            'category-quiz edit',
            'category-quiz delete',
            'quiz',
            'quiz create',
            'quiz edit',
            'quiz delete',
            'impersonate',
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
