<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\User; // Para associar categorias a usuários
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Certifique-se de que existem usuários no banco de dados
        if (User::count() === 0) {
            $this->command->warn("Nenhum usuário encontrado! Execute o UserSeeder primeiro.");
            return;
        }

        // Obtenha uma lista de usuários
        $users = User::all();

        // Crie categorias para cada usuário
        foreach ($users as $user) {
            Categoria::factory(5)->create([
                'user_id' => $user->id, // Associa as categorias ao usuário
            ]);
        }

        $this->command->info('Categorias criadas com sucesso!');
    }
}

