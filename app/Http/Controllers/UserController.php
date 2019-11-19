<?php


namespace App\Http\Controllers;


use App\User;
use App\Models\RoleType;
use App\Models\UserType;
use App\Models\Department;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Validation\Rule;
use phpDocumentor\Reflection\DocBlock\Tags\See;
use Response;
use App\Models\Country;
use Validator;
use Illuminate\Support\Facades\Session;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    public function beforeGetRegister()
    {
        return view('auth.register');
    }

    public function getRegister($name)
    {
        if (empty(Auth::user())) {
            return view('user.sign_up');
        } else {
            return redirect()->route('admin.index');
        }
    }

    public function postRegister(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required',
//            'role_type_id' => 'required|integer',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required|required_with:password',
        ]);


            $user = new User();
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
            $flash_status = 'success';
            $flash_message = 'User successfully registered.';
            $redirect_url = redirect()->route('admin.index');
            $data_status = true;



        if (isset($user)) {
            Auth::login($user);
        }
        Session::flash($flash_status, $flash_message);
        return $redirect_url;

    }

    public function forgotPassword()
    {
        return view('users.forgot_password');
    }

    public function resetPassword()
    {
        return view('users.reset');
    }

    public function getLogin()
    {
//        $backUrl = URL::previous();
//
//        if($backUrl != route('user.sign_in') && $backUrl != route('user.sign_up')) {
//            Session::put(['backUrl' => $backUrl]);
//        }

        if (empty(Auth::user())) {
            return view('auth.login');
        } else {
            return redirect()->route('admin.index');
        }
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $flash_status = 'success';
            $data_status = true;
            $flash_message = 'Signed in successfully.';
            return redirect()->route('admin.index');

        } else {
            $flash_status = 'error';
            $data_status = false;
            $flash_message = 'Email or password is incorrect';
            return redirect()->route('user.sign_in');
        }

    }
}
?>
