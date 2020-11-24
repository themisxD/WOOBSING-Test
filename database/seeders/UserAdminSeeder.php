<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Admin',
            'last_name' => 'Global',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123secret'),
            'address' => 'Bogota',
            'phone' => '2345678',
        ]);

    $user->assignRole('Admin');
    }
}
