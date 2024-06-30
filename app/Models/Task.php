<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'priority',
        'title',
        'due_date',
        'description',
        'status'
    ];
        
    // protected $casts = [
    //     'due_date' => 'datetime'            
    // ];

    protected $with = [
        'assigned_user',
        'assigned_team'
    ];
        
    public function assigned_user(){
        return $this->belongsToMany(User::class, 'task_user', 'task_id', 'user_id');
   }
        
    public function assigned_team(){
        return $this->belongsToMany(Team::class, 'task_team', 'task_id', 'team_id');
    }
}
