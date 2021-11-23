<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            [
                'name' => 'view_users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'create_users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'edit_users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'delete_users',
                'guard_name' => 'web'
            ],
            [
                'name' => 'view_roles',
                'guard_name' => 'web'
            ],
            [
                'name' => 'create_roles',
                'guard_name' => 'web'
            ],
            [
                'name' => 'edit_roles',
                'guard_name' => 'web'
            ],
            [
                'name' => 'delete_roles',
                'guard_name' => 'web'
            ],
            [
                'name' => 'edit_settings',
                'guard_name' => 'web'
            ],
        ];

        foreach ($permissions as $permission) {
            \Spatie\Permission\Models\Permission::updateOrCreate($permission);
        }
    }
}
