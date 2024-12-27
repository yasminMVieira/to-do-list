<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Categoria::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nome' => $this->faker->word, // Gera uma palavra aleatória
            'user_id' => null, // Será preenchido pelo Seeder
        ];
    }
}

