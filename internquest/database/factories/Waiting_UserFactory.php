<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Waiting_User>
 */
class Waiting_UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lname' => $this->faker->lastName(),
            'fname' => $this->faker->firstName(),
            'mail' => $this->faker->unique()->safeEmail(),
            'username' => $this->faker->unique()->userName(),
            'role' => $this->faker->randomElement(['Etudiant', 'Pilote']),
            'password' => Hash::make($this->faker->password()),
        ];
    }
}
