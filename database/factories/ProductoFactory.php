<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    
      
    public function definition()
    {
        return [
            'category_id'=>rand(1,2),
            'name'=> $this->faker->sentence(2), 
            'description'=> $this->faker->sentence(2), 
            'price'=> $this->faker->numberBetween(100,2000),
            
        ];
    }
}
