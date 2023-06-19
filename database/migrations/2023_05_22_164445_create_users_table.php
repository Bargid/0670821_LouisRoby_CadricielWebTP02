<?php

use App\Models\Etudiants;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->date('birthdate');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telephone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();

            // $table->foreignId('etudiant_id')->constrained('etudiants');
            // $table->string('etudiant_courriel')->nullable();
            // $table->foreign('etudiant_courriel')->references('courriel')->on('etudiants');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};
