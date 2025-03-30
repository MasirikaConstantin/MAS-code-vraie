<div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 max-w-md mx-auto max-h-[80vh] flex flex-col">
    <!-- Header -->
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700 pb-3 shrink-0">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Créer un nouveau groupe</h4>
    </div>
    
    <!-- Form Container (scrollable area) -->
    <div class="flex-1 overflow-y-auto pr-2 -mr-2"> <!-- Padding pour compenser la scrollbar -->
        <form wire:submit.prevent="createGroup" class="space-y-4">
            <!-- Group Name -->
            <div class="flex justify-end space-x-3 pt-1    shrink-0">
                <!--button type="button" class="px-2 py-1 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm text-sm font-medium text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
                        wire:click="$dispatch('toggleCreateGroup')">
                    Annuler
                </button-->
                <button type="submit" wire:loading.attr="disabled" 
                        class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50">
                    <span wire:loading.remove>Créer le groupe</span>
                    <span wire:loading>
                        <i class="fas fa-spinner fa-spin mr-1"></i> Création...
                    </span>
                </button>
            </div>

            <div>
                <label for="groupName" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nom du groupe</label>
                <input type="text" id="groupName" wire:model="name"
                       class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('name') border-red-500 @enderror">
                @error('name') <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
            </div>
            
            <!-- Description -->
            <div>
                <label for="groupDescription" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Description</label>
                <textarea id="groupDescription" wire:model="description" rows="1"
                          class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('description') border-red-500 @enderror"></textarea>
                @error('description') <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
            </div>
            
            <!-- Avatar -->
            <div>
                <label for="groupAvatar" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Avatar du groupe</label>
                <input type="file" id="groupAvatar" wire:model="avatar" accept="image/*"
                       class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white @error('avatar') border-red-500 @enderror">
                @error('avatar') <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> @enderror
                
                @if($avatar)
                    <div class="mt-2">
                        <img src="{{ $avatar->temporaryUrl() }}" class="h-20 w-20 rounded-md object-cover" alt="Preview">
                    </div>
                @endif
            </div>
            
            <!-- User Search -->
            <div>
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Ajouter des membres</label>
                <div class="relative">
                    <input type="text" placeholder="Rechercher un utilisateur..." 
                           wire:model="searchTerm" wire:keyup.debounce.300ms="searchUsers"
                           class="w-full px-3 py-2 border rounded-md shadow-sm focus:outline-none focus:ring-1 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    
                    @if(count($searchResults) > 0)
                        <div class="absolute z-10 mt-1 w-full bg-white dark:bg-gray-700 shadow-lg rounded-md max-h-60 overflow-y-auto border border-gray-200 dark:border-gray-600">
                            @foreach($searchResults as $user)
                                <div class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer flex items-center"
                                     wire:click="selectUser({{ $user['id'] }}, '{{ $user['name'] }}')">
                                    <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-300 dark:bg-gray-500 flex items-center justify-center text-sm text-gray-800 dark:text-gray-200 mr-2">
                                        {{ substr($user['name'], 0, 1) }}
                                    </div>
                                    <div class="text-gray-800 dark:text-gray-200">{{ $user['name'] }}</div>
                                </div>
                            @endforeach
                        </div>
                    @elseif(strlen($searchTerm) >= 2 && count($searchResults) === 0)
                        <div class="absolute z-10 mt-1 w-full bg-white dark:bg-gray-700 shadow-lg rounded-md p-4 text-sm text-gray-500 dark:text-gray-400 border border-gray-200 dark:border-gray-600">
                            Aucun utilisateur trouvé
                        </div>
                    @endif
                </div>
            </div>
            
            <!-- Selected Users -->
            @if(count($selectedUsers) > 0)
                <div>
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Membres sélectionnés ({{ count($selectedUsers) }})</label>
                    <div class="flex flex-wrap gap-2 max-h-40 overflow-y-auto p-1">
                        @foreach($selectedUsers as $index => $user)
                            <div class="flex items-center bg-gray-100 dark:bg-gray-600 rounded-full px-3 py-1 shrink-0">
                                <div class="flex-shrink-0 h-6 w-6 rounded-full bg-gray-300 dark:bg-gray-500 flex items-center justify-center text-xs text-gray-800 dark:text-gray-200 mr-1">
                                    {{ substr($user['name'], 0, 1) }}
                                </div>
                                <span class="text-sm text-gray-800 dark:text-gray-200 mr-1">{{ $user['name'] }}</span>
                                <button type="button" class="text-gray-500 dark:text-gray-300 hover:text-red-500 dark:hover:text-red-400"
                                        wire:click.prevent="removeSelectedUser({{ $index }})">
                                    <i class="fas fa-times text-xs"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            
        </form>

        
    </div>
    
    <!-- Actions (fixed at bottom) -->
   
</div>