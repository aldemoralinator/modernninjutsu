<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'firstname', 
        'lastname',
        'username', 
        'avatar',
        'contact_number', 
        'email', 
        'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function invitations()
    {
        return $this->belongsToMany(Project::class)
                    ->withPivot('confirmed')
                    ->withTimestamps();
    }

    public function projects()
    {
        return $this->invitations()
                    ->where('confirmed', true);
    }

    public function pendingInvitations()
    {
        return $this->invitations()
                    ->where('confirmed', false);
    }

    public function acceptInvitation($project_id)
    {
        return $this->invitations()->syncWithoutDetaching([
            $project_id=>[
                'confirmed'=>true
            ]
        ]);
    }

    public function userDetachToProject($project_id)
    {
        return $this->invitations()->detach($project_id);
    }
}
