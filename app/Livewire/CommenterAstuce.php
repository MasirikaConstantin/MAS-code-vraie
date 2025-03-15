<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CommentaireAstuce;
use App\Http\Requests\CommentaireAstuceRequest;
use App\Models\Astuce;

class CommenterAstuce extends Component
{
    public $contenus;
    public $codesource;
    public $astuce_id;
    public $user_id;
    public $astuce; // Ajoutez cette propriété pour stocker l'astuce
    protected $rules = [
        'contenus' => 'required|string|max:1000',
        'codesource' => 'nullable|string|max:1000',
    ];

    public function mount($astuceId)
    {
        $this->astuce_id = $astuceId;
        $this->user_id = auth()->id();
        $this->astuce = Astuce::findOrFail($astuceId); // Récupérez l'astuce
    }

    public function commenter()
    {
        $this->validate();

        CommentaireAstuce::create([
            'contenus' => $this->contenus,
            'codesource' => $this->codesource,
            'astuce_id' => $this->astuce_id,
            'user_id' => $this->user_id,
        ]);

        $this->reset(['contenus', 'codesource']);

        session()->flash('success', 'Vous avez commenté cette astuce.');
    }

    public function delete($commentId)
    {
        $comment = CommentaireAstuce::findOrFail($commentId);

        // Vérifiez que l'utilisateur est autorisé à supprimer ce commentaire
        if ($comment->user_id === auth()->id()) {
            $comment->delete();
            session()->flash('success', 'Commentaire supprimé avec succès.');
        } else {
            session()->flash('error', 'Vous n\'êtes pas autorisé à supprimer ce commentaire.');
        }
    }

    public function render()
    {
        return view('livewire.commenter-astuce', [
            'commentaires' => CommentaireAstuce::where('astuce_id', $this->astuce_id)->latest()->paginate(10),
            'astuce' => $this->astuce, // Passez l'astuce à la vue
        ]);
    }
}