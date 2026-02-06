<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ChirpFactory extends Factory
{
     protected $model=\App\Models\Chirp::class;

    public function definition(): array
    {
       
        return [
        'message'=>fake()->realText(255),
        ];
    }
}
