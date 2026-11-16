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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->constrained();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('gender', ['male', 'female']);
            $table->unsignedInteger('age');
            $table->string('phone')->unique();
            $table->string('image')->nullable();
            $table->boolean('online')->default(false);
            $table->boolean('ban')->default(false);
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
