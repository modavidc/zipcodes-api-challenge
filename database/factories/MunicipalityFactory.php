<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FederalEntity;

class MunicipalityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $federalEntity = FederalEntity::factory()->create();

        return [
            'key_id' => $this->faker->randomDigit(),
            'name' => $this->faker->state(),
            'federal_entity_id' => $federalEntity->id,
        ];
    }
}
