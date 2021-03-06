<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Generator as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppModelsCategory>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

 public function definition()
    {
           //
            
$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'          =>  $faker->name,
        'description'   =>  $faker->realText(100),
        'slug'   => $Str::slug($faker->name),
        'parent_id'     =>  1,
        'menu'          =>  1,
    ];
});
    }
}
