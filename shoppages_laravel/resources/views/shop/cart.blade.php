<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <button type="button" class="btn btn-default" onclick="window.location='{{ route('index')}}'">index</button>
{{-- dd(Session::get('cart')) --}}

    @foreach (Session::get('cart') as $item)
    {{ $item->product_id }}
    {{ $item->product_name }}
    {{ $item->product_price }}
    @endforeach


    @foreach (Session::get('buynumbers') as $buynumber)
    {{ $buynumber }}
    @endforeach
    
    {{-- var_dump(Session::get('product_array'))  --}}

    @foreach (Session::get('product_array') as $key => $array)
        @foreach($array as $key1 => $value) 
        <li> 商品id   {{ $array[$key1]->product_id }}     </li>
        <li> 商品名稱   {{ $key }}{{ $array[$key1]->product_name }}   </li>
        <li> 商品價格   {{ $array[$key1]->product_price }}  </li>
        @endforeach
    @endforeach


    @foreach(Session::get('buynumber') as $buynumber)
        購買數量{{ $buynumber }}
    @endforeach
{{--  
        @foreach (Storage::get('product') as $product))
            {{ $product->product_id }}
        @endforeach
--}}   
   
{{--  
    @foreach ($product as $buynumber)
    {{ $buynumber->product_id }}
    {{ $buynumber->product_name }}
    @endforeach
--}}



    {{-- var_dump($product_json) --}}
    {{-- var_dump(Storage::get('product')) --}}
    {{--  $data_1=Storage::get('product')--}}
    {{--  
    <?php   //$data_2 = JSON.parse( $data_1 );
    ?>
    --}}
    <div class="details" style="display:none">{{-- $data = json_decode(Storage::get('product'), true)--}}</div>
      
    {{-- var_dump($data2) --}}
{{--  
    @foreach ($data['product'] as $product)
    {{ $product['product_id'] }}
    @endforeach
--}}
{{--  
    <div class="details" style="display:none">{{ $data = json_decode(Storage::get('product')) }}</div>
    {{ dd($data) }}
--}}
{{--  
    <div class="details" style="display:none">{{ $datas = (Storage::get('product')) }}</div>
    {{-- $datas = (Storage::get('product')) --}}
    {{--  
    <div class="details" style="display:none">{{ $data = json_encode($datas) }}</div>
    --}}
    {{-- $data = json_decode($datas) --}}
    {{--
    {{ dd($data) }}
    --}}
    {{-- $data['product_id'] --}}
    {{--var_dump($data)-- }}
    {{-- var_dump(Storage::get('product')) --}}
    {{--  
    @foreach (json_decode(Storage::get('product')) as $product)
    {{ $product }}
    @endforeach
    --}}
    {{-- Storage::get('product') --}}
{{--  
    @foreach (Storage::get('product') as $product)
    {{ $product->product_id }}
    @endforeach
--}}
    {{-- var_dump(Session::get('product_json')) --}}
    {{-- var_dump(Session::get('product_array')) --}}

{{--   
    @foreach (Session::get('product_array') as $product_array)
            {{ $product_array->product_id }}
            {{ $product_array->product_name }}
    @endforeach
--}}

    {{-- (Session::get('product_array')) --}}

    {{-- Session::flush() }}

    
{{--  
    @foreach (Session::get('product_array') as $product_array)
    {{ $product_array->product_id }}
    @endforeach 
--}} 

    {{--Session::flush()-- }}
    {{-- session::forget('product_array') --}}
    
 {{--   
    @foreach (Session::get('product.array') as $product_arrays)
            {{ $product_arrays }}
    @endforeach  
--}}
    
{{--  
    @foreach (Session::get('product_array') as $product_array)
    {{ $product_array['product_id']  }}
    @endforeach 
--}}    
    
    
{{--    
    @foreach (Session::get('product_array') as $product_array)
    {{ $product_array }}
    @endforeach 
--}}

    {{-- dd(Session::get('product_array')) --}}
{{--  
    @foreach (Session::get('product_array') as $key => $product_array)
    
        {{ $product_array['product_id'][$key] }}
    @endforeach   
--}}

    {{-- dd($product_array) --}}
    {{-- print_r($product)  --}}

    {{--  
    @foreach (Session::get('cart') as $item)
        {{ $item->product_id }}
        {{ $item->product_name }}
        {{ $item->product_price }}
    @endforeach
    --}}
    {{-- dd($product_array) --}}
    {{-- Session()->get('cart') --}}

    {{-- $product_decode->product_id }}
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