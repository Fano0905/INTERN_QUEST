<?php

use App\Models\Area;
use App\Models\Company;
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
        Schema::create('areas', function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->string('name')->unique();
        });
        Schema::create('areas_company', function(Blueprint $table){
            $table->foreignIdFor(Area::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Company::class)->constrained()->cascadeOnDelete();
            $table->primary(['area_id', 'company_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
