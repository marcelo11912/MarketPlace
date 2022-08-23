<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::factory()->create([
            'user_id'=>5,
        ]);
        Shop::factory()->create([
            'user_id'=>8,
        ]);
    }
}
