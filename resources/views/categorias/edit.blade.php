<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Categoria
        </h2>
    </x-slot>

    <div class="container mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <!-- Título -->
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">Editar Categoria</h1>

        <!-- Formulário -->
        <form action="{{ route('categorias.update', $categoria) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Nome
                </label>
                <input 
                    type="text" 
                    name="nome" 
                    id="nome" 
                    value="{{ $categoria->nome }}" 
                    class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500" 
                    required
                />
            </div>
            
            <div class="flex items-center space-x-4">
                <button 
                    type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Atualizar
                </button>
                <a 
                    href="{{ route('categorias.index') }}" 
                    class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
