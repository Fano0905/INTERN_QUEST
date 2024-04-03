<?php

namespace Database\Factories;

use App\Models\Area;
use App\Models\Location;
use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

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
            // Pas besoin d'inclure la location ici, elle sera attachée après la création
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
            $faker = \Faker\Factory::create('fr_FR');
            $city = $faker->city();
            $postalCode = $faker->postcode();

            // Créer une instance de Location et l'attacher à la Company
            $location = new Location([
                'postal_code' => $postalCode,
                'city' => strtoupper($city),
                'location' => $faker->address()
            ]);

            // Supposons que la relation entre Company et Location est hasMany
            $company->locations()->save($location);

            // Si la relation est hasOne, utilisez cette ligne à la place :
            // $company->location()->save($location);
        });
    }
}
