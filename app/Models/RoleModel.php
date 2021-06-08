<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id';

    protected $guarded = [];


    public function permissions(){
        return $this->belongsToMany(PermissionModel::class,'permission_role' , 'role_id' , 'permission_id');

    }

 


}
