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
    public $add = true;
    public $taskData;
    public $title;
    public $priority;
    public $due_date;
    public $description = '';
    public $assigned_type = null;
    public $assigned_user;
    public $assigned_team;
    public $assigned_name;
    public $users;
    public $teams;

    protected $rules = [
        'title' => 'required|min:6',
        'priority' => 'required',
        'description' => 'min:10|max:1000',
        'due_date' => 'required',
        'assigned_type' => 'required',
        'assigned_user' => 'required_if:assigned_type,==,User',
        'assigned_team' => 'required_if:assigned_type,==,Team'
    ];

    public function mount() {
        $this->taskData = Task::where('id', $this->task)->get()->first();
           if ($this->add == false){
            $this->title = $this->taskData->title;
            $this->priority = $this->taskData->priority;
            $this->due_date = Carbon::createFromFormat('Y-m-d H:i:s', $this->taskData->due_date)->format('Y-m-d');
            $this->description = $this->taskData->description;
            if ($this->taskData->assigned_user->count() > 0) {
                $this->assigned_type = 'User';
                $this->assigned_user = $this->taskData->assigned_user[0]['id'];
                $assigned= User::where('id', $this->assigned_user)->first();
                $this->assigned_name = $assigned->name;
            }
            if ($this->taskData->assigned_team->count() > 0) {
                $this->assigned_type = 'Team';
                $this->assigned_team = $this->taskData->assigned_team[0]['id'];
                $assigned = Team::where('id', $this->assigned_team)->first();
                $this->assigned_name = $assigned->name;
            }
        }
       

        $this->users = User::all();
        $this->teams = Team::all();
    }

    public function updatedEdit($value) {
        if ($value == true) {
            $this->edit = true;
            $this->add = false;
        } else {
            $this->edit = false;
            $this->add = false;
        }
    }

    public function saveTask(){

        $validated = $this->validate();

        if ($add = true) {
            $task = Task::create($validated);

            if($this->assigned_type == 'User'){
                $task->assigned_user()->attach([$this->assigned_user]);
            }

            if($this->assigned_type == 'Team'){
                $task->assigned_team()->attach([$this->assigned_team]);
            }
        } else {
        $this->taskData->update($validated);

        $this->taskData->assigned_user()->detach();
        $this->taskData->assigned_team()->detach();

        if($this->assigned_type == 'User'){
            $this->taskData->assigned_user()->attach([$this->assigned_user]);
        }

        if($this->assigned_type == 'Team'){
            $this->taskData->assigned_team()->attach([$this->assigned_team]);
        }
    }

        return redirect()->to('/');
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
    } 

    public function render()
    {
        return view('livewire.viewtask');
    }
}
