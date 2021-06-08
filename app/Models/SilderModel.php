<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SilderModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'silders';
    protected $primaryKey = 'id';
    protected $guarded = [];

//    protected $fillable = [
//        'name',
//        'descripiton',
//        'image_path',
//        'image_name',
//    ];
}
