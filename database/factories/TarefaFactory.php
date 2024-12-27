<?php

namespace Database\Factories;

use App\Models\Tarefa;
use Illuminate\Database\Eloquent\Factories\Factory;

class TarefaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Tarefa::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence, // Frase aleatória
            'descricao' => $this->faker->paragraph, // Parágrafo aleatório
            'completa' => $this->faker->boolean(30), // 30% de chance de ser verdadeira
            'user_id' => null, // Será definido no Seeder
            'categoria_id' => null, // Será definido no Seeder
        ];
    }
}

