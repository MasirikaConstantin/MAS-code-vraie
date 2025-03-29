<?php

namespace App\Livewire;

use App\Models\Categorie;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;


class PostListe extends Component
{
    use WithPagination;

    public $search = '';
    public function Recherche(){
        $post = Post::when($this->search, function($query) {
            return $query->where('titre', 'like', '%'.$this->search.'%')
                        ->orWhere('contenus', 'like', '%'.$this->search.'%')
                        ->orWhereHas('user', function ($q) {
                            $q->where('name', 'like', '%'.$this->search.'%');
                        });
        })->with('user')->orderByDesc('id')
        ->paginate(6);
        
        return $post;
    }
    
    
        public function render()
    {
        return view('livewire.post-liste',[
            'posts' => $this->Recherche(),
            'categories' => Categorie::orderBy('titre', 'asc')->get(),
        ]);
    }
}
