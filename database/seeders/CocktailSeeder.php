<?php

namespace Database\Seeders;

use App\Models\Cocktail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class CocktailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {

        for ($i=0; $i < 10; $i++) {
            $newCocktail = new Cocktail();
            $newCocktail->title = $faker->unique()->realTextBetween(2, 25);
            $newCocktail->cocktail_image = $faker->unique()->imageUrl(300, 500);
            $newCocktail->description = $faker->realTextBetween(10, 50);
            $newCocktail->save();
        }
    }
}
