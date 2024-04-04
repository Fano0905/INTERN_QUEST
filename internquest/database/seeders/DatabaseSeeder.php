<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Application;
use App\Models\Company;
use App\Models\Offer;
use App\Models\Post;
use App\Models\Promo;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder

{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
             'name' => 'Test User',
             'email' => 'test@example.com',
         ]);

<<<<<<< Updated upstream
        User::factory(1)->create();
        //Offer::factory(2)->create();
        //Company::factory(10)->create();
        //Promo::factory(5)->create();
        //Application::factory(5)->create();
=======
        User::factory(10)->create();
        Offer::factory(2)->create();
        Company::factory(10)->create();
        Promo::factory(5)->create();
        Application::factory(5)->create();
>>>>>>> Stashed changes
    }
}
