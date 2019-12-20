<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    {{ Session()->get('cart') }}
    {{-- work --}}
    {{-- isset($product_json['product_id']) --}}
    {{--dd($product_json) --}}
    {{-- printf($product_json) --}}
    {{-- $product_json['cart']['product_name'] --}}


    {{--  $product_json['product_id'] --}}

    {{-- var_dump($product_json) --}}
    {{--    
    @foreach(json_decode($product_json, true) as $value)
        Member ID: {{ $value['product_name'] }}   
    @endforeach
    --}}


    {{-- Session::get('cart')['product_id'] --}}




{{-- dd(Session::get('cart')) --}}
{{-- 
    @foreach (Session::get('cart') as $item)
        {{ $item->product_id }}
    @endforeach
 --}}



{{--  
    @if(Session::has('cart'))
        @foreach (Session::get('cart') as $item)
            {{ $item->product_id }}
        @endforeach
    @endif
--}}
    {{-- Session::get('cart', 'product_id') }}
        {{-- $item["product_id"] --}}
    
    {{-- 

    @foreach (Session::get('cart') as $item)
        {{ $item['product_id'] }}
        {{ $item['product_name'] }}
        {{ $item['product_price'] }}
        {{ $item['buynumber'] }}
    @endforeach 
    
    --}}

    {{-- Session::get('cart') }}
        {{-- work --}}
    {{--  
        {{-- $product_json }} 
        {{--  var date = {{ Session::get('cart') }};--}}
        {{-- json_encode( Session::get('cart'), true )[ 'product_id' ] --}}
        
    {{--  
    @foreach(Session::get('cart') as $item)
        $itemData = json_decode($item->data, true); 
        {{ $itemData['product_id'] }}
    @endforeach


        @foreach (Session::get('cart', 'default') as $item)
                {{ $item['product_id'] }}
        @endforeach

--}}




    {{--  $value --}}
    {{-- '123456' --}}
    {{-- session()->get('product_name') --}}
    {{-- session()->get('test') }}
    {{-- session()->get('user.teams') --}}
    {{-- (Session::all()) --}}
    {{-- dd($product_array) }}
    {{-- dd($merge) --}}
    {{-- print_r($merge) --}}
    {{-- print_r($product_array) }}
    {{-- ($product_array) }}
    {{-- $buynumber --}} 
    {{-- $number_json --}} 
    {{-- var_dump($product) --}}
    {{-- 
    Session::flush() }}
    {{--  
    @if(Session::has('cart'))
        {{ Session::all() }}
    @endif
    --}}
    {{--     
    @if(Session::has('cart'))  
        @foreach (Session::get('cart') as $item)
        {{ $item['product_id'] }}
        {{ $item['product_name'] }}
        {{ $item['product_price'] }}
        {{ $item['buynumber'] }}
        @endforeach 
    @endif
    --}}
    {{-- session('cart')[0]['product_id'] --}}
    {{--   
    @foreach (Session::get('cart') as $item)
    {{ $item['product_id'] }}
    {{ $item['product_name'] }}
    {{ $item['product_price'] }}
    {{ $item['product_name'] }}
    @endforeach 
    --}}


    {{-- $item->product_name }}
    {{ $item->product_number --}}
    {{--  @endforeach
    --}}
    {{-- dd($product) }}
    {{-- dd($products_02) --}}
    {{-- $product_name --}}
    {{-- session()->get('cart') --}}
    {{-- var_dump($test) --}}
    {{--      
    @foreach ($product_array as $item)
        {{ $item->product_id }}
        {{ $item->product_name }}
        {{ $item->product_number }}    
        {{ $item->buynumber }}
    @endforeach
    --}} 
    {{-- dd($buyproduct) --}}
    {{-- print_r($buyproduct) --}}
</body>
</html>