<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Location;
use Faker\Provider\fi_FI\Company as Fi_FICompany;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $companyIds = Company::pluck('id'); // Récupère tous les id existants
        $company = $companyIds->random(); // Sélectionne un id aléatoire parmi eux
        $villes = Location::distinct()->pluck('city');
        $duree = ['6 mois', '2 mois', '4 mois', '8 mois'];
        $index = count($duree);
        $indice = count($villes);
        $index_duration = rand(0, ($index - 1));
        $indice_city = rand(0, ($indice - 1));
        $duration = $duree[$index_duration];
        $city = $villes[$indice_city];

        return [
            'title' => fake()->jobTitle(),
            'company_id' => $company,
            'city' => $city,
            'duration' => $duration,
            'remuneration' => rand(665, 1200),
            'date_offer' => date('d/m/Y'),
            'place_offered' => \rand(1, 20),
            'description' => \fake()->text(2000)
        ];
    }
}
