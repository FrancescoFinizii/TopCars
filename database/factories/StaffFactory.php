<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        return [
            'id' => $this->faker->unique()->numberBetween(3, 5000),
            'nome' => $this->faker->firstName(),
            'cognome' => $this->faker->lastName(),
            'foto' => 'storage/avatar.png',
        ];
    }
}
