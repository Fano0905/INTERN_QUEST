<?php

namespace Database\Factories;

use App\Models\Promo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promo>
 */
class PromoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::where('role', 'Pilote')->orWhere('role', 'Admin')->pluck('id'); // Récupère tous les id existants des utilisateurs avec le rôle Pilote ou Admin
        $user = $users->random();
        $classList = ['Mathématiques', 'Français', 'Histoire', 'Géographie', 'Biologie', 'Physique', 'Chimie', 'Informatique', 'Arts', 'Musique', 'Éducation physique'];
        $levelList = ['1A', '1B', '2A', '2B', '3A', '3B'];
        $className = $classList[array_rand($classList)] . '-' . $levelList[array_rand($levelList)];

        return [
            'name' => $className,
            'pilote_id' => $user
        ];
    }
}
