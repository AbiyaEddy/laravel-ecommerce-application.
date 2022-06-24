<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         /**
     * Run the database seeds.
     *
     * @return void
     */

     Category::create([
        'name' => 'Root',
        'description'   =>  'This is the root category, don\'t delete this one',
        'parent_id'     =>  null,
            'menu'          =>  0,
     ]);

     factory('App\Models\Category',10)->create();
    }
}
