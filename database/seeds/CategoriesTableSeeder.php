<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Vêtements',
        ]);

        Category::create([
            'name' => 'Chaussures',
        ]);

        Category::create([
            'name' => 'Accessoires',
        ]);

        Category::create([
            'name' => 'Maquillages',
        ]);

        Category::create([
            'name' => 'Parfums',
        ]);
    }
}
