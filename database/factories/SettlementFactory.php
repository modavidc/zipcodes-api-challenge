<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\SettlementType;
use App\Models\ZipCode;

class SettlementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $settlementType = SettlementType::factory()->create();
        $zipCode = ZipCode::factory()->create();

        return [
            'key_id' => $this->faker->randomDigit(),
            'name' => $this->faker->realText(10),
            'zone_type' => $this->faker->realText(10),
            'settlement_type_id' => $settlementType->id,
            'zip_code_id' => $zipCode->id,
        ];
    }
}
