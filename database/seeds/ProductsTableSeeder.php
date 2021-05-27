<?php

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i=0; $i < 30; $i++) {
            Product::create([
                'title' => $faker->sentence(4),
              //  'slug' => $faker->slug,
                'description' => $faker->text,
                'price' => $faker->numberBetween(15, 300) * 100,
                'quantite' => $faker->numberBetween(1, 10),
                'image' => 'https://via.placeholder.com/200x250',
                'tendance' =>$faker->boolean
            ])->categories()->attach([
                rand(1, 4),
                rand(1, 4)
            ]);
        }
    }
}