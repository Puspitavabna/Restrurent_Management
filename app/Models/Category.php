<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = 'categories';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const CATEGORY_IMAGE_UPLOAD_PATH = 'uploads/category/image';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'name',
        'category-slug',
        'category_image',
    ];

    public function foods()
    {
        return $this->hasMany('App\Models\Food');
    }
}
