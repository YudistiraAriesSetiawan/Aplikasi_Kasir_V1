<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'web',
        ]);
        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);
    }
}
