<?php

namespace App\Livewire;

use App\Events\NewMessage;
use Livewire\Component;
use App\Models\MessageGroup;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class GroupChat extends Component
{
    public $groupId;
    public $group;
    public $messages = []; // Utiliser un tableau standard au lieu d'une Collection
    public $messageText = '';
    public $isAdmin = false;

    protected $listeners = ['refreshMessages', 'scrollToBottom'];
    
    protected $rules = [
        'messageText' => 'required|min:1|max:1000',
    ];

    public function mount($groupId)
    {
        $this->groupId = $groupId;
        $this->loadGroup();
        $this->loadMessages();
        $this->markAsRead();
    }

    public function loadMessages()
    {
        // Convertir explicitement en tableau pour éviter les problèmes de sérialisation
        $this->messages = Message::where('message_group_id', $this->groupId)
            ->with('user')
            ->orderBy('created_at', 'asc')
            ->get()
            ->toArray(); // Conversion en tableau
    }

    public function sendMessage()
    {
        $this->validate();
        
        $message = Message::create([
            'message_group_id' => $this->groupId,
            'user_id' => Auth::id(),
            'content' => $this->messageText,
        ]);
        
        $this->reset('messageText');
        
        // Recharger les messages en tant que tableau
        $this->loadMessages();
        
        $this->markAsRead();
        event(new NewMessage($message));
        
        $this->dispatch('messageReceived');
        $this->dispatch('scrollToBottom');
    }

    public function loadGroup()
    {
        $this->group = MessageGroup::findOrFail($this->groupId);
        
        $this->isAdmin = Auth::user()
            ->messageGroups()
            ->where('message_group_id', $this->groupId)
            ->wherePivot('is_admin', true)
            ->exists();
    }

    public function markAsRead()
    {
        Auth::user()->messageGroups()->updateExistingPivot($this->groupId, [
            'last_read_at' => now()
        ]);
        
        $this->dispatch('messageReceived');
    }

    public function refreshMessages()
    {
        $this->loadMessages();
        $this->markAsRead();
    }

    public function toggleGroupInfo()
{
    $this->dispatch('toggle-group-info', groupId: $this->groupId); // Utilisez kebab-case et passez l'ID
}

    public function render()
    {
        return view('livewire.group-chat');
    }
}