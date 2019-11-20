<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $categories = Category::all();
        $foods = Food::all();
        return view('home.index', compact('foods','categories'));
    }
    public function  food_category($slug){
        $foods = Food::where('slug',$slug)->first();
        $food_category = Food::where('category_id',$foods->category_id)->get();
        return view('food.show',compact('foods','food_category'));
    }
}
