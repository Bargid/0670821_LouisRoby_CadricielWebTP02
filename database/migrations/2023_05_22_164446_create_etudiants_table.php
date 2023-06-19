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
        Schema::create('etudiants', function (Blueprint $table) {
            $table->primary('id');
            $table->foreignId('id')->constrained('users')->onDelete('cascade');
            $table->foreignId('ville_id')->constrained('villes');
            
            $table->timestamps();

           //$table->foreign('ville_id')->references('id')->on('villes'); // Add the foreign key constraint

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etudiants');
    }
};
