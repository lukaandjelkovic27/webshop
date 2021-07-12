<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CarCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create([
            'name' => 'BMW'
        ]);
        Category::create([
            'name' => 'Audi'
        ]);
        Category::create([
            'name' => 'Citroen'
        ]);
        Category::create([
            'name' => 'Diesel'
        ]);
        Category::create([
            'name' => 'Gasoline'
        ]);
        Category::create([
            'name' => 'Suv'
        ]);
        Category::create([
            'name' => 'Saloon'
        ]);
        Category::create([
            'name' => 'Hatchback'
        ]);
    }
}
