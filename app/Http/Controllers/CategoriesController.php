<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class CategoriesController extends Controller
{
    public function add_category(){
        return view('admin/categories/add_categories');
    }

    public function edit_category($category_id){
        $edit_category = DB::table('categories')->where('cate_id',$category_id)->get();
        $final = $edit_category[0];
        $show_categories = view('admin/categories/edit_categories')->with('edit_category', $final);
        return view('admin/admin')->with('admin/categories/edit_categories',$show_categories);
    }

    public function update_cate(Request $request, $category_id){
        $data = array();
        $temp = preg_replace('/\s+/','-',$request->category_name);
        $temp = strtolower($temp);
        $data['cate_name'] = $request->category_name;
        $data['cate_slug'] = $temp;
        $data['updated_at'] = new \DateTime();
        DB::table('categories')->where('cate_id', $category_id)->update($data);
        Session::put('inform','Update category successfully');
        return Redirect::to('adminPage/showCategories');
    }

    public function delete_category($category_id){
        DB::table('categories')->where('cate_id', $category_id)->delete();
        Session::put('inform','Delete category successfully');
        return Redirect::back();
    }

    public function show_categories(){
        $categories = DB::table('categories')->orderby('cate_name','asc')->paginate(5);
        $show_categories = view('admin/categories/show_categories',['categories'=>$categories]);
        return view('admin/admin')->with('admin/categories/show_categories',$show_categories);
    }

    public function save_category(Request $request){
        $data = array();
        $temp = preg_replace('/\s+/','-',$request->category_name);
        $temp = strtolower($temp);
        $data['cate_name'] = $request->category_name;
        $data['cate_status'] = $request->category_status;
        $data['cate_slug'] = $temp;
        $data['created_at'] = new \DateTime();
        DB::table('categories')->insert($data);
        Session::put('inform','Add category successfully');
        return Redirect::to('adminPage/addCategory');
    }

    public function unactive_cate($category_id){
        DB::table('categories')->where('cate_id', $category_id)->update(['cate_status'=>1]);
        Session::put('inform','Show category status successfully');
        return Redirect::to('adminPage/showCategories');
    }

    public function active_cate($category_id){
        DB::table('categories')->where('cate_id', $category_id)->update(['cate_status'=>0]);
        Session::put('inform','Hide category status successfully');
        return Redirect::to('adminPage/showCategories');
    }
}
