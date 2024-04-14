<?php

namespace Database\Factories;

use App\Models\Application;
use App\Models\Offer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Application>
 */
class ApplicationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::where('role', 'Etudiant')->orWhere('role', 'Admin')->pluck('id'); // Récupère tous les id existants des utilisateurs avec le rôle Pilote ou Admin
        $user = $users->random();
        return [
            'cv' => \fake()->text(),
            'cover_letter' => \fake()->text,
            'user_id' => $user
        ];
    }
    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Application $application) {
            $offer = Offer::pluck('id');
            $offer->random();
            $application->offres()->attach($offer);
        });
    }
}
