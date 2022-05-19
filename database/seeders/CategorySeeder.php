<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new Category();
        $user->name = "Snack";
        $user->description = "Honey Snack";
        $user->save();

        $user = new Category();
        $user->name = "Drink";
        $user->description = "Fresh Drink";
        $user->save();

        $user = new Category();
        $user->name = "Bread";
        $user->description = "Fresh Bread";
        $user->save();
    }
}
