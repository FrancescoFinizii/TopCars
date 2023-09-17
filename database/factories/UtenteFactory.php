<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Utente>
 */
class UtenteFactory extends Factory
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
            'username' => $this->faker->unique()->userName(),
            'password' => 'Qwerty123@',
            'remember_token' => Str::random(10),
        ];
    }
}

