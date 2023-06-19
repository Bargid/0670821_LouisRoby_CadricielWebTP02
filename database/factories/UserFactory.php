<?php

namespace Database\Factories;

use App\Models\Etudiants;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiants>
 */
class UserFactory extends Factory
{

    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'prenom'    => $this->faker->firstName,
            'nom'       => $this->faker->lastName,
            'email'     => $this->faker->email,
            'telephone' => $this->faker->phoneNumber,
            'birthdate' => $this->faker->dateTimeBetween('-50 years', '-18 years')->format('Y-m-d'), // Generates a birthdate for someone who is at least 18 years old
            'password'  => bcrypt('password') // Set a default password value
        ];
    }

    public function run()
    {
        Etudiants::factory()->times(100)->create();
    }
}
