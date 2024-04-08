<?php

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
        Schema::create('waiting_users', function (Blueprint $table) {
            $table->id();
            $table->string('lname');
            $table->string('fname');
            $table->string('mail')->unique();
            $table->string('password');
            $table->string('username')->unique();
            $table->string('role');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('waiting_users');
    }
};
