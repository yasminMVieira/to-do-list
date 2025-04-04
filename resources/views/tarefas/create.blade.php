<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Criar Tarefa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container max-w-7xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
            
            <!-- Formulário -->
            <form action="{{ route('tarefas.store') }}" method="POST">
                @csrf
    
                <!-- Título -->
                <div class="mb-4">
                    <label for="titulo" class="block text-gray-700 dark:text-gray-200 font-medium">Título</label>
                    <input type="text" name="titulo" id="titulo" class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>
    
                <!-- Descrição -->
                <div class="mb-4">
                    <label for="descricao" class="block text-gray-700 dark:text-gray-200 font-medium">Descrição</label>
                    <textarea name="descricao" id="descricao" class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
                </div>
    
                <!-- Categoria -->
                <div class="mb-4">
                    <label for="categoria_id" class="block text-gray-700 dark:text-gray-200 font-medium">Categoria</label>
                    <select name="categoria_id" id="categoria_id" class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                        @endforeach
                    </select>
                </div>
    
                <!-- Botões -->
                <div class="flex items-center space-x-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Salvar
                    </button>
                    <a href="{{ route('tarefas.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>

    </div>
</x-app-layout>
