<?php

namespace App\Http\Controllers\Customer;

//use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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
        $products = $product->get();
            return View('customer/index_detail')
                ->with('product',$products)
                ->with('product_id',$product_id);
    }

    public function putincart($product_id){
        $buyproduct = DB::table('product')
                        ->where('product_id', $product_id)
                        ->get();

        $cart_session = Session::push('product', [
                    'product_id'    =>  $product_id,
                    'product_name'  =>  $buyproduct->product_name,
                    'product_price' =>  $buyproduct->productprice,
                    'product_number'=>  $buyproduct->product_name
                    ]); 
        //return view('shop/cart')
         //       ->with('cart_session', $cart_session);

        return  view('shop/cart')->with('product_id',$product_id);
    }
}