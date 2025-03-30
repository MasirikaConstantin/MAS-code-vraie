<div class="flex h-[500px] w-full max-w-4xl mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
    <!-- Sidebar -->
    <div class="w-1/1.6 border-r flex flex-col border-gray-200 dark:border-gray-700">
        <!-- Header -->
        <div class="p-3 border-b flex justify-between items-center bg-gray-50 dark:bg-gray-700 border-gray-200 dark:border-gray-600">
            <h3 class="font-semibold text-gray-800 dark:text-gray-200">Messagerie</h3>
            <div class="flex space-x-0.5">
                <button wire:click="toggleCreateGroup" class="p-1 rounded bg-blue-500 text-white hover:bg-blue-600 text-sm transition-colors">
                    <i class="fas fa-plus"></i>
                </button>
                <button wire:click="toggleInvitations" class="p-1 rounded bg-blue-400 text-white hover:bg-blue-500 relative text-sm transition-colors">
                    <i class="fas fa-envelope"></i>
                    @if($invitations->count() > 0)
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-[10px] rounded-full h-4 w-4 flex items-center justify-center">
                            {{ $invitations->count() }}
                        </span>
                    @endif
                </button>
            </div>
        </div>
        
        <!-- Groups List -->
        <div class="flex-1 overflow-y-auto">
            @foreach($groups as $group)
                <div wire:click="setActiveGroup({{ $group->id }})"
                     class="flex items-center p-2 hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer {{ $activeGroupId == $group->id ? 'bg-blue-50 dark:bg-blue-900' : '' }} transition-colors">
                    <!-- Avatar -->
                    <div class="shrink-0">
                        @if($group->avatar)
                            <img src="{{ $group->avatar }}" alt="{{ $group->name }}" class="w-8 h-8 rounded-full object-cover">
                        @else
                            <div class="w-8 h-8 rounded-full bg-gray-200 dark:bg-gray-600 flex items-center justify-center text-sm text-gray-800 dark:text-gray-200">
                                {{ substr($group->name, 0, 1) }}
                            </div>
                        @endif
                    </div>
                    
                    <!-- Group Info -->
                    <div class="ml-2 flex-1 min-w-0">
                        <div class="text-sm font-medium truncate text-gray-800 dark:text-gray-200">{{ $group->name }}</div>
                        <div class="text-xs text-gray-500 dark:text-gray-400 truncate">
                            @if($group->latestMessage)
                                {{ Str::limit($group->latestMessage->content ?? 'Aucun contenu', 15) }}
                            @else
                                Aucun message
                            @endif
                        </div>
                                                                                                
                    </div>
                    
                    <!-- Unread Badge -->
                    @if($group->unread_count > 0)
                        <div class="ml-1 bg-red-500 text-white text-[10px] rounded-full h-4 w-4 flex items-center justify-center">
                            {{ $group->unread_count }}
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        @if($activeGroupId)
        
        @livewire('group-chat', ['groupId' => $activeGroupId], key('group-' . $activeGroupId))
                @elseif($showInvitations)
            @livewire('invitations-list')
        @elseif($showCreateGroup)
            @livewire('create-group')
        @else
            <div class="flex-1 flex flex-col items-center justify-center p-4 text-center text-gray-500 dark:text-gray-400">
                <i class="fas fa-comments text-3xl mb-2"></i>
                <p class="text-sm">Sélectionnez un groupe pour commencer</p>
            </div>
        @endif
    </div>
    
    <!-- Info Sidebar -->
    @if($showGroupInfo && $activeGroupId)
        <div class="w-1/3 border-l bg-white dark:bg-gray-800 border-gray-200 dark:border-gray-700">
            @livewire('group-info', ['groupId' => $activeGroupId], key('info-' . $activeGroupId))
            
        </div>
    @endif
</div>