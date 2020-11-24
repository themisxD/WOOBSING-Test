<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'Client']);

        $permissions = [];
        // Users Permissions
        $permissions[] = Permission::create(['name' => 'Create User']);
        $permissions[] = Permission::create(['name' => 'Edit User']);
        $permissions[] = Permission::create(['name' => 'Show User-permissions']);
        $permissions[] = Permission::create(['name' => 'Delete User']);

        // Get Role Admin And assign permissions
        $role = Role::findByName('Admin');
        $role->syncPermissions($permissions);
    }
}
