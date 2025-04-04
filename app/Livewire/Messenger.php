<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MessageGroup;
use App\Models\Message;
use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;

class Messenger extends Component
{
    public $groups = [];
    public $invitations = [];
    public $activeGroupId = null;
    public $showInvitations = false;
    public $showGroupInfo = false;
    public $showCreateGroup = false;
    public $currentGroupId = null;
    
    
    protected $listeners = [
        'messengerOpened' => 'loadGroups',
        'groupSelected' => 'setActiveGroup',
        'messageReceived' => 'loadGroups',
        'invitationAccepted' => 'loadGroups',
        'invitationRejected' => 'loadGroups',
        'groupCreated' => 'handleGroupCreated',
        'refreshGroups' => 'loadGroups',
        'toggle-group-info' => 'handleToggleGroupInfo',
        ];
    public function mount()
    {
        $this->loadGroups();
    }
    public function resetMessengerState()
    {
        // Réinitialiser l'état pour revenir à la vue principale
        $this->showCreateGroup = false;
        $this->showInvitations = false;
        
        // D'autres réinitialisations selon votre structure
    }

    public function handleToggleGroupInfo()
{
    $this->showGroupInfo = !$this->showGroupInfo; // Bascule l'état d'affichage
}
    public function loadGroups()
{
    if (Auth::check()) {
        $this->groups = Auth::user()->messageGroups()
            ->with('latestMessage') // Utiliser la relation latestMessage directement
            ->withCount(['messages as unread_count' => function($query) {
                $query->where('user_id', '!=', Auth::id())
                    ->where('created_at', '>', function ($subquery) {
                        $subquery->select('last_read_at')
                            ->from('message_group_user')
                            ->where('user_id', Auth::id())
                            ->whereColumn('message_group_id', 'messages.message_group_id')
                            ->limit(1);
                    });
            }])
            ->get();
            
        $this->invitations = Invitation::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->with(['messageGroup', 'inviter'])
            ->get();
    }
}


public function setActiveGroup($groupId)
{
    try {
        
        // Vérifier si le groupe existe avant de continuer
        $group = MessageGroup::findOrFail($groupId);
        
        $this->activeGroupId = $groupId;
        $this->showInvitations = false;
        $this->showGroupInfo = false;
        $this->showCreateGroup = false;
        
        // Marquer le groupe comme lu
        Auth::user()->messageGroups()->updateExistingPivot($groupId, [
            'last_read_at' => now()
        ]);
        
        $this->dispatch('messageReceived');
    } catch (\Exception $e) {
        // Gérer l'erreur
        session()->flash('error', 'Groupe de messages introuvable.');
    }
}



    public function toggleInvitations()
    {
        $this->showInvitations = !$this->showInvitations;
        if ($this->showInvitations) {
            $this->activeGroupId = null;
            $this->showGroupInfo = false;
            $this->showCreateGroup = false;
        }
    }

    public function toggleGroupInfo($groupId)
{
    if ($this->currentGroupId === $groupId && $this->showGroupInfo) {
        $this->showGroupInfo = false;
    } else {
        $this->currentGroupId = $groupId;
        $this->showGroupInfo = true;
    }
}

    public function toggleCreateGroup()
    {
        $this->showCreateGroup = !$this->showCreateGroup;
        if ($this->showCreateGroup) {
            $this->activeGroupId = null;
            $this->showInvitations = false;
            $this->showGroupInfo = false;
        }
    }

    public function handleGroupCreated($groupId)
    {
        $this->loadGroups();
        $this->setActiveGroup($groupId);
        $this->showCreateGroup = false;
    }

    public function render()
    {
        return view('livewire.messenger');
    }
}