<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;

class FoodController extends Controller
{
    public function show($category, $slug){
        $food = Food::all();
        $category_tutorials = Food::where('category_id', $food->category_id)->get();
        return view('food.show', compact('food'));
    }

}
