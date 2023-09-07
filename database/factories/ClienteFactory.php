<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
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
            'residenza' => $this->faker->state(),
            'occupazione' => $this->faker->randomElement(['Non specificato', 'Dipendente', 'Libero professionista', 'Studente', 'Disoccupato']),
            'dataNascita' => $this->faker->date("Y-m-d", "-18 years"),
            'foto' => "storage/avatar.png",
        ];
    }
}
