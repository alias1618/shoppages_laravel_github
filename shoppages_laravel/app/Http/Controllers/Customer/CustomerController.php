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
                ->with('product',$product);;
    }
}