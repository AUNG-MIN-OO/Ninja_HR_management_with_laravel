<?php

namespace App;

use DarkGhostHunter\Larapass\Contracts\WebAuthnAuthenticatable;
use DarkGhostHunter\Larapass\WebAuthnAuthentication;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Department;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements WebAuthnAuthenticatable
{
    use Notifiable,HasRoles,WebAuthnAuthentication;

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

    public function department(){
        return $this->belongsTo(\App\Department::class,'department_id','id');
    }

    public function profilePath(){
        if ($this->profile_img){
            return asset('storage/employee/'.$this->profile_img);
        }
        return null;
    }
}
