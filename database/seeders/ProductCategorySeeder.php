<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::factory()->count(20)->create();
        $categories = Category::all();
        Product::all()->each(function ($product) use ($categories){
           $product->categories()->attach($categories->random(rand(1, 3))->pluck('id')->toArray());
        });
    }
}
