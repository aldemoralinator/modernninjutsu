<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'project_id', 'message'
    ];

    public function user()
    {
        return $this->belongsTo(
            User::class
        );
    }

    public function project()
    {
        return $this->belongsTo(
            Project::class
        );
    }
}
