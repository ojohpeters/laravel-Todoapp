<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todoapp extends Model
{
    //
    protected $fillable = [
        'tasks',
        'id',
        'description',
        'photo',
        'completed',
        'user_id',
    ];
    

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
