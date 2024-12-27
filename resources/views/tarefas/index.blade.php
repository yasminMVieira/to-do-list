<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tarefas
        </h2>
    </x-slot>

    <div class='py-12'>

        <div class="container max-w-7xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
            <!-- Título e Botão Criar -->
            <div class="flex justify-end items-center mb-6">
                
                <a href="{{ route('tarefas.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Criar Nova Tarefa
                </a>
            </div>
    
            <!-- Tabela -->
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                            <th class="px-4 py-2 text-left">ID</th>
                            <th class="px-4 py-2 text-left">Título</th>
                            <th class="px-4 py-2 text-left">Descrição</th>
                            <th class="px-4 py-2 text-left">Categoria</th>
                            <th class="px-4 py-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tarefas as $tarefa)
                            <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $tarefa->id }}</td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $tarefa->titulo }}</td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $tarefa->descricao }}</td>
                                <td class="px-4 py-2 text-gray-800 dark:text-gray-200">{{ $tarefa->categoria->nome }}</td>
                                <td class="px-4 py-2 text-center">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('tarefas.edit', $tarefa) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-md text-sm hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500">
                                            Editar
                                        </a>
                                        <form action="{{ route('tarefas.destroy', $tarefa) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md text-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                                Excluir
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
