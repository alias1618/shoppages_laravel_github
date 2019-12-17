<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{--  $value --}}
    {{ '123456' }}
    {{-- session()->get('product_name') --}}
    {{-- session()->get('test') }}
    {{-- session()->get('user.teams') --}}
    {{-- (Session::all()) --}}
     {{ $buynumber }} 
    @foreach (Session::get('cart') as $item)
    {{ $item }}
    {{-- $item->product_name --}}
    @endforeach
    {{-- $item->product_name }}
    {{ $item->product_number --}}
    {{--  @endforeach
    --}}
    {{-- dd($products) --}}
    {{-- dd($products_02) --}}
    {{-- $product_name --}}
    {{-- session()->get('cart') --}}
    {{-- var_dump($test) --}}
    {{--  
    @foreach ($products as $item)
        {{ $product_id }}
        {{ $item->product_name }}
        {{ $item->product_number }}
    @endforeach
    --}}
    {{-- dd($buyproduct) --}}
    {{-- print_r($buyproduct) --}}
</body>
</html>