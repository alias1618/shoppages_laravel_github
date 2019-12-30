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
use Storage;

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
        $total_number=0;
        $total_price=0;
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
        
        $room = json_decode($product, true);
        $rooms =array();
        $rooms = array_push($rooms, $room);

        $product_json = json_encode($product, JSON_UNESCAPED_UNICODE); 
        $product_array = $product;
        
        //Storage::put('product',  $rooms); 

        Session::put('k', '777');
        Session::put('k1', '777');

        Session::push('product_array', $product);
        Session::push('buynumber', $buynumber);

        foreach (Session::get('product_array') as $key_01 => $array){
            foreach($array as $key_02 => $value) {
                ($product_price=$array[$key_02]->product_price);
            }
            foreach(Session::get('buynumber') as $key => $buynumber)
            if($key_01 == $key){
                $buynumber;
            }
            $subtotal = $product_price*$buynumber;
            $total_number += $buynumber;
            $total_price += $subtotal;
        }
        //$files =   Storage::allFiles($dir);
        //Storage::delete('product');               
        //Session::push('product_array', $product);                
        //$product_array = $product->toarray();
        //Session::push('product_array', $product_array);
        //Session::flush();
        //$product_json = json_encode($product, JSON_UNESCAPED_UNICODE);
        //Session::put('product_json', $product_json);
        //Session::pull('key', 'default');
        //$buynumbers = array("buynumber" => $buynumber); 
        //$test = '9999';
        //session::put('test001','9999');
        //Session::put('cart', $product);
        //Session::put('buynumbers', array($buynumber));
        return  View('shop/cart')
                ->with('product_json',$product_json)
                ->with('product',$product)
                //->with('test',$test)
                ;
        //$product_array["buynumber"] = $buynumber;
        //Session::put('cart', $product_array);
        //$products = $product->put('buynumber', $buynumber);
        //Session::put('cart', $products);
        
        //$product_json = json_encode($product_array, JSON_UNESCAPED_UNICODE);
        //$product_decode = json_decode($product_json, JSON_UNESCAPED_UNICODE);
        //Session::put('cart', $product_json);
        //Session::get('cart');

            //->with('product_array', $product_array)
            //->with('product', $product)
            //->with('product_json', $product_json)
            //->with('product_decode', $product_decode)
            //work
            
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
    public function deletecart($key_01){

        //$k = Input::get('key_01');
        $k = $key_01;
        //$request->get('key_01');
        //$k1 = $key_02;
        $id = Input::get('id');
        Session::forget('product_array.'.$k);
        Session::forget('buynumber.'.$k);
        Session::put('k', $k);
        //Session::put('k1', $k1);
        //unset($product_array[$k]);
        //Session::flush();
        //session::forget('product_array');
        //Session::push('product_array', $product_array);

        //$test = '888888';
        //unset($test);
/*
        session::put('test001','888888');
        $test001 = session::get('test001');
        unset($test001);
        if  (empty($test001)){
            session::put('test001',$test001);
        }
*/        
/*
        foreach ($product_array as $key => $array){
            foreach($array as $key1 => $value) {
                //if($k == $key || $k1 == $key1){
                if($id ==   ($array[$key1]->product_id)){
                    unset($product_array[$key1]);

                    //unset($product_array[$k][$k1]);   not working
                    //Session::pull('product_array',$product_array);
                    Session::flush();
                    Session::push('product_array', $product_array);
                }
            }
        }
*/

        //Session::flush();
        //Session::push('product_array', $array);
        return  View('shop/cart')
            //->with('k',$k)
            //->with('k1',$k1)
            //->with('test',$test)
        
        ;
    }
}