<?php

namespace Database\Factories;

use App\Models\Villes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Villes>
 */
class VillesFactory extends Factory
{

    protected $model = Villes::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->city,
        ];
    }

    public function run()
    {
        Villes::factory()->times(15)->create();
    }
}
