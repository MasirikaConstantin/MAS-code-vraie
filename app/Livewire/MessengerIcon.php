<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MessageGroup;
use App\Models\Message;
use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;

class MessengerIcon extends Component
{
    public $unreadCount = 0;
    public $showMessenger = false;

    protected $listeners = ['messageReceived' => 'updateUnreadCount', 'closeMessenger', 'openMessenger'];

    public function mount()
    {
        $this->updateUnreadCount();
    }

    public function updateUnreadCount()
    {
        if (Auth::check()) {
            $userGroups = Auth::user()->messageGroups()->pluck('message_groups.id');
            
            $this->unreadCount = Message::whereIn('message_group_id', $userGroups)
                ->where('user_id', '!=', Auth::id())
                ->where('created_at', '>', function ($query) {
                    $query->select('last_read_at')
                        ->from('message_group_user')
                        ->where('user_id', Auth::id())
                        ->whereColumn('message_group_id', 'messages.message_group_id')
                        ->limit(1);
                })
                ->count();
                
            // Ajouter les invitations en attente
            $this->unreadCount += Invitation::where('user_id', Auth::id())
                ->where('status', 'pending')
                ->count();
        }
    }

    public function toggleMessenger()
    {
        $this->showMessenger = !$this->showMessenger;
        
        if ($this->showMessenger) {
            $this->dispatch('messengerOpened');
        } else {
            $this->dispatch('closeMessenger');
        }
    }

    public function openMessenger()
    {
        $this->showMessenger = true;
        $this->dispatch('messengerOpened');
    }

    public function closeMessenger()
    {
        $this->showMessenger = false;
    }

    public function render()
    {
        return view('livewire.messenger-icon');
    }
}