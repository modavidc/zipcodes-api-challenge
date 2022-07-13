<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FederalEntityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'key_id' => $this->faker->randomDigit(),
            'name' => $this->faker->state(),
            'code' => null,
        ];
    }
}
