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
        $total_number='0';
        $total_price='0';
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

        //Session::put('k', '777');
        //Session::put('k1', '777');

        Session::push('product_array', $product);
        Session::push('buynumber', $buynumber);

        foreach (Session::get('product_array') as $key_01 => $array){
            foreach($array as $key_02 => $value) {
                $product_price = $array[$key_02]->product_price;
                //$value;
                
                foreach(Session::get('buynumber') as $key => $buynumber)
                if($key_01 == $key){
                    $buynumbers=(int)$buynumber;
                }

            }

        }
        $subtotal = $product_price * $buynumbers;
        Session::push('subtotal', $subtotal);
        Session::push('product_price', $product_price);

        //$subtotal =[];
        //$subtotal = $product_price * $buynumber;
        //Session::push('subtotal', $subtotal);
        $total_number = Session::get('total_number') + $buynumbers;
        Session::put('total_number', $total_number);
        $total_price = Session::get('total_price') + $subtotal;
        Session::put('total_price', $total_price);

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
                //->with('product_json',$product_json)
                //->with('product',$product)
                //->with('subtotal',$subtotal)
                //->with('total_number',$total_number)
                //->with('total_price',$total_price)
                //->with('test',$test)
                ;
    
                
    }
    public function deletecart($key_01){

        //$k = Input::get('key_01');
        $k = $key_01;
        //$request->get('key_01');
        //$k1 = $key_02;
        $id = Input::get('id');
        Session::forget('product_array.'.$k);
        Session::forget('buynumber.'.$k);

        Session::forget('subtotal.'.$k);
        Session::forget('product_price.'.$k);
        Session::put('k', $k);
        $total_number=0;
        $total_price=0;
        Session::forget('total_number');
        Session::forget('total_price');

        foreach (Session::get('product_array') as $key_01 => $array){
            foreach($array as $key_02 => $value) {
                $product_price = $array[$key_02]->product_price;
                //$value;
                
                foreach(Session::get('buynumber') as $key => $buynumber)
                if($key_01 == $key){
                    $sub_number = (int)$buynumber;
                    //$total_number = Session::get('total_number') + $buynumbers;
                    
                }
                
            }
            $total_number = $total_number + $sub_number;
            $subtotal = $product_price * $sub_number;
            $total_price = $total_price + $subtotal;
        }


        Session::put('total_number', $total_number);
        //$total_price = Session::get('total_price') + $subtotal;
        Session::put('total_price', $total_price);

        return  View('shop/cart')
        //->with('k',$k)
        //->with('k1',$k1)
        //->with('test',$test)
    
        ;
    }

    public function changecart(Request $request){
        $buynumber = $request->get('buynumber'); 

        return View('shop/test')
            ->with('buynumber',$buynumber)
        ;
    }

}