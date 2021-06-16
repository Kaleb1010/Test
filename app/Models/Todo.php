<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Todo extends Model
{
    use HasFactory,Notifiable;
    protected $table="todo_table";
    protected $fillable = [
        'task_title',
        'assigned_by',
        'assigned_to',
        'task_status',
        'description',
        'created_at'

    ];
}
