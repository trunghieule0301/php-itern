<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Session,Auth;
use Illuminate\Support\Facades\Redirect;
Session_start();

class HomeController extends Controller
{
    public function showHomepage(){
        return view('frontend/homepage');
    }

    public function showCategory($cate_name){
        $url = url()->current();
        $temp = request('brand');
        $arrange = request('arrange');
        $order = '';
        if($arrange == 'low-to-high'){
            $order = 'asc';
        }
        else{
            $order = 'desc';
        }
        $brand = DB::table('brand')->get();
        if(!$temp){
            $product = DB::table('product')
            ->join('categories','cate_id','=','product_cate')
            ->where('cate_slug',$cate_name)
            ->orderby('categories.cate_slug','desc')
            ->orderby('product.product_price',$order)
            ->paginate(9);
        }
        else if($temp){
            $product = DB::table('product')
            ->join('categories','cate_id','=','product_cate')
            ->join('brand','brand_id','=','product_brand')
            ->where('cate_slug',$cate_name)
            ->where('brand_slug',$temp)
            ->orderby('categories.cate_slug','desc')
            ->orderby('product.product_price',$order)
            ->paginate(9);
        }

        return view('frontend/cate_detail_page')
        ->with('brand',$brand)
        ->with('products',$product)
        ->with('selectedBrand',$temp)
        ->with('arrange',$arrange)
        ->with('url',$url);
    }

    function showDetail($cate_name, $product_slug){

        if(Auth::check()){
            $track = array();
            $userId = Auth::user()->id;
            $product = DB::table('product')
            ->where('product_slug',$product_slug)
            ->get();
            $productId = $product[0]->product_id;
            $track['model_id'] = $userId;
            $track['product_id'] = $productId;
            $track['time'] = new \DateTime();
            DB::table('track_user')->insert($track);
        }

        $checkImage = DB::table('images')
        ->join('product','product_id','=','image_product')
        ->where('product_slug',$product_slug)
        ->get();
        $check = 0;
        if(count($checkImage) != 0){
            $productName = DB::table('product')
            ->join('brand','brand_id','=','product_brand')
            ->join('images','image_product','=','product_id')
            ->where('product_slug',$product_slug)
            ->get();
            $check = 1;
        }
        else{
            $productName = DB::table('product')
            ->join('brand','brand_id','=','product_brand')
            ->where('product_slug',$product_slug)
            ->get();
            $check = 0;
        }
        
        if($productName){
            $product = $productName[0];
        }
        else{
            $product = null;
        }
        return view('frontend/product_detail')
        ->with('product',$product)
        ->with('products',$productName)
        ->with('check',$check);
    }
}
