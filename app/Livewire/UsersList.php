<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersList extends Component
{
    use WithPagination;

    public $selectedUsers = [];
    public $selectAll = false;
    public $bulkDisabled = true;

    protected $listeners = ['refreshUsers' => '$refresh'];

    public function updatedSelectAll($value)
{
    if ($value) {
        $this->selectedUsers = User::pluck('id')->map(fn($id) => (string) $id)->toArray();
    } else {
        $this->selectedUsers = [];
    }
    $this->bulkDisabled = count($this->selectedUsers) < 1;
    $this->dispatch('refreshUsers'); // 🔔 Forcer le rafraîchissement
}

public function updatedSelectedUsers()
{
    $this->bulkDisabled = count($this->selectedUsers) < 1;
    $this->selectAll = count($this->selectedUsers) === User::count();
    $this->dispatch('refreshUsers'); // 🔔 Forcer le rafraîchissement
}


    public function deleteSelected()
    {
        if (count($this->selectedUsers) > 0) {
            User::whereIn('id', $this->selectedUsers)->delete();
            $this->selectedUsers = [];
            $this->selectAll = false;
            $this->bulkDisabled = true;
            session()->flash('message', 'Utilisateurs supprimés avec succès!');
        }
    }
    public function toggleUser($userId)
    {
        if (($key = array_search($userId, $this->selectedUsers)) !== false) {
            unset($this->selectedUsers[$key]);
        } else {
            $this->selectedUsers[] = $userId;
        }
        
        $this->bulkDisabled = count($this->selectedUsers) < 1;
        $this->selectAll = count($this->selectedUsers) === User::count();
    }
    public function render()
    {
        return view('livewire.users-list', [
            'users' => User::paginate(10),
        ]);
    }
}