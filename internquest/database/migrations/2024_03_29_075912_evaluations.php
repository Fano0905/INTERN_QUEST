<?php

use App\Models\Company;
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
        Schema::create('evaluations', function(Blueprint $table){
            $table->id()->autoIncrement();
            $table->decimal('note', 2, 2, true);
            $table->string('object');
            $table->string('comment');
            $table->foreignIdFor(Company::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
        Schema::create('companies_evaluations', function(Blueprint $table){
            $table->foreignIdFor(Company::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
