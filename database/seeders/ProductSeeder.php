<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Product();
        $user->name = "Bagel";
        $user->description = "Bread From europe";
        $user->stock = "10";
        $user->price = "15000";
        $user->category_id = 3;
        $user->save();

        $user = new Product();
        $user->name = "Bialy";
        $user->description = "Bread From west europe";
        $user->stock = "10";
        $user->price = "17000";
        $user->category_id = 3;
        $user->save();

        $user = new Product();
        $user->name = "Pan blanco";
        $user->description = "Bread From mexico";
        $user->stock = "10";
        $user->price = "7000";
        $user->category_id = 3;
        $user->save();

        $user = new Product();
        $user->name = "Italian breadsticks";
        $user->description = "Bread From Italian";
        $user->stock = "10";
        $user->price = "8000";
        $user->category_id = 3;
        $user->save();

        $user = new Product();
        $user->name = "Challah";
        $user->description = "Bread form North Europe";
        $user->stock = "10";
        $user->price = "20000";
        $user->category_id = 3;
        $user->save();

        $user = new Product();
        $user->name = "Bubble tea";
        $user->description = "Tea with bubble jelly";
        $user->stock = "10";
        $user->price = "20000";
        $user->category_id = 2;
        $user->save();

        $user = new Product();
        $user->name = "Thai tea";
        $user->description = "Tea with milk";
        $user->stock = "10";
        $user->price = "20000";
        $user->category_id = 2;
        $user->save();

        $user = new Product();
        $user->name = "Cheese tea";
        $user->description = "Tea with cheese";
        $user->stock = "10";
        $user->price = "20000";
        $user->category_id = 2;
        $user->save();

        $user = new Product();
        $user->name = "Kopi susu gula aren";
        $user->description = "Coffe";
        $user->stock = "10";
        $user->price = "20000";
        $user->category_id = 2;
        $user->save();



    }
}
