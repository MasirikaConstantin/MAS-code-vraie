<?php

namespace App\Livewire;

use App\Models\Astuce;
use App\Models\Categorie;
use Livewire\Component;
use Livewire\WithPagination;

class AstuceListe extends Component
{
    use WithPagination;

    public $search = '';
    public function Recherche(){
        $client  = Astuce::when($this->search, function($query) {
            return $query->where('titre', 'like', '%'.$this->search.'%')
                    ->orWhere('contenus', 'like', '%'.$this->search.'%');
        })
        ->paginate(10);
        return $client;
    }
    public function render()
    {
        
        return view('livewire.astuce-liste', [
            'astuces' =>$this->Recherche(),
            'categories' => Categorie::select('id','titre','description','couleur','image', 'svg')->get(),


        ]);
    }
}
