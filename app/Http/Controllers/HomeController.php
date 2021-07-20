<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Session,Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
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
        DB::table('product')->where('product_slug',$product_slug)->update(['last_access_time' => Carbon::now('Asia/Ho_Chi_Minh')]);
        $url = url()->current();
        $out_of_voucher = false;
        $message = '';
        $voucher = null;
        $product_id = DB::table('product')->where('product_slug',$product_slug)->first()->product_id;
        if(Auth::check()){
            $user_id = Auth::user()->id;
            $voucher = DB::table('voucher')->where('model_id',$user_id)->where('product_id',$product_id)->first();
        }

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
        ->with('check',$check)
        ->with('voucher',$voucher)
        ->with('url',$url);
    }

    public function get_voucher($cate_name, $product_slug){
        $product_id = DB::table('product')->where('product_slug',$product_slug)->first()->product_id;
        $voucher_quantity = DB::table('product')->where('product_id',$product_id)->first()->voucher_quantity;
        $user_id = Auth::user()->id;

        //Generate voucher code
        $chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $res = "";
        for ($i = 0; $i < 10; $i++) {
            $res .= $chars[mt_rand(0, strlen($chars)-1)];
        }

        //check same voucher code
        $voucher = DB::table('voucher')->where('voucher_code',$res)->first();
        if($voucher != null){
            get_voucher($cate_name, $product_slug);
        }

        $data = array();
        $data['model_id'] = $user_id;
        $data['product_id'] = $product_id;
        $data['voucher_code'] = $res;
        $data['created_at'] = new \DateTime();

        if($voucher_quantity != 0){
            DB::beginTransaction();
            try {
                $voucher_quantity--;
                DB::table('product')->where('product_id',$product_id)->update(['voucher_quantity' => $voucher_quantity]);
                DB::table('voucher')->insert($data);
                
                DB::commit();
            } catch (Exception $e) {
                DB::rollBack();
                
            }
            return Redirect::back();
        }
        Session::put('inform','There is no more available voucher.');
        return Redirect::back();
    }

}
