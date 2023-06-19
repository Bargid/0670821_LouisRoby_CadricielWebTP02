<?php

namespace Database\Factories;

use App\Models\Etudiants;
use App\Models\User;
use App\Models\ForumPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Stichoza\GoogleTranslate\GoogleTranslate;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Etudiants>
 */
class ForumPostFactory extends Factory
{

    protected $model = ForumPost::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::pluck('id')->random(); // Get a random user_id from the existing User model

        $title_latin = $this->faker->unique()->sentence;
        $body_latin = $this->faker->unique()->paragraph;
        $trad_FR = new GoogleTranslate('fr');
        $trad_EN = new GoogleTranslate('en');

        return [
            'title_EN'  =>$trad_EN->translate($title_latin),
            'body_EN'   =>$trad_EN->translate($body_latin),
            'title_FR'  =>$trad_FR->translate($title_latin),
            'body_FR'   =>$trad_FR->translate($body_latin),
            'user_id'   => $user_id
        ];
    }
}
