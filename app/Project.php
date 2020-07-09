<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = [
        'name', 
        'slug',
        'background_image',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($project) {
            $project->update(['slug' => $project->name]);
        });
    }

    public function setSlugAttribute($value)
    {
        if (static::whereSlug($slug = Str::slug($value))->exists()) {
            $generated_string = Str::random(3).$this->id.Str::random(1);
            $slug = "{$slug}-{$generated_string}";
        }
        $this->attributes['slug'] = $slug;
    }

    public function posts()
    {
        return $this->hasMany(
            Post::class
        )->with('project', 'user')->get();
    }

    public function members()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('confirmed')
                    ->withTimestamps();
    }

    public function invite($user_id)
    {
        return $this->members()->syncWithoutDetaching([
            $user_id=>['confirmed'=>false]
        ]);
    }
}
