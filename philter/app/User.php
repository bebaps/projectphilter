<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{

    use Authenticatable, CanResetPassword;

    /****************************************
     * Database attributes
     ****************************************/

    // define what can be mass assigned
    protected $fillable = ['name', 'email', 'password'];

    //define what needs to be hidden for security
    protected $hidden = ['password', 'remember_token'];

    protected $dates = ['deleted_at'];

    /****************************************
     * Database Relationships
     ****************************************/

    // one to many join to the Projects table
    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }
}
