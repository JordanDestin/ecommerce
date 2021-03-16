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
            'slug' => 'vetements'
        ]);

        Category::create([
            'name' => 'Chaussures',
            'slug' => 'chaussure'
        ]);

        Category::create([
            'name' => 'Accessoires',
            'slug' => 'accessoire'
        ]);

        Category::create([
            'name' => 'Maquillages',
            'slug' => 'maquillage'
        ]);

        Category::create([
            'name' => 'Parfums',
            'slug' => 'parfum'
        ]);
    }
}
