<div class="w-full max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow border border-gray-200 dark:border-gray-700">
    <!-- Header -->
    <div class="p-3 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
        <h4 class="text-sm font-semibold text-gray-800 dark:text-gray-200">Invitations en attente</h4>
    </div>
    
    <!-- Content -->
    <div class="divide-y divide-gray-200 dark:divide-gray-700 max-h-96 overflow-y-auto">
        @if(count($invitations) > 0)
            @foreach($invitations as $invitation)
                <div class="p-3 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                    <div class="flex items-start space-x-2">
                        <!-- Group Avatar -->
                        <div class="flex-shrink-0">
                            @if($invitation->messageGroup->avatar)
                                <img src="{{ $invitation->messageGroup->avatar }}" 
                                     alt="{{ $invitation->messageGroup->name }}"
                                     class="w-8 h-8 rounded-full object-cover">
                            @else
                                <div class="w-8 h-8 rounded-full bg-blue-500 dark:bg-blue-600 flex items-center justify-center text-xs text-white">
                                    {{ substr($invitation->messageGroup->name, 0, 1) }}
                                </div>
                            @endif
                        </div>
                        
                        <!-- Invitation Info -->
                        <div class="flex-1 min-w-0">
                            <div class="text-xs font-medium text-gray-800 dark:text-gray-200 truncate">
                                {{ $invitation->messageGroup->name }}
                            </div>
                            <div class="text-xs text-gray-500 dark:text-gray-400">
                                Invité par {{ $invitation->inviter->name }}
                            </div>
                            <div class="text-xs text-gray-400 dark:text-gray-500">
                                {{ $invitation->created_at->diffForHumans() }}
                            </div>
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex space-x-1">
                            <button 
                                wire:click="acceptInvitation({{ $invitation->id }})"
                                class="p-1.5 rounded text-white bg-green-500 hover:bg-green-600 text-xs"
                                title="Accepter"
                            >
                                <i class="fas fa-check"></i>
                            </button>
                            <button 
                                wire:click="rejectInvitation({{ $invitation->id }})"
                                class="p-1.5 rounded text-white bg-red-500 hover:bg-red-600 text-xs"
                                title="Refuser"
                            >
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="p-4 text-center mt-3">
                <p class="text-xs text-gray-500 dark:text-gray-400">Vous n'avez pas d'invitations en attente.</p>
            </div>
        @endif
    </div>
</div>