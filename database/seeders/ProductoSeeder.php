<?php

namespace Database\Seeders;

use App\Models\Producto;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Producto::factory()->count(20)->create([
            'shop_id'=> 1,

        ]);

        Producto::factory()->count(30)->create([
            'shop_id'=> 2,
            
        ]);
    }
}
