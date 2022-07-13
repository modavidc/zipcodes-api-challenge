<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FederalEntity;
use App\Models\Municipality;

class ZipCodeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $federalEntity = FederalEntity::factory()->create();
        $municipality = Municipality::factory()->create();

        return [
            'zip_code' => $this->faker->numberBetween(10000, 20000),
            'locality' => $this->faker->city(),
            'federal_entity_id' => $federalEntity->id,
            'municipality_id' => $municipality->id,
        ];
    }
}
