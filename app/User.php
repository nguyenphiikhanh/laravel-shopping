<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use SoftDeletes;
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

    public function roles() {
        return $this->belongsToMany(Role::class,'role_user','user_id','role_id')->withTimestamps();
    }

    public function checkPermissionAccess($permissionCheck){
       //get all permiss

       $roles = Auth::user()->roles;
       foreach($roles as $role){
           $permissions = $role->permissions;
           if($permissions->contains('key_code', $permissionCheck)){
               return true;
           }
       }
       return false;
    }
}
