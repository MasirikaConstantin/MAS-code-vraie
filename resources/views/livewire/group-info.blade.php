<div id="messages-container" class="w-84 h-full bg-white dark:bg-gray-800 border-l border-gray-200 dark:border-gray-700 flex flex-col">
    <!-- Info Header -->
    <div class="p-4 border-b border-gray-200 dark:border-gray-700 flex justify-between items-center shrink-0">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Informations du groupe</h4>
       
    </div>
    <div class=" overflow-y-auto ">

    <!-- Group Details -->
    <div class="p-4 flex flex-col items-center shrink-0">
        <!-- Group Avatar -->
        <div class="mb-2">
            @if($group->avatar)
                <img src="{{ $group->avatar }}" alt="{{ $group->name }}" class="w-10 h-10 rounded-full object-cover">
            @else
                <div class="w-10 h-10 rounded-full bg-blue-500 dark:bg-blue-600 flex items-center justify-center text-white text-3xl font-semibold">
                    {{ substr($group->name, 0, 1) }}
                </div>
            @endif
        </div>
        
        <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200 mb-2 text-center">{{ $group->name }}</h3>
        
        @if($group->description)
            <p class="text-sm text-gray-600 dark:text-gray-400 text-center px-2">{{ $group->description }}</p>
        @endif
    </div>
    
    <!-- Invite Section (Admin only) -->
    @if($isAdmin)
        <div class="p-4 z-666 border-t border-gray-200 dark:border-gray-700 shrink-0">
            <h5 class="text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">Inviter des membres</h5>
            <div class="relative">
                <input 
                    type="text" 
                    placeholder="Rechercher un utilisateur..." 
                    wire:model="searchTerm"
                    wire:keyup="searchUsers"
                    class="w-full px-1 py-0.8 border border-gray-300 dark:border-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200"
                >
                
                @if(count($searchResults) > 0)
                    <div class="absolute z-100 mt-1 w-full bg-white dark:bg-gray-700 shadow-lg rounded-md border border-gray-200 dark:border-gray-600 max-h-60 overflow-y-auto">
                        @foreach($searchResults as $user)
                            <div 
                                wire:click="inviteUser({{ $user->id }})" 
                                class="px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer flex items-center"
                            >
                                <div class="w-8 h-8 rounded-full bg-gray-300 dark:bg-gray-500 flex items-center justify-center text-sm text-gray-800 dark:text-gray-200 mr-2">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <div class="text-gray-800 dark:text-gray-200">{{ $user->name }}</div>
                            </div>
                        @endforeach
                    </div>
                @elseif(strlen($searchTerm) >= 2 && count($searchResults) === 0)
                    <div class="absolute z-10 mt-1 w-full bg-white dark:bg-gray-700 shadow-lg rounded-md border border-gray-200 dark:border-gray-600 p-4 text-sm text-gray-500 dark:text-gray-400">
                        Aucun utilisateur trouvé
                    </div>
                @endif
            </div>
        </div>
    @endif
    
    <!-- Members Section -->
    <div class="flex-1 p-4 border-t border-gray-200 dark:border-gray-700 overflow-y-auto">
        <h5 class="text-md font-semibold text-gray-800 dark:text-gray-200 mb-3  top-0 bg-white dark:bg-gray-800 pb-2 z-10">Membres ({{ count($members) }})</h5>
        <div class="space-y-2">
            @foreach($members as $member)
                <div class="flex items-center justify-between p-2 hover:bg-gray-100 dark:hover:bg-gray-700 rounded transition-colors">
                    <div class="flex items-center min-w-0">
                        <div class="w-8 h-8 rounded-full bg-gray-300 dark:bg-gray-500 flex items-center justify-center text-sm text-gray-800 dark:text-gray-200 mr-2 shrink-0">
                            {{ substr($member->name, 0, 1) }}
                        </div>
                        <div class="text-gray-800 dark:text-gray-200 truncate">
                            {{ $member->name }}
                            @if($member->pivot && $member->pivot->is_admin)
                                <span class="ml-2 text-xs bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 px-2 py-0.5 rounded-full whitespace-nowrap">Admin</span>
                            @endif
                        </div>
                    </div>
                    
                    @if($isAdmin && $member->id !== Auth::id())
                        <div class="flex space-x-1 shrink-0">
                            <button 
                                wire:click="toggleAdmin({{ $member->id }})" 
                                title="Toggle Admin"
                                class="p-1 rounded-full {{ $member->pivot && $member->pivot->is_admin ? 'bg-gray-200 dark:bg-gray-600 text-yellow-500' : 'text-gray-500 hover:bg-gray-200 dark:hover:bg-gray-600' }} transition-colors"
                            >
                                <i class="fas fa-crown text-sm"></i>
                            </button>
                            <button 
                                wire:click="removeUser({{ $member->id }})" 
                                title="Remove"
                                class="p-1 rounded-full text-red-500 hover:bg-red-100 dark:hover:bg-red-900 transition-colors"
                            >
                                <i class="fas fa-times text-sm"></i>
                            </button>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Bottom Actions -->
    @if($isAdmin && $member->id !== Auth::id())

    <div class="p-4 border-t border-gray-200 dark:border-gray-700 shrink-0">
        <button 
            wire:click="leaveGroup"
            class="w-full py-2 px-4 border border-red-500 text-red-500 dark:text-red-400 rounded-md hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors"
        >
            Quitter le groupe
        </button>
    </div>
    @endif

</div>


</div>