<?php

namespace Database\Factories;


use App\Models\Company;
use App\Models\User;
use App\Models\CompaniesEvaluations;
use App\Models\Evaluation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evaluation>
 */
class EvaluationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();
        $company = Company::inRandomOrder()->first();

        return [
            'note' => $this->faker->numberBetween(0, 5),
            'comment' => $this->faker->text,
            'title' => $this->faker->sentence,
            'user_id' => $user->id,
            'company_id' => $company->id,
        ];
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Evaluation $evaluation) {
            CompaniesEvaluations::create(['company_id' => $evaluation->company_id, 'evaluation_id' => $evaluation->id]);
        });
    }
}
