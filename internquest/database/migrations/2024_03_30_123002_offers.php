<?php

use App\Models\Offer;
use App\Models\Skill;
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
        Schema::create('offers_skills', function(Blueprint $table){
            $table->foreignIdFor(Offer::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Skill::class)->constrained()->cascadeOnDelete();
            $table->primary(['offer_id', 'skill_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
