<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Team;
use App\Models\Task;
use Carbon\Carbon;


class Addtask extends Component
{
    public $title;
    public $priority;
    public $due_date;
    public $description;
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
        $task = new Task;
        $task->title = $this->title;
        $task->priority = $this->priority;
        $task->due_date = $date = Carbon::parse($this->due_date)->format('Y-m-d H:i:s'); ;
        $task->description = $this->description;
        $task->save();

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
