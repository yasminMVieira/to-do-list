<?php

namespace Database\Seeders;

use App\Models\Tarefa;
use App\Models\User;
use App\Models\Categoria;
use Illuminate\Database\Seeder;

class TarefaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Certifique-se de que há usuários e categorias no banco de dados
        if (User::count() === 0 || Categoria::count() === 0) {
            $this->command->warn("Nenhum usuário ou categoria encontrado! Execute os Seeders para usuários e categorias primeiro.");
            return;
        }

        // Cria tarefas para cada usuário
        $users = User::all();
        foreach ($users as $user) {
            $categorias = Categoria::where('user_id', $user->id)->get();

            foreach ($categorias as $categoria) {
                Tarefa::factory(10)->create([
                    'user_id' => $user->id, // Relaciona ao usuário
                    'categoria_id' => $categoria->id, // Relaciona à categoria
                ]);
            }
        }

        $this->command->info('Tarefas criadas com sucesso!');
    }
}

