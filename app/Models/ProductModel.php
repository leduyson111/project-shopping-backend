<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\SoftDeletes;


class ProductModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'price',
        'feature_image_path',
        'content',
        'user_id',
        'category_id',
        'feature_image_name',
        'view_count'
    ];


    protected $guarded = [];

    public function images(){
        return $this->hasMany(ProductImageModel::class, 'product_id');
    }

    public function tags(){
        return $this->belongsToMany(TagModel::class, 'product_tags','product_id', 'tag_id')->withTimestamps();;
    }

    public function category(){
        return $this->belongsTo(CategoryModel::class, 'category_id');

    }

    public function productImages(){

        return $this->hasMany(ProductImageModel::class, 'product_id');
    }




}
