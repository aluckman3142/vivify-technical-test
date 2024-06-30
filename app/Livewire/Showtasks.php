<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class Showtasks extends Component
{
    public $completed = false;

    public function mount() {
        $this->tasks = Task::all();
    }

    public function updatedCompleted($value) {
        if ($value == true) {
            $this->tasks = Task::where('status', 'Completed')->get();
        } else {
            $this->tasks = Task::all(); 
        }
    }

    public function render()
    {
        return view('livewire.showtasks');
    }
}
