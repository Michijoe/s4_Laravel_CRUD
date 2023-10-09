<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ForumPost>
 */
class ForumPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker_fr = \Faker\Factory::create('fr_FR');
        return [
            'title' => $this->faker->catchPhrase,
            'title_fr' => $faker_fr->catchPhrase,
            'body'  => $this->faker->paragraph(30),
            'body_fr'  => $faker_fr->paragraph(30),
            'user_id' => User::all()->random()->id,
        ];
    }
}
