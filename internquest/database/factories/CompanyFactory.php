<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Location;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $areas = Area::distinct()->pluck('name');
        $index = count($areas);
        $int = rand(0, ($index - 1));
        $area = $areas[$int];
        $faker = \Faker\Factory::create('fr_FR');
        $companyName = $this->faker->company;

        return [
            'name' => strtoupper($companyName),
            'area' => $area,
            'website' => strtolower(str_replace(' ', '', $companyName)) . '.com',
        ];
    }

    /**
    * Configure the model factory.
    *
    * @return $this
    */
    public function configure()
    {
        return $this->afterCreating(function (Company $company) {

            $json = File::get(database_path('base_api.json'));
            $addresses = json_decode($json, true);

            $randomIndex = array_rand($addresses);
            $selectedAddress = $addresses[$randomIndex];
            $postalCode = $selectedAddress['code_postal'];
            $city = $selectedAddress['nom_de_la_commune'];

            $location = new Location([
                'postal_code' => $postalCode,
                'city' => strtoupper($city),
                'location' => 'Rue ' . $this->faker->streetName . ' ' . rand(1, 100) // Ajout d'un numéro de bâtiment aléatoire
            ]);

            $company->locations()->save($location);
        });
    }
}
