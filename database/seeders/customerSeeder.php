<?php

namespace Database\Seeders;


use App\Models\Customer;
use Illuminate\Database\Seeder;

class customerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Customer();
        $user->email = "Addison@mail.com";
        $user->name = "Addison";
        $user->address = "Street no 1";
        $user->phone = "0812345678";
        $user->save();

        $user = new Customer();
        $user->email = "Adolf@mail.com";
        $user->name = "Adolf";
        $user->address = "Street no 1";
        $user->phone = "0812345678";
        $user->save();

        $user = new Customer();
        $user->email = "Aldwin@mail.com";
        $user->name = "Aldwin";
        $user->address = "Street no 1";
        $user->phone = "0812345678";
        $user->save();
    }
}
