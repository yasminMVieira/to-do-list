<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    // Exibe todas as categorias
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    // Mostra o formulário para criar uma nova categoria
    public function create()
    {
        return view('categorias.create');
    }

    // Armazena uma nova categoria
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Categoria::create([
            'nome' => $request->nome,
            'user_id' => auth()->id(), // Associa ao usuário autenticado
        ]);

        return redirect()->route('categorias.index');
    }

    // Mostra os detalhes de uma categoria
    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    // Mostra o formulário para editar uma categoria
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    // Atualiza uma categoria
    public function update(Request $request, Categoria $categoria)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $categoria->update([
            'nome' => $request->nome,
        ]);

        return redirect()->route('categorias.index');
    }

    // Deleta uma categoria
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }
}
