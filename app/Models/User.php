<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_OWNER = 'owner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * Indicate if the user is an admin
     */
    public function isAdmin()
    {
        return $this->isA(self::ROLE_ADMIN);
    }

    /**
     * Indicate if the user is an owner
     */
    public function isOwner()
    {
        return $this->isA(self::ROLE_OWNER);
    }

    /**
     * Determine if the user belongs to a specific role
     *
     * @param $role the role to check
     * @return
     */
    public function isA($needleRole)
    {
        return $this->roles->filter( function($role) use ($needleRole) {
            return $role->type == $needleRole ;
        })->isNotEmpty();
    }

    public function companies() {
        return $this->hasMany(Company::class);
    }

}
