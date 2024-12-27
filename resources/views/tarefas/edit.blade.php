<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Tarefa
        </h2>
    </x-slot>

    <div class="container mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Editar Tarefa</h1>

        <!-- Formulário -->
        <form action="{{ route('tarefas.update', $tarefa) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Título -->
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 dark:text-gray-200 font-medium">Título</label>
                <input type="text" name="titulo" id="titulo" class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500" value="{{ $tarefa->titulo }}" required>
            </div>

            <!-- Descrição -->
            <div class="mb-4">
                <label for="descricao" class="block text-gray-700 dark:text-gray-200 font-medium">Descrição</label>
                <textarea name="descricao" id="descricao" class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>{{ $tarefa->descricao }}</textarea>
            </div>

            <!-- Categoria -->
            <div class="mb-4">
                <label for="categoria_id" class="block text-gray-700 dark:text-gray-200 font-medium">Categoria</label>
                <select name="categoria_id" id="categoria_id" class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" @if($tarefa->categoria_id == $categoria->id) selected @endif>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botões -->
            <div class="flex justify-between">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Atualizar
                </button>
                <a href="{{ route('tarefas.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
