<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Board extends Model
{
    use HasFactory;

    public static $whiteListFilter = ['user_id'];

    protected $fillable = [
        'user_id', 'title'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function taskList()
    {
        return $this->hasMany(TaskList::class);
    }

    public function scopeMe($query)
    {
        $query->where('user_id', auth()->user()->id);
    }
}
