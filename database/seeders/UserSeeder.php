<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = "user";
        $user->email = "user@mail.com";
        $user->password = bcrypt('12345678');
        $user->assignRole('user');
        $user->save();

        $admin = new User;
        $admin->name = "admin";
        $admin->email = "admin@mail.com";
        $admin->password = bcrypt('12345678');
        $admin->assignRole('admin');
        $admin->save();



    }
}
