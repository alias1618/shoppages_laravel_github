<?php

namespace App\Http\Controllers\Customer;

//use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
//use App\Http\Controllers\Customer\Session;
use Session;

class CustomerController extends Controller
{
    public function showindex()
    {
        $product = DB::table('product')
        ->join('photo', 'product.product_id', '=', 'photo.product_id')
        //->join('product_category', 'product.product_category_id', '=', 'product_category.product_category_id')
        //->join('product_status', 'product.product_status_id', '=', 'product_status.product_status_id')
        //->join('photo', 'product.product_id', '=', 'photo.product_id')
        ->groupBy('product.product_id')
        ->orderBy('product.product_id', 'asc')
        ->get();

    return View('customer/index')
                ->with('product',$product);
    }

    public function showdetail($product_id)
    {
        $product = DB::table('product')
            
            ->join('photo', 'product.product_id', '=', 'photo.product_id')
            //->join('product_category', 'product.product_category_id', '=', 'product_category.product_category_id')
            //->join('product_status', 'product.product_status_id', '=', 'product_status.product_status_id')
            //->join('photo', 'product.product_id', '=', 'photo.product_id')
            ->where('product.product_id', $product_id)
            ->groupBy('product.product_id')
            ->orderBy('product.product_id', 'asc')
            //->get()
            //->first()
            ;
            //if ($product_number > 5){
             //   $buy_number = 5;
            //}else{
                //$buy_number = $product_number;
            //}
           // for($i=1;$i <= $buy_number; $i++){
    
           // }
        $max_buynumber = array(1,2,3,4,5);      

        $products = $product->get();
            return View('customer/index_detail')
                ->with('product',$products)
                ->with('product_id',$product_id)
                ->with('max_buynumber', $max_buynumber);
    }

    public function putincart($product_id, $buynumber)
    {
        $product = DB::table('product')
                        ->where('product_id', $product_id)
                        //->toarray()
                        //->get()
                        //->first()
                        ;
        $products = $product->get()->tojson(JSON_UNESCAPED_UNICODE);
        $products_02 = $products;
        //Session::push('cart', $products_02);
        $buynumbers = $buynumber;
        


        
        //Session::push('cart', $products_02);
        //$test = collect([$products]);
        //session::push('test', $products);
        //$value = session('key','default');
        //session()->put('test', 'zzzzz');
        //session()->push('user.teams', 'developers');                
        //session(['product_name'  =>  $buyproduct->product_name]);
        //session()->put('product_name', $products->product_name);
        /*
        $test= 
        [
            'product_id'    =>  $product_id,
            'product_name'  =>  $products->get('product_name'),
            'product_price' =>  $products->get('product_price'),
            'product_number'=>  $products->get('product_name')
        ]; 
        */
        //session()->push('product', $product);
        //return view('shop/cart')
         //       ->with('cart_session', $cart_session);

        return  View('shop/cart')
                ->with('products',$products)
                ->with('products_02',$products_02)
                ->with('buynumber',$buynumbers)
                //->with('product_id',$product_id)
                //->with('value',$value)
                //->with('test',$test)
                //->with('product',$product)
                //->with('product_name',$product_name)
                //->with('cart_session',$cart_session)
                ;
    }
}