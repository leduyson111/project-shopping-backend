<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PermissionModel extends Model
{
    use HasFactory;
    protected $table = 'permissions';
    protected $primaryKey = 'id';

    protected $guarded = [];

    public function permissionsChildrent(){
        return $this->hasMany(PermissionModel::class,'parent_id');

    }
}
