<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\MessageGroup;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class CreateGroup extends Component
{
    use WithFileUploads;
    
    public $name = '';
    public $description = '';
    public $avatar;
    public $searchTerm = '';
    public $searchResults = [];
    public $selectedUsers = [];

    protected $rules = [
        'name' => 'required|min:3|max:50',
        'description' => 'nullable|max:255',
        'avatar' => 'nullable|image|max:1024',
    ];

    public function searchUsers()
    {
        if (strlen($this->searchTerm) >= 2) {
            // Exclure l'utilisateur courant et les utilisateurs déjà sélectionnés
            $selectedIds = collect($this->selectedUsers)->pluck('id')->toArray();
            $excludeIds = array_merge([Auth::id()], $selectedIds);
            
            $this->searchResults = User::where('name', 'like', '%' . $this->searchTerm . '%')
                ->whereNotIn('id', $excludeIds)
                ->limit(5)
                ->get()
                ->map(function ($user) {
                    return [
                        'id' => $user->id,
                        'name' => $user->name,
                    ];
                })
                ->toArray();
        } else {
            $this->searchResults = [];
        }
    }

    public function selectUser($userId, $userName)
    {
        $this->selectedUsers[] = [
            'id' => $userId,
            'name' => $userName
        ];
        
        $this->searchTerm = '';
        $this->searchResults = [];
    }

    public function removeSelectedUser($index)
    {
        unset($this->selectedUsers[$index]);
        $this->selectedUsers = array_values($this->selectedUsers);
    }

    public function createGroup()
    {
        $this->validate();
        
        $avatarPath = null;
        if ($this->avatar) {
            $avatarPath = $this->avatar->store('group-avatars', 'public');
            $avatarPath = 'storage/' . $avatarPath;
        }
        
        // Créer le groupe
        $group = MessageGroup::create([
            'name' => $this->name,
            'description' => $this->description,
            'avatar' => $avatarPath,
        ]);
        
        // Ajouter le créateur comme admin
        $group->users()->attach(Auth::id(), [
            'is_admin' => true,
            'last_read_at' => now()
        ]);
        
        // Ajouter les utilisateurs sélectionnés
        foreach ($this->selectedUsers as $user) {
            $group->users()->attach($user['id'], [
                'is_admin' => false,
                'last_read_at' => now()
            ]);
        }
        
        // Réinitialiser le formulaire
        $this->reset(['name', 'description', 'avatar', 'searchTerm', 'searchResults', 'selectedUsers']);
        
        // Émettre l'événement pour indiquer que le groupe a été créé
        $this->dispatch('groupCreated', $group->id);
    }

    public function render()
    {
        return view('livewire.create-group');
    }
}