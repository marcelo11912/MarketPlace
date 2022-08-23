<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Category 1',
                'slug' => 'category-1',
                'created_at' => '2022-03-17 04:59:42',
                'updated_at' => '2022-03-17 04:59:42',
            ),
            1 => 
            array (
                'id' => 2,
                'parent_id' => NULL,
                'order' => 1,
                'name' => 'Category 2',
                'slug' => 'category-2',
                'created_at' => '2022-03-17 04:59:42',
                'updated_at' => '2022-03-17 04:59:42',
            ),
            2 => 
            array (
                'id' => 3,
                'parent_id' => 1,
                'order' => 1,
                'name' => 'categoria 3',
                'slug' => 'categoria-3',
                'created_at' => '2022-03-17 05:02:42',
                'updated_at' => '2022-03-17 05:02:42',
            ),
            3 => 
            array (
                'id' => 4,
                'parent_id' => 3,
                'order' => 1,
                'name' => 'categoria 4',
                'slug' => 'categoria-4',
                'created_at' => '2022-03-17 05:08:31',
                'updated_at' => '2022-03-17 05:08:31',
            ),
            4 => 
            array (
                'id' => 5,
                'parent_id' => 3,
                'order' => 1,
                'name' => 'categoria 5',
                'slug' => 'categoria-5',
                'created_at' => '2022-03-17 05:08:56',
                'updated_at' => '2022-03-17 05:08:56',
            ),
        ));
        
        
    }
}