<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoriesTableSeeder extends Seeder
{

    protected $categories =[

        [
            'name'          =>  'electronics',
            
            'slug'   => 'electronics',
            'parent_id'     =>  1,
            'featured'      => '0',
            'menu'          =>  1,
        ],
        [
            'name'          =>  'fashion',
            
            'slug'   => 'fashion',
            'featured'      => '0',
            'parent_id'     =>  1,
            'menu'          =>  1,
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach($this->categories as $index=> $category)
        {
            
            $result = Category::create($category);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted '.count($this->categories). ' records');
    
        }

    //  Category::create([
    //     'name' => 'Root',
    //     'description'   =>  'This is the root category, don\'t delete this one',
    //     'slug'   =>'',
    //      'parent_id'     =>  null,
    //         'menu'          =>  0,
    //  ]);

    //  factory('App\Models\Category',10)->create();
    // }
}
