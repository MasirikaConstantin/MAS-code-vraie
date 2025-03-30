<?php

namespace App\Livewire;

use Livewire\Component;

class Connect extends Component
{
    public $isAuthenticated;

public function mount() {
    $this->isAuthenticated = auth()->check();
}

    public function render()
    {
        return view('livewire.connect');
    }
}
