<?php

namespace Database\Factories;

use App\Models\Pastel;
use Illuminate\Database\Eloquent\Factories\Factory;

class PastelFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pastel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word,
            'preco' => $this->faker->randomNumber(),
            'foto' => $this->faker->image(storage_path())
        ];
    }
}
