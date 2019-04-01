<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function projects(){
        return $this->hasMany(Project::class, 'owner_id');
    }

    public function equipment(){
        return $this->hasMany(Equipment::class);
    }

    public function path(){
        return '/users/'.$this->id;
    }

    public function roles(){
        return $this->belongsToMany(Role::class, 'role_users');
    }

    public function hasAccess(array $permissions)
    {
        foreach($this->roles as $role){
            if($role->hasAccess($permissions)){
                return true;
            }
            return false;
        }
    }
}
