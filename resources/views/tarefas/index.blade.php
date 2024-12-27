<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tarefas
        </h2>
    </x-slot>

    <div class='py-12'>

        <div class="container max-w-7xl mx-auto p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
            <!-- Filtro e Botão Criar -->
            <div class="flex justify-between items-center mb-6">
                <form method="GET" action="{{ route('tarefas.index') }}" class="space-x-4 mb-6">
                    <!-- Filtro por Categoria -->
                    <div class="inline-block">
                        <label for="categoria_id" class="text-gray-700 dark:text-gray-200">Categoria</label>
                        <select name="categoria_id" id="categoria_id" class="mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="">Selecione a categoria</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                                    {{ $categoria->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
    
                    <!-- Filtro por Concluídas -->
                    <div class="inline-block">
                        <label for="concluida" class="text-gray-700 dark:text-gray-200">Mostrar Concluídas</label>
                        <input type="checkbox" name="concluida" id="concluida" {{ request('concluida') ? 'checked' : '' }} class="ml-2">
                    </div>
    
                    <!-- Botão de Filtro -->
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Filtrar
                    </button>
                </form>
                <a href="{{ route('tarefas.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Criar Nova Tarefa
                </a>
            </div>
    
            <!-- Tabela -->
            <div class="overflow-x-auto">
                <table class="min-w-full border border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-800 rounded-lg">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200">
                            <th class="px-4 py-2 text-center"></th>
                            <th class="px-4 py-2 text-center">ID</th>
                            <th class="px-4 py-2 text-center">Título</th>
                            <th class="px-4 py-2 text-center">Descrição</th>
                            <th class="px-4 py-2 text-center">Categoria</th>
                            <th class="px-4 py-2 text-center">Status</th>
                            <th class="px-4 py-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tarefas as $tarefa)
                            <tr class="border-t border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-2 text-center">
                                    <!-- Botão para marcar como concluída -->
                                    @if(!$tarefa->completa)
                                        <form action="{{ route('tarefas.concluir', $tarefa) }}" method="POST" class="inline">
                                            @csrf                                          
                                            <button type="submit" class="px-3 py-1 bg-green-500 text-white rounded-md text-sm hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                                                Concluir
                                        </form>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-gray-800 text-center dark:text-gray-200">{{ $tarefa->id }}</td>
                                <td class="px-4 py-2 text-gray-800 text-center dark:text-gray-200">{{ $tarefa->titulo }}</td>
                                <td class="px-4 py-2 text-gray-800 text-center dark:text-gray-200">{{ $tarefa->descricao }}</td>
                                <td class="px-4 py-2 text-gray-800 text-center dark:text-gray-200">{{ $tarefa->categoria->nome }}</td>
                                <td class="px-4 py-2 text-gray-800 text-center dark:text-gray-200">
                                    @if($tarefa->completa)
                                        <span class="text-green-500">Concluída</span>
                                    @else
                                        <span class="text-red-500">Pendente</span>
                                    @endif
                                </td>                                
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
