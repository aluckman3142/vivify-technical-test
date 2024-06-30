<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use App\Models\Team;

class Viewtask extends Component
{
    public $task;
    protected $queryString = ['task'];
    public $edit = false;
    public $users;
    public $teams;

    public function mount() {
        $this->users = User::all();
        $this->teams = Team::all();
    }

    public function render()
    {
        return view('livewire.viewtask', [
            'taskData' =>  Task::where('id', $this->task)->get()->first(),
        ]);
    }
}
