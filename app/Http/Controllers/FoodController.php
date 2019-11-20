<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function show($category, $slug){
        $foods = Food::all();
        $food_categories = Food::where('category_id',$foods)->get();
        return view('food.show',compact('foods','food_categories'));
    }


}
