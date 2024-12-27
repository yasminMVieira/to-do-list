<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Criar Categoria
        </h2>
    </x-slot>

    <div class="py-12">

        <div class="container max-w-7xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
            
            <!-- Formulário -->
            <form action="{{ route('categorias.store') }}" method="POST">
                @csrf
    
                <!-- Nome da Categoria -->
                <div class="mb-4">
                    <label for="nome" class="block text-gray-700 dark:text-gray-200 font-medium">Nome</label>
                    <input type="text" name="nome" id="nome" class="mt-2 block w-full px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 bg-gray-50 dark:bg-gray-700 text-gray-800 dark:text-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                </div>
    
                <!-- Botões -->
                <div class="flex items-end space-x-4">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Salvar
                    </button>
                    <a href="{{ route('categorias.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
