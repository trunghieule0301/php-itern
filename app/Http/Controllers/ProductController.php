<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB,Session,Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use Spatie\QueryBuilder\QueryBuilder;
use File;
Session_start();

class ProductController extends Controller
{

    public function add_product(){
        $cate_product = DB::table('categories')->orderby('cate_name', 'asc')->get();
        $brand_product = DB::table('brand')->orderby('brand_name', 'asc')->get();
        return view('admin/products/add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }

    public function add_product_image(){
        $product = DB::table('product')->orderby('product_name', 'asc')->get();
        return view('admin/products/add_image_product')->with('product', $product);
    }

    public function edit_product($product_id) {
        $cate_product = DB::table('categories')->orderby('cate_name', 'asc')->get();
        $brand_product = DB::table('brand')->orderby('brand_name', 'asc')->get();

        $edit_product = DB::table('product')->where('product_id',$product_id)->get();
        $show_products = view('admin/products/edit_product')->with('edit_product', $edit_product)
                                                            ->with('cate_product',$cate_product)
                                                            ->with('brand_product',$brand_product);
        return view('admin/admin')->with('admin/products/edit_product',$show_products);
    }

    public function edit_product_image($image_id) {
        $img_product = DB::table('product')->orderby('product_name', 'asc')->get();

        $edit_img = DB::table('images')->where('image_id',$image_id)->get();
        $final = $edit_img[0];
        $show_products = view('admin/products/edit_product_image')->with('edit_product', $final)
                                                                  ->with('img_product',$img_product);
        return view('admin/admin')->with('admin/products/edit_product_image',$show_products);
    }

    public function update_product(Request $request, $product_id){
        $data = array();
        $this->validate($request, [
            'filenames.*' => 'mimes:jpeg,jpg,png'
        ]);

        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $data['product_image_name'] = $file->getClientOriginalName();
                $data['product_image_mime'] = $file->getClientMimeType();
                $data['product_image'] = file_get_contents($file->getPathName());
            }
        }
        $temp = preg_replace('/\s+/','-',$request->product_name);
        $temp = strtolower($temp);
        $data['product_slug'] = $temp; 
        $data['voucher_quantity'] = $request->voucher_quantity; 
        $data['product_name'] = $request->product_name;
        $data['product_cate'] = $request->product_cate;
        $data['product_brand'] = $request->product_brand;
        $data['product_price'] = $request->product_price;
        $data['product_content'] = $request->product_content;
        $data['product_desc'] = $request->product_description;
        $data['updated_at'] = new \DateTime();
        DB::table('product')->where('product_id', $product_id)->update($data);
        Session::put('inform','Update product successfully');
        return Redirect::to('adminPage/showProducts');
    }

