<div class="flex flex-col h-full bg-white dark:bg-gray-800 rounded-lg shadow overflow-hidden">
    <!-- Chat Header -->
    <div class="flex items-center justify-between p-3 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700">
        <div class="flex items-center space-x-3">
            <!-- Group Avatar -->
            @if($group->avatar)
                <img src="{{ $group->avatar }}" alt="{{ $group->name }}" class="w-10 h-10 rounded-full object-cover">
            @else
                <div class="w-10 h-10 rounded-full bg-blue-500 dark:bg-blue-600 flex items-center justify-center text-white font-semibold">
                    {{ substr($group->name, 0, 1) }}
                </div>
            @endif
            
            <!-- Group Name -->
            <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">{{ $group->name }}</div>
        </div>
        
        <!-- Header Actions -->
        <button wire:click="toggleGroupInfo" 
        wire:loading.attr="disabled"
        class="p-2 rounded-full text-gray-500 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-600">
    <i class="fas fa-info-circle"></i>
</button>
    </div>
    
    <!-- Messages Container -->
    <div 
        id="messages-container"
        wire:poll.1s="refreshMessages"
        class="flex-1 p-4 overflow-y-auto space-y-4 bg-gray-100 dark:bg-gray-900"
    >
    @foreach($messages as $message)
    <div class="flex {{ $message['user_id'] === Auth::id() ? 'justify-end' : 'justify-start' }}">
        <div class="flex max-w-xs md:max-w-md lg:max-w-lg {{ $message['user_id'] === Auth::id() ? 'flex-row-reverse' : '' }}">
            <!-- User Avatar -->
            <div class="flex-shrink-0 h-8 w-8 rounded-full bg-gray-300 dark:bg-gray-600 flex items-center justify-center text-sm text-gray-800 dark:text-gray-200 mr-2">
                {{ substr($message['user']['name'], 0, 1) }}
            </div>
            
            <!-- Message Content -->
            <div class="{{ $message['user_id'] === Auth::id() ? 'bg-blue-500 text-white' : 'bg-white dark:bg-gray-700 text-gray-800 dark:text-gray-200' }} rounded-lg p-3 shadow">
                <!-- Message Header -->
                <div class="flex items-center justify-between text-xs mb-1">
                    <span class="{{ $message['user_id'] === Auth::id() ? 'text-blue-100' : 'text-gray-500 dark:text-gray-400' }} font-medium">
                        {{ $message['user']['name'] }}
                    </span>
                    <span class="{{ $message['user_id'] === Auth::id() ? 'text-blue-100' : 'text-gray-500 dark:text-gray-400' }} ml-2">
                        {{ \Carbon\Carbon::parse($message['created_at'])->format('H:i') }}
                    </span>
                </div>
                
                <!-- Message Text -->
                <div class="text-sm">
                    {{ $message['content'] }}
                </div>
            </div>
        </div>
    </div>
@endforeach
    </div>
    
    <!-- Message Input -->
    <div class="p-3 border-t border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800">
        <form wire:submit="sendMessage" class="flex space-x-2">
            @csrf
            <input 
                type="text" 
                placeholder="Tapez votre message..." 
                wire:model="messageText" 
                wire:keydown.enter.prevent="sendMessage"
                class="flex-1 px-4  py-2 border border-gray-300 dark:border-gray-600 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:text-white"
            >
            <button 
                type="submit" 
                class="p-2 messenger-iconenv"
            >
                <i class="fas fa-paper-plane"></i>
            </button>
        </form>
    </div>

<script>
    document.addEventListener('livewire:init', function () {
        Livewire.on('scrollToBottom', function () {
            const container = document.getElementById('messages-container');
            if (container) {
                container.scrollTop = container.scrollHeight;
            }
        });
        
        // Scroll initial
        const container = document.getElementById('messages-container');
        if (container) {
            container.scrollTop = container.scrollHeight;
            
        }
    });
</script>
</div>