<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Astuce;
use App\Models\Categorie;

class AstucesSearch extends Component
{
    use WithPagination;

    public $titre = '';
    public $contenus = '';
    public $category_id = '';

    protected $queryString = [
        'titre' => ['except' => ''],
        'contenus' => ['except' => ''],
        'category_id' => ['except' => ''],
    ];

    public function updating($field)
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['titre', 'contenus', 'category_id']);
    }

    public function render()
    {
        $query = Astuce::query();

        if ($this->titre) {
            $query->where('titre', 'like', '%' . $this->titre . '%');
        }

        if ($this->contenus) {
            $query->where('contenus', 'like', '%' . $this->contenus . '%');
        }

        if ($this->category_id) {
            $query->where('categorie_id', $this->category_id);
        }

        $astuces = $query->orderByDesc('id')->where('etat', 1)->paginate(4);
        $categories = Categorie::select('id', 'titre', 'description', 'couleur', 'image', 'svg')->get();

        return view('livewire.astuces-search', [
            'astuces' => $astuces,
            'categories' => $categories,
        ]);
    }
}