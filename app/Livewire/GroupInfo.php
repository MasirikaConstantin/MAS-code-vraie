<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MessageGroup;
use App\Models\User;
use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;

class GroupInfo extends Component
{
    public $groupId;
    public $group;
    public $members = [];
    public $isAdmin = false;
    public $searchTerm = '';
    public $searchResults = [];
    public $selectedUser = null;
    protected $listeners = ['toggle-group-info' => 'handleToggle'];
    public function mount($groupId)
    {
        $this->groupId = $groupId;
        $this->loadGroup();
    }
        public function handleToggle($groupId)
    {
        if ($groupId === $this->groupId) {
            // Implémentez votre logique de bascule ici
            // Par exemple :
            $this->emitSelf('close'); // Si vous gérez l'état localement
        }
    }
    public function close()
    {
        $this->dispatch('close-group-info');
    }

    public function loadGroup()
    {
        $this->group = MessageGroup::with(['users' => function($query) {
            $query->withPivot('is_admin'); // Charge explicitement le pivot
        }])->findOrFail($this->groupId);
        
        $this->members = $this->group->users;
        
        // Vérifier si l'utilisateur courant est admin
        $this->isAdmin = $this->group->users()
            ->where('user_id', Auth::id())
            ->wherePivot('is_admin', true)
            ->exists();
    }

    public function searchUsers()
    {
        if (strlen($this->searchTerm) >= 2) {
            $groupMemberIds = $this->group->users->pluck('id')->toArray();
            
            // Exclure également les utilisateurs déjà invités
            $invitedUserIds = Invitation::where('message_group_id', $this->groupId)
                ->where('status', 'pending')
                ->pluck('user_id')
                ->toArray();
            
            $excludeIds = array_merge($groupMemberIds, $invitedUserIds);
            
            $this->searchResults = User::where('name', 'like', '%' . $this->searchTerm . '%')
                ->whereNotIn('id', $excludeIds)
                ->limit(5)
                ->get();
        } else {
            $this->searchResults = [];
        }
    }

    public function inviteUser($userId)
    {
        // Vérifier que l'utilisateur est admin
        if (!$this->isAdmin) {
            return;
        }
        
        Invitation::create([
            'message_group_id' => $this->groupId,
            'user_id' => $userId,
            'invited_by' => Auth::id(),
            'status' => 'pending'
        ]);
        
        $this->searchTerm = '';
        $this->searchResults = [];
        
        $this->dispatch('notify', [
            'message' => 'Invitation envoyée avec succès!'
        ]);
    }

    public function toggleAdmin($userId)
    {
        // Seul un admin peut changer les rôles
        if (!$this->isAdmin) {
            return;
        }
        
        // Empêcher de retirer le rôle du dernier admin
        $adminCount = $this->group->users()
            ->wherePivot('is_admin', true)
            ->count();
            
        $currentIsAdmin = $this->group->users()
            ->where('user_id', $userId)
            ->wherePivot('is_admin', true)
            ->exists();
            
        if ($adminCount <= 1 && $currentIsAdmin) {
            $this->dispatch('notify', [
                'message' => 'Impossible de retirer le dernier administrateur!',
                'type' => 'error'
            ]);
            return;
        }
        
        // Toggle admin status
        $isAdmin = !$currentIsAdmin;
        
        $this->group->users()->updateExistingPivot($userId, [
            'is_admin' => $isAdmin
        ]);
        
        $this->loadGroup();
    }

    public function removeUser($userId)
    {
        // Seul un admin peut retirer un utilisateur
        if (!$this->isAdmin) {
            return;
        }
        
        // Un admin ne peut pas retirer le dernier admin
        if ($this->group->users()->where('user_id', $userId)->wherePivot('is_admin', true)->exists()) {
            $adminCount = $this->group->users()->wherePivot('is_admin', true)->count();
            
            if ($adminCount <= 1) {
                $this->dispatch('notify', [
                    'message' => 'Impossible de retirer le dernier administrateur!',
                    'type' => 'error'
                ]);
                return;
            }
        }
        
        // Retirer l'utilisateur du groupe
        $this->group->users()->detach($userId);
        $this->loadGroup();
        
        // Si l'utilisateur retiré est l'utilisateur courant, il faut fermer l'info du groupe
        if ($userId === Auth::id()) {
            $this->emit('refreshGroups');
            $this->emit('closeGroupInfo');
        }
    }

    public function leaveGroup()
    {
        // Vérifier si l'utilisateur est le seul admin
        if ($this->isAdmin) {
            $adminCount = $this->group->users()->wherePivot('is_admin', true)->count();
            
            if ($adminCount <= 1) {
                $this->dispatch('notify', [
                    'message' => 'Vous ne pouvez pas quitter le groupe car vous êtes le seul administrateur!',
                    'type' => 'error'
                ]);
                return;
            }
        }
        
        // Quitter le groupe
        $this->group->users()->detach(Auth::id());
        $this->dispatch('refreshGroups');
    }

    public function render()
    {
        return view('livewire.group-info');
    }
}