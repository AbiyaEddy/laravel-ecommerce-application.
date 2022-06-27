<?php

namespace Database\Seeders;

use App\Models\AttributesValue;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AttributeValuesTableSeeder extends Seeder
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

     $sizes =['small','medium','large'];

     $color =['black','blue','red','orange'];

     foreach($sizes as $size)
     {
        AttributesValue::create([
            'attribute_id' =>1,
            'value' => $size,
            'price' => null,
        ]);
     }

     
     foreach($sizes as $size)
     {
        AttributesValue::create([
            'attribute_id' =>1,
            'value' => $size,
            'price' => null,
        ]);
     }
    }
}
