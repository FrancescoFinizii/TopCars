<?php

namespace Database\Factories;

use Carbon\Carbon;
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

        $dataNascita = $this->faker->dateTimeBetween("-70 years", "-19 years");

        return [
            'id' => $this->faker->unique()->numberBetween(3, 5000),
            'nome' => $this->faker->firstName(),
            'cognome' => $this->faker->lastName(),
            'residenza' => $this->faker->state(),
            'occupazione' => date_diff(Carbon::now(), $dataNascita)->y <= 25 ? "Studente" : $this->faker->randomElement(['Non specificato', 'Dipendente', 'Libero professionista', 'Disoccupato']),
            'dataNascita' => $dataNascita->format("Y-m-d"),
            'foto' => "storage/avatar.png",
        ];
    }
}
