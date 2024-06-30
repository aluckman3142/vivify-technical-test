<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Team;
use App\Models\Task;


class Addtask extends Component
{
    public $title;
    public $priority;
    public $due_date;
    public $description = '';
    public $assigned_type = null;
    public $assigned_user;
    public $assigned_team;
    public $users;
    public $teams;

    public function mount() {
        $this->users = User::all();
        $this->teams = Team::all();
    }

    public function saveTask(){

        $rules = [
            'title' => 'required|min:6',
            'priority' => 'required',
            'description' => 'max:1000',
            'due_date' => 'required',
            'assigned_type' => 'required',
            'assigned_user' => 'required_if:assigned_type,==,User',
            'assigned_team' => 'required_if:assigned_type,==,Team'
        ];

        $validated = $this->validate($rules);

        $task = Task::create($validated);

        if($this->assigned_type == 'User'){
            $task->assigned_user()->attach([$this->assigned_user]);
        }

        if($this->assigned_type == 'Team'){
            $task->assigned_team()->attach([$this->assigned_team]);
        }

        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.addtask');
    }
}
