<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB,Session;
use App\Http\Requests\LoginRequest;
use Validator;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
Session_start();

class UserController extends Controller
{

    public function getAuthLogin(){
        return view('login');
    }

    public function postAuthLogin(LoginRequest $request){
        
        $arr = [
            'username' => $request->username,
            'password' => $request->password
        ];
        $remember = $request->remember;
        if(Auth::attempt($arr,$remember) && (Auth::user()->hasRole('admin') || Auth::user()->hasRole('staff'))){
            $user = Auth::user()->toArray();
            Session::put('admin_name', $user["name"]);
            Session::put('admin_id', $user["id"]);
            return view('admin/admin');
        }
        else if(Auth::attempt($arr,$remember)){
            return view('frontend/homepage');
        }
        else{
            return redirect()->back()->withErrors('Username or password is incorrect');
        }
        
    }

    public function getProfile(){
        return view('profile');
    }

    public function getAdmin(){
        return view('admin/admin');
    }

    public function getLogout(){
        Auth::logout();
        return redirect()->intended('authLogin');
    }
}
