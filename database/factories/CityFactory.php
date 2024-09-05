<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\City>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $province = \App\Models\Province::first();

        return [
            'province_id' => $province->id,
            'code' => $this->faker->unique()->regexify('[1-9]{4}'),
            'name' => $this->faker->unique()->city(),
        ];
    }
}
