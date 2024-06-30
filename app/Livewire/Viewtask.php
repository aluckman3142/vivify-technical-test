<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;
use App\Models\User;
use App\Models\Team;
use Carbon\Carbon;

class Viewtask extends Component
{
    public $task;
    protected $queryString = ['task'];
    public $edit = false;
    public $taskData;
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
        $this->taskData = Task::where('id', $this->task)->get()->first();
        $this->title = $this->taskData->title;
        $this->priority = $this->taskData->priority;
        $this->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $this->taskData->due_date)->format('d/m/Y');
     // $this->due_date = '05/05/2024';  
      $this->description = $this->taskData->description;
        if ($this->taskData->assigned_user != '[]') {
            $this->assigned_type = 'User';
            $this->assigned_user = $this->taskData->assigned_user[0]['id'];
        }
        if ($this->taskData->assigned_team != '[]') {
            $this->assigned_type = 'Team';
            $this->assigned_team = $this->taskData->assigned_team[0]['id'];
        }
    }

    public function updatedEdit($value) {
        if ($value == true) {
            $this->edit = true;
        } else {
            $this->edit = false;
        }
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

        $this->taskData->update($validated);

        $this->taskData->assigned_user()->detach();
        $this->taskData->assigned_team()->detach();

        if($this->assigned_type == 'User'){
            $this->taskData->assigned_user()->attach([$this->assigned_user]);
        }

        if($this->assigned_type == 'Team'){
            $this->taskData->assigned_team()->attach([$this->assigned_team]);
        }

        return redirect()->to('/');
    }

    public function render()
    {
        return view('livewire.viewtask');
    }
}
