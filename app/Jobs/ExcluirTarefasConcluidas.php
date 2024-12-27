<?php

namespace App\Jobs;

use App\Models\Tarefa;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class ExcluirTarefasConcluidas implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        // Calcula a data limite para exclusão
        $dataLimite = Carbon::now()->subWeek();

        // Exclui tarefas concluídas há mais de uma semana
        Tarefa::where('completa', true)
            ->where('updated_at', '<', $dataLimite)
            ->delete();
    }
}

