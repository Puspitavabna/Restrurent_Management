<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Redirect;
use DB;
use Session;
use Auth;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;

class AdminCategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }
    public function create(){
        return view ('admin.category.create');
    }
    public function store(Request $request){
        $slug = strtolower($request['name']);
        $slug = str_replace(' ', '-', $slug);
        $category = new Category();
        $category->name = $request->name;
        $category->category_slug = $slug;

        if ($category_image = $request->file('category_image')) {
            $newName = str_random(10) . time() . '.' . $category_image->getClientOriginalExtension();
            $category_image->move(Category::CATEGORY_IMAGE_UPLOAD_PATH, $newName);
            $category->category_image = $newName;
        }

        $category->save();



        Session::flash('success','category added successfully!!');
        return redirect()->route('admin_category.index');
    }


    public function edit($id){
        $category = Category::where('id',$id)->first();
        $categories = Category::all();
        return view ('admin.category.edit', compact('category','categories'));
    }
    public function update(Request $request, $id){
        $category = Category::where('id', $id)->first();
        $category->name = $request->name;
        $category->update();

        Session::flash('success','Tutorials updated successfully!!');
        return redirect()->route('admin_category.index');
    }
    public function destroy($id){
        $category = Category::where('id', $id)->first();
        if(!$category){
            return redirect()->route('admin_tutorial.index')->with(['fail' => 'Page not found !']);
        }
        $category->delete();
        Session::flash('success','category Delete successfully');
        return redirect()->route('admin_category.index');
    }
}