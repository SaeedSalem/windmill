<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'name' => 'admin',
                'guard_name' => 'web'
            ],
        ];

        foreach ($roles as $role) {
            $role = \Spatie\Permission\Models\Role::create($role);
            $permissions = \Spatie\Permission\Models\Permission::all()->pluck('name')->toArray();
            $role->givePermissionTo($permissions);
        }
    }
}
