<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('cart', $product_id) }}">
    @foreach ($product as $object)
    <img src="{{ asset('uploads/'.$object->product_photo_name)}}" width=10%//>
{{-- <img src="{{ asset('uploads/'.$object->product_photo_name)}}" width=15%/> --}}
    {{ $object->product_name }}
    {{ $object->product_price }}
    <input id="product_id" type="hidden" name="product_id" value="{{ $object->product_id }}">
    <input type=submit value=購買>
    @endforeach
</body>
</html>