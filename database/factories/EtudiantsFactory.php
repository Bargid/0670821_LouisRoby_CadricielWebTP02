<?php

namespace Database\Factories;

use App\Models\Etudiants;
use App\Models\Villes;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
// use Illuminate\Foundation\Auth\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiants>
 */
class EtudiantsFactory extends Factory
{

    protected $model = Etudiants::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $ville = Villes::inRandomOrder()->first(); // Recherche le ID d'une ville déja existant
        $user = User::factory()->create();

        return [
            'id'        => $user->id,
            'ville_id'  => $ville
        ];
    }

    public function run()
    {
        Etudiants::factory()->times(100)->create();
    }
}
