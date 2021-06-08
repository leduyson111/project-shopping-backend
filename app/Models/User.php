<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable ,SoftDeletes;

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

    public function roles(){
        return $this->belongsToMany(RoleModel::class, 'role_user', 'user_id','role_id');
    }

    public function checkPermissionAccess($permissionCheck){

        // lấy được tất cả các quyền đang logout vào hệ thông 
        // so sáng giá trị đưa vào của router hiện lại xem có tồn tại trong cách quyền mình lấy được hay khong

        $roles = auth()->user()->roles;
        foreach($roles as $role){
           $permissions  = $role->permissions;
        //    dd($permissions);
           if($permissions->contains('key_code',$permissionCheck)){
                return true;
           }
        }
        return false;
    }


}
