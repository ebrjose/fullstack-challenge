<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'title', 'slug'
    ];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeAuthUser($query)
    {
        $query->where('user_id', auth()->user()->id);
    }
}
