<?php

use App\Models\Promo;
use App\Models\Promotion;
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
        Schema::create('promos', function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->string('name');
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
        });
        Schema::create('promos_users', function(Blueprint $table){
            $table->foreignIdFor(Promo::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->primary('promo_id', 'user_id');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('promos');
        Schema::dropIfExists('promos_users');
    }
};
