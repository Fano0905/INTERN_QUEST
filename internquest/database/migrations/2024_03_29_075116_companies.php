<?php

use App\Models\Company;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('companies', function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->string('name')->unique();
            $table->string('area');
            $table->string('website');
            $table->decimal('evaluation', 2, 2, true);
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Location::class)->constrained()->cascadeOnDelete();
        });
        Schema::create('companies_locations', function(Blueprint $table){
            $table->foreignIdFor(Company::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Location::class)->constrained()->cascadeOnDelete();
            $table->primary(['company_id', 'location_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
