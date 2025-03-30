<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;

class InvitationsList extends Component
{
    public $invitations = [];

    public function mount()
    {
        $this->loadInvitations();
    }

    public function loadInvitations()
    {
        $this->invitations = Invitation::where('user_id', Auth::id())
            ->where('status', 'pending')
            ->with(['messageGroup', 'inviter'])
            ->get();
    }

    public function acceptInvitation($invitationId)
    {
        $invitation = Invitation::findOrFail($invitationId);
        
        // Vérifier que l'invitation est bien pour l'utilisateur courant
        if ($invitation->user_id !== Auth::id()) {
            return;
        }
        
        // Supprimer les invitations précédentes pour ce groupe et cet utilisateur
        Invitation::where('message_group_id', $invitation->message_group_id)
                  ->where('user_id', Auth::id())
                  ->delete();
        
        // Créer une nouvelle invitation acceptée (plutôt que de modifier l'existante)
        $newInvitation = Invitation::create([
            'message_group_id' => $invitation->message_group_id,
            'user_id' => Auth::id(),
            'invited_by' => $invitation->invited_by,
            'status' => 'accepted',
            'accepted_at' => now()
        ]);
        
        // Ajouter l'utilisateur au groupe (s'il n'y est pas déjà)
        if (!$invitation->messageGroup->users()->where('user_id', Auth::id())->exists()) {
            $invitation->messageGroup->users()->attach(Auth::id(), [
                'is_admin' => false,
                'last_read_at' => now()
            ]);
        }
        
        $this->loadInvitations();
        $this->dispatch('invitationAccepted');
        
        // Notification
        $this->dispatch('notify', [
            'message' => 'Invitation acceptée avec succès!',
            'type' => 'success'
        ]);
    }

    

    public function rejectInvitation($invitationId)
    {
        $invitation = Invitation::findOrFail($invitationId);
        
        if ($invitation->user_id !== Auth::id()) {
            return;
        }
        
        // Marquer comme rejetée plutôt que supprimer pour garder un historique
        $invitation->update([
            'status' => 'rejected'
        ]);
        
        $this->loadInvitations();
        
        $this->dispatch('notify', [
            'message' => 'Invitation refusée',
            'type' => 'info'
        ]);
    }

    public function render()
    {
        return view('livewire.invitations-list');
    }
}