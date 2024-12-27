<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\Categoria;

class TarefaController extends Controller
{
    // Exibe todas as tarefas
    public function index(Request $request)
    {
        $query = Tarefa::query();

        // Filtro por categoria
        if ($request->has('categoria_id') && $request->categoria_id) {
            $query->where('categoria_id', $request->categoria_id);
        }

        // Filtro por tarefas concluídas
        if ($request->has('concluida')) {
            $query->where('completa', true);
        }

        // Obter as tarefas com os filtros aplicados
        $tarefas = $query->get();

        // Obter todas as categorias para o filtro
        $categorias = Categoria::all();

        // Passar as tarefas e categorias para a view
        return view('tarefas.index', compact('tarefas', 'categorias'));

        // $tarefas = Tarefa::with('categoria')->get();  // Carrega as tarefas com suas categorias associadas
        // return view('tarefas.index', compact('tarefas'));  // Passa a variável $tarefas para a view
    }

    // Mostra o formulário para criar uma nova tarefa
    public function create()
    {
        $categorias = Categoria::all();
        return view('tarefas.create', compact('categorias'));
    }

    // Armazena uma nova tarefa
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Tarefa::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'categoria_id' => $request->categoria_id
        ]);

        return redirect()->route('tarefas.index');
    }

    // Mostra os detalhes de uma tarefa
    public function show(Tarefa $tarefa)
    {
        return view('tarefas.show', compact('tarefa'));
    }

    // Mostra o formulário para editar uma tarefa
    public function edit(Tarefa $tarefa)
    {
        $categorias = Categoria::all();
        return view('tarefas.edit', compact('tarefa', 'categorias'));
    }

    // Atualiza uma tarefa
    public function update(Request $request, Tarefa $tarefa)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $tarefa->update([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'categoria_id' => $request->categoria_id,
        ]);

        return redirect()->route('tarefas.index');
    }

    // Deleta uma tarefa
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return redirect()->route('tarefas.index');
    }
}
