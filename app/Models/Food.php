<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public $table = 'foods';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const FOOD_IMAGE_UPLOAD_PATH = 'uploads/food/image';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'id',
        'food_name',
        'price',
        'image',
    ];


    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function getFoodUrlAttribute(){
        $food_url = route('food.show', [$this->category->category_slug, $this->slug]);
        return $food_url;
    }
}
