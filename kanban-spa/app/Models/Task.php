<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_list_id', 'title', 'deadline', 'index'
    ];

    public static $whiteListFilter = ['task_list_id'];

    public function taskList()
    {
        $this->belongsTo(TaskList::class);
    }
}
