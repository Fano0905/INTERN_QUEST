<?php

use App\Models\Application;
use App\Models\Offer;
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
        Schema::create('applications', function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->string('cv');
            $table->string('cover_letter');
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
