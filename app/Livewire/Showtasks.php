<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class Showtasks extends Component
{
    public function mount() {
        $this->tasks = Task::all();
        
    }

    public function render()
    {
        return view('livewire.showtasks');
    }
}
