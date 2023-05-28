<?php

namespace Database\Factories;

use App\Models\Etudiants;
use App\Models\Villes;
use Illuminate\Database\Eloquent\Factories\Factory;

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

        $ville = Villes::inRandomOrder()->value('id'); // Recherche le ID d'une ville déja existant

        return [
            'prenom'    => $this->faker->firstName,
            'nom'       => $this->faker->lastName,
            'courriel'  => $this->faker->email,
            'telephone' => $this->faker->phoneNumber,
            'birthdate' => $this->faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'), // Generates a birthdate for someone who is at least 18 years old
            'ville_id'  => $ville
        ];
    }

    public function run()
    {
        Etudiants::factory()->times(100)->create();
    }
}
