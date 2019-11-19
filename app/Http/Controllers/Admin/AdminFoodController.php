<?php


namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Category;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Redirect;
use DB;
use Session;
use Auth;
use DomDocument;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;

class AdminFoodController extends Controller
{
    public function index(){
        $foods = Food::all();
        return view('admin.Food.index', compact('foods'));
    }
    public function create(){
        $categories = Category::all();
        $users = User::all();
        return view ('admin.Food.create', compact('categories','users'));
    }
    public function store(Request $request){
        $slug = strtolower($request['food_name']);
        $slug = str_replace(' ', '-', $slug);
        $food = new Food();
        $food->food_name = $request->food_name;
        $food->slug = $slug;
        $food->price = $request->price;
        $food->category_id = $request->category_id;

        if ($food_image = $request->file('image')) {
            $newName = str_random(10) . time() . '.' . $food_image->getClientOriginalExtension();
            $food_image->move(Food::FOOD_IMAGE_UPLOAD_PATH, $newName);
            $food->image = $newName;
        }

        $food->save();



        Session::flash('success','Food added successfully!!');
        return redirect()->route('admin_food.index');
    }

    public function mime_type_image_save($src,$img,$tutorial){
        $general_directory = config('constants.tutorial_upload_directory');
        preg_match('/data:image\/(?<mime>.*?)\;/', $src, $groups);
        $mimetype = $groups['mime'];
        $filename = $img->getAttribute('data-filename');
        $filename = date("d") . '_' . $filename;
        $filename = str_replace(' ', '_', $filename);
        $public_path = public_path() . $general_directory ;
        $year_folder = $public_path . date("Y");
        $month_folder = $year_folder . '/' . date("m");

        !file_exists($year_folder) && mkdir($year_folder, 0777, true);
        !file_exists($month_folder) && mkdir($month_folder, 0777, true);
        $folder_path = $general_directory . date('Y') . "/" . date('m') . "/";
        $img_md5_value = md5_file($src);
        $image_exist = Upload::where([['name', '=', $filename]])->first();

        if (!empty($image_exist)) {
            $filename =  Carbon::now()->timestamp . '_' . $filename;
        }

        $upload = new Upload();
        $upload->name = $filename;
        $upload->md5_hash = $img_md5_value;
        $upload->tutorial_id = $tutorial->id;
        $upload->save();
        $image = Image::make($src)
            // resize if required
            /* ->resize(300, 200) */
            ->encode($mimetype, 100)// encode file to the specified mimetype
            ->save(public_path($folder_path.$filename));

        $new_src = $upload->upload_url;
        $img->removeAttribute('src');
        $img->setAttribute('src', $new_src);
    }

    public function edit($id){
        $food = Food::where('id',$id)->first();
        $categories = Category::all();
        return view ('admin.Food.edit', compact('food','categories'));
    }
    public function update(Request $request, $id){
        $food = Food::where('id', $id)->first();
        $food->food_name = $request->food_name;
        $food->price = $request->price;
        $food->category_id = $request->category_id;
        $food->update();

        Session::flash('success','Tutorials updated successfully!!');
        return redirect()->route('admin_food.index');
    }
    public function destroy($id){
        $food = Food::where('id', $id)->first();
        if(!$food){
            return redirect()->route('admin_tutorial.index')->with(['fail' => 'Page not found !']);
        }
        $food->delete();
        Session::flash('success','Food Delete successfully');
        return redirect()->route('admin_food.index');
    }
}