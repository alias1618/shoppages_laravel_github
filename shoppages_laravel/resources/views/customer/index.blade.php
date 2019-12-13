@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" > 
            <div class="panel panel-default"> 
                <div class="panel-heading">商品</div>
                @if(isset($product))
                @foreach($product as $object)


                <div class="panel-body">
                    <form class="list-group list-group-horizontal" method="POST" action="{{ route('editproduct_update') }}">
                        {{ csrf_field() }}
                    <input id="product_id" type="hidden" class="form-control" name="product_id" value="{{ $object->product_id }}">

                            <label for="product_name" class="col-md-4 control-label"></label>

                            <img src="{{ asset('uploads/'.$object->product_photo_name)}}" width=15%/>




                            <label for="product_number" class="col-md-4 control-label"></label>                             
                                {{ $object->product_name }}



                                <label for="product_price" class="col-md-4 control-label">定價</label>                             
                                    {{ $object->product_price }}


                        @endforeach
                        @endif

                        

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection






