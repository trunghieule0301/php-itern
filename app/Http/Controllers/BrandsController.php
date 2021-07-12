<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Session;
use Illuminate\Support\Facades\Redirect;
Session_start();

class BrandsController extends Controller
{
    public function add_brand(){
        return view('admin/brands/add_brand');
    }

    public function edit_brand($brand_id) {
        $edit_brand = DB::table('brand')->where('brand_id',$brand_id)->get();
        $show_brands = view('admin/brands/edit_brand')->with('edit_brand', $edit_brand);
        return view('admin/admin')->with('admin/brands/edit_brand',$show_brands);
    }

    public function update_brand(Request $request, $brand_id){
        $data = array();
        $temp = preg_replace('/\s+/','-',$request->brand_name);
        $temp = strtolower($temp);
        $data['brand_slug'] = $temp; 
        $data['brand_name'] = $request->brand_name;
        $data['updated_at'] = new \DateTime();
        DB::table('brand')->where('brand_id', $brand_id)->update($data);
        Session::put('inform','Update brand successfully');
        return Redirect::to('adminPage/showBrands');
    }

    public function delete_brand($brand_id){
        DB::table('brand')->where('brand_id', $brand_id)->delete();
        Session::put('inform','Delete brand successfully');
        return Redirect::back();
    }

    public function show_brands(){
        $brands['brands'] = DB::table('brand')->orderby('brand_name','asc')->paginate(5);
        $show_brands = view('admin/brands/show_brands')->with('brands', $brands['brands']);
        return view('admin/admin')->with('admin/brands/show_brands',$show_brands);
    }

    public function save_brand(Request $request){
        $data = array();
        $temp = preg_replace('/\s+/','-',$request->brand_name);
        $temp = strtolower($temp);
        $data['brand_slug'] = $temp; 
        $data['brand_name'] = $request->brand_name;
        $data['brand_status'] = $request->brand_status;
        $data['created_at'] = new \DateTime();
        DB::table('brand')->insert($data);
        Session::put('inform','Add brand successfully');
        return Redirect::to('adminPage/addBrand');
    }

    public function unactive_brand($brand_id){
        DB::table('brand')->where('brand_id', $brand_id)->update(['brand_status'=>1]);
        Session::put('inform','Show brand status successfully');
        return Redirect::to('adminPage/showBrands');
    }

    public function active_brand($brand_id){
        DB::table('brand')->where('brand_id', $brand_id)->update(['brand_status'=>0]);
        Session::put('inform','Hide brand status successfully');
        return Redirect::to('adminPage/showBrands');
    }
}
