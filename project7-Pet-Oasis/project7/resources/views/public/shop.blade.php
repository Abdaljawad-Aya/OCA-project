@extends('public.layout.layout')
@section('title')
    Shop Page
@endsection
@section('desc')
    This page contains our vendors and shops and products.
@endsection
@section('content')
    <div class="container p-5">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-sm-4 col-md-4">
                    <div class="rs-shop-box mb-5">
                        <div class="media">
                            <a href="/products/{{$category->category_id}}">
                                <img
                                    src="/images/{{$category->category_image}}"
                                    alt="{{$category->category_name}}" class="img-fluid"></a>
                        </div>
                        <div class="body-text">
                            <h4 style="text-align: center" class="title"><a href="shop-single.html"><b>{{$category->category_name}}</b></a></h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
