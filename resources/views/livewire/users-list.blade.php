<div>
    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    <div class="mb-4 flex justify-between">
        <h2 class="text-xl font-semibold">Liste des utilisateurs</h2>
        <button 
            wire:click="deleteSelected" 
            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-800 transition"
            @if($bulkDisabled) disabled @endif
            :class="{'opacity-50 cursor-not-allowed': {{ $bulkDisabled ? 'true' : 'false' }}}"
        >
            Supprimer la sélection
        </button>
    </div>

    <div class="bg-gary-800 overflow-hidden shadow-md rounded-lg">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-550">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <div class="flex items-center">
                            <input 
                                wire:model="selectAll" 
                                type="checkbox" 
                                class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                            >
                        </div>
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Nom
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Email
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Date d'inscription
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <input 
                                    wire:change="toggleUser('{{ $user->id }}')" 
                                    value="{{ $user->id }}" 
                                    type="checkbox" 
                                    class="h-4 w-4 text-blue-600 border-gray-300 rounded"
                                    @checked(in_array($user->id, $selectedUsers))
                                >
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="text-sm font-medium text-gray-900">
                                    {{ $user->name }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-500">{{ $user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $user->created_at->format('d/m/Y') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>