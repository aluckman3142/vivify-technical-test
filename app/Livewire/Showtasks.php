<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Task;

class Showtasks extends Component
{
    public $completed = false;
    public $deleted = false;

    public function mount() {
        $this->loadTasks();
    }

    public function updatedCompleted($value) {
        if ($value == true) {
            $this->tasks = Task::where('status', 'Completed')->get();
        } else {
            $this->loadTasks();
        }
    }

    public function updatedDeleted($value) {
        if ($value == true) {
            $this->tasks = Task::onlyTrashed()->get();
        } else {
            $this->loadTasks();
        }
    }

    public function markComplete($value) {
        $task = Task::where('id', $value)->first();
        $task->status = 'Completed';
        $task->save();
        $this->loadTasks();
    }

    public function markInProgress($value) {
        $task = Task::where('id', $value)->first();
        $task->status = 'In Progress';
        $task->save();
        $this->loadTasks();
    }

    public function deleteTask($value) {
        $task = Task::where('id', $value)->first();
        $task->delete();
        $this->loadTasks();
    }

    public function restoreTask($value) {
        $task = Task::withTrashed()->where('id', $value)->first();
        $task->restore();
        $this->deleted = false;
        $this->loadTasks();
    }

    public function forceDeleteTask($value) {
        $task = Task::withTrashed()->where('id', $value)->first();
        $task->forceDelete();
        $this->deleted = false;
        $this->loadTasks();
    }

    public function loadTasks(){
        $this->tasks = Task::orderByRaw("FIELD(priority, 'High', 'Medium', 'Low')")->get();
    }

    public function render()
    {
        return view('livewire.showtasks');
    }
}
