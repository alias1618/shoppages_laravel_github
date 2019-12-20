<?php

namespace App\Http\Controllers\Customer;

//use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Eloquent;
use App\Flight;
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

    public function putincart()
    {
        
        $buynumber = Input::get('buynumber');
        $product_id = Input::get('product_id');
        $product = DB::table('product')
                        ->where('product_id', $product_id)
                        //->toarray()
                        //->get()
                        //->first()
                        ->get()
                        //->toArray();
                        ;
        $product_array = (array)$product; 
        $product_array["buynumber"] = $buynumber;
        //Session::put('cart', $product_array);


        $product_json = json_encode($product_array, JSON_UNESCAPED_UNICODE);
        Session::put('cart', $product_json);
        //Session::get('cart');
        return  View('shop/cart')
            ->with('product_json', $product_json)
            //work
            ;
/*
        $product = DB::table('product')->where('product_id',48)->get();
        $product[0]->buynumber = 5;
        //$product_array = array_merge($product[0],['buynumber' => 5]);
        $product_array = $product[0];
        Session::push('cart', $product_array);

        return  View('shop/cart');
*/
        /*
        $number = array('buynumber'.$buynumber);                
        $number = array('buynumber',$buynumber);
        array_push($product, $number);
        */
        //"product_number":400,+
        //$number = attributes['buynumber'] == $buynumber;
        /*
        $products = $product->map(function ($product) use ($buynumber) {
            $product['buynumber'] -> $buynumber;
            return $product;
        });
        */


        

        /*
        $products = $product->transform(function ($item, $key) {
            $item['buynumber'] = $buynumber;
            return $item;
        });
        */
        //$buy_number = array('buynumber' => $buynumber);
        
        //(work)
        
/*
        array_map(function($product) use($buy_number) {
        return array_merge($product, $buy_number);}, 
        $product_array);
*/
        
        
        //$merge = array_merge($product_array, $buy_number);
        //$product_array = array_merge($product[0],['buynumber' => 5]);
        //array_push($product_array, $product_array['buynumber']=$buynumber);
        //$product_array['buynumber'] = $buynumber;
        //(work)
        //$buy_number = array('buynumber' => $buynumber);
        //array_push($product_array, $buy_number);
        //$product_array = array_add(['buynumber' => $buynumber]);
        //$product->push('buynumber', '$buynumber');
        //$product_json = $product_array->tojson(JSON_UNESCAPED_UNICODE);
        //$product_json =json_encode($product_array);
//$product_json = $product_array->toget()->tojson(JSON_UNESCAPED_UNICODE);


        //$number_json = $number->tojson();
        /*
        $products = $product->get()->tojson(JSON_UNESCAPED_UNICODE);
        $products_02 = $products;
        Session::push('cart', $products_02);
        $buynumbers = $buynumber;
        */
        /*
        $i = 0;
        foreach ($product_array as  $item){
             $item->product_id 
             $item->product_name 
             $item->product_number }}
             $item->buynumber = $buynumber[$i] 
        }
        */
        
        //Session::push('cart', $product_array);
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

        //return  View('shop/cart')
                    //->with('product_array',$product_array)
                    //->with('product_json',$product_json)
                    //->with('merge',$merge)
                    //->with('product',$product)
                    //->with('buynumber',$buynumber)
                    //->with('products',$products)
        /*
                ->with('products',$products)
                ->with('products_02',$products_02)
                //->with('buynumber',$buynumbers)
                ->with('product_id',$product_id)
                ->with('product',$product)
        */
                //->with('number_json',$number_json)
                //->with('value',$value)
                //->with('test',$test)
                //->with('product',$product)
                //->with('product_name',$product_name)
                //->with('cart_session',$cart_session)
                
    }
}