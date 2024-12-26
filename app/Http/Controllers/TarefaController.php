<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tarefa;
use App\Models\Categoria;

class TarefaController extends Controller
{
    // Exibe todas as tarefas
    public function index()
    {
        $tarefas = Tarefa::where('user_id', auth()->id())->get();
        return view('tarefas.index', compact('tarefas'));
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
            'categoria_id' => $request->categoria_id,
            'user_id' => auth()->id(),
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
