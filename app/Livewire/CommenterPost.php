<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Commentaire;
use App\Models\Post; // Assurez-vous d'importer le modèle Post
use App\Http\Requests\ValiderCommentaires;

class CommenterPost extends Component
{
    public $contenus;
    public $codesource;
    public $post_id;
    public $user_id;
    public $post; // Pour stocker le post

    protected $rules = [
        'contenus' => 'required|string|max:1000',
        'codesource' => 'nullable|string|max:1000',
    ];

    public function mount($postId)
    {
        $this->post_id = $postId;
        $this->user_id = auth()->id();
        $this->post = Post::findOrFail($postId); // Récupérer le post
    }

    public function commenter()
    {
        $this->validate();

        Commentaire::create([
            'contenus' => $this->contenus,
            'codesource' => $this->codesource,
            'post_id' => $this->post_id,
            'user_id' => $this->user_id,
        ]);

        $this->reset(['contenus', 'codesource']);

        session()->flash('success', 'Votre commentaire a été ajouté.');
    }

    public function delete($commentId)
    {
        $comment = Commentaire::findOrFail($commentId);

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
        return view('livewire.commenter-post', [
            'commentaires' => Commentaire::where('post_id', $this->post_id)->latest()->paginate(10),
            'post' => $this->post, // Passer le post à la vue
        ]);
    }
}