    public function update_product_image(Request $request, $image_id){
        $data = array();
        $this->validate($request, [
            'filenames.*' => 'mimes:jpeg,jpg,png'
        ]);

        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $data['image_name'] = $file->getClientOriginalName();
                $data['image_mime'] = $file->getClientMimeType();
                $data['image_data'] = file_get_contents($file->getPathName());
            }
        }

        $data['image_product'] = $request->product_name;
        $data['updated_at'] = new \DateTime();
        DB::table('images')->where('image_id', $image_id)->update($data);
        Session::put('inform','Update product image successfully');
        return Redirect::to('adminPage/showProductsImage');
    }

    public function delete_product($product_id){
        DB::table('product')->where('product_id', $product_id)->delete();
        Session::put('inform','Delete product successfully');
        return Redirect::back();
    }

    public function delete_product_image($image_id){
        DB::table('images')->where('image_id', $image_id)->delete();
        Session::put('inform','Delete product image successfully');
        return Redirect::back();
    }

    public function save_product(Request $request){
        $data = array();

        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'mimes:jpeg,jpg,png'
        ]);
        
        if($request->hasfile('filenames'))
         {
            $dataImage = array();
            foreach($request->file('filenames') as $file)
            {
                $data['product_image_name'] = $file->getClientOriginalName();
                $data['product_image_mime'] = $file->getClientMimeType();
                $data['product_image'] = file_get_contents($file->getPathName());
            }
        }
        $temp = preg_replace('/\s+/','-',$request->product_name);
        $temp = strtolower($temp);
        $data['product_slug'] = $temp; 
        $data['voucher_quantity'] = 0;
        $data['voucher_enabled'] = 0;
        $data['product_name'] = $request->product_name;
        $data['product_status'] = $request->product_status;
        $data['product_cate'] = $request->product_cate;
        $data['product_brand'] = $request->product_brand;
        $data['product_price'] = $request->product_price;
        $data['product_content'] = $request->product_content;
        $data['product_desc'] = $request->product_description;
        $data['created_at'] = new \DateTime();
        //dd($data);
        DB::table('product')->insert($data);
        Session::put('inform','Add product successfully');
        return Redirect::to('adminPage/addProduct');
    }

    public function save_product_image(Request $request){
        $data = array();

        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'mimes:jpeg,jpg,png'
        ]);

        if($request->hasfile('filenames'))
         {
            $dataImage = array();
            foreach($request->file('filenames') as $file)
            { 
                $data['image_name'] = $file->getClientOriginalName();
                $data['image_mime'] = $file->getClientMimeType();
                $data['image_data'] = file_get_contents($file->getPathName());
            }
        }

        $data['image_product'] = $request->product_name;
        $data['created_at'] = new \DateTime();
        DB::table('images')->insert($data);
        Session::put('inform','Add product image successfully');
        return Redirect::to('adminPage/addProductImage');
    }

    public function unactive_product($product_id){
        DB::table('product')->where('product_id', $product_id)->update(['product_status'=>1]);
        Session::put('inform','Show product status successfully');
        return Redirect::to('adminPage/showProducts');
    }

    public function active_product($product_id){
        DB::table('product')->where('product_id', $product_id)->update(['product_status'=>0]);
        Session::put('inform','Hide product status successfully');
        return Redirect::to('adminPage/showProducts');
    }

    public function unactive_voucher($product_id){
        DB::table('product')->where('product_id', $product_id)->update(['voucher_enabled'=>0]);
        Session::put('inform','Disabled voucher successfully');
        return Redirect::to('adminPage/showProducts');
    }

    public function active_voucher($product_id){
        DB::table('product')->where('product_id', $product_id)->update(['voucher_enabled'=>1]);
        Session::put('inform','Enabled voucher successfully');
        return Redirect::to('adminPage/showProducts');
    }

    public function show_products(){

        $allProducts = QueryBuilder::for(Product::class)
        ->join('categories','categories.cate_id','=','product.product_cate')
        ->join('brand','brand.brand_id','=','product.product_brand')
        ->allowedFilters(['product_brand','product_cate'])
        ->paginate(5);

        $selectedCategory = request('filter%5Bproduct_cate%5D');
        $selectedBrand = request('filter%5Bproduct_brand%5D');
        
        if(request('filter')){
            if(array_key_exists('product_cate',request('filter'))){
                $selectedCategory = request('filter')['product_cate'];
            }
            if(array_key_exists('product_brand',request('filter'))){
                $selectedBrand = request('filter')['product_brand'];
            }
        }
        
        $filterCate = DB::table('categories')->get();
        $filterBrand = DB::table('brand')->get();

        $show_products = view('admin/products/show_products')
        ->with('products', $allProducts)
        ->with('filterCate', $filterCate)
        ->with('filterBrand', $filterBrand)
        ->with('selectedCate', $selectedCategory)
        ->with('selectedBrand', $selectedBrand);
        return view('admin/admin')->with('admin/products/show_products',$show_products);
    }


    public function show_products_image(){
        $temp1 = request('product');
        $filterProduct = DB::table('product')->get();
        if(!$temp1){
            $allImages['images'] = DB::table('images')
            ->join('product','product.product_id','=','images.image_product')
            ->orderby('images.image_product','desc')
            ->paginate(5);
        }
        else if($temp1){
            $allImages['images'] = DB::table('images')
            ->join('product','product.product_id','=','images.image_product')
            ->where('product_slug',$temp1)
            ->orderby('images.image_product','desc')
            ->paginate(5);
        }

        $show_images = view('admin/products/show_product_image')
        ->with('images', $allImages['images'])
        ->with('filterProduct', $filterProduct)
        ->with('selectedProduct', $temp1);
        return view('admin/admin')->with('admin/products/show_product_image',$show_images);
    }

}
