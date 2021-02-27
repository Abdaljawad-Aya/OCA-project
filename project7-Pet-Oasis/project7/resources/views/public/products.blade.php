@extends('public.layout.layout')

@section('content')

    <div class="container mt-3">
        <div class="row">
            <div class="col-lg-3">
                <div class="widget categories">
                    <div class="widget-title">
                        Categories
                    </div>
                    <ul class="category-nav">
                        <li class="{{request()->getRequestUri() === '/products/'.$cat_id ? 'active' : null}}"><a
                                href="/products/{{$cat_id}}">All Products</a></li>
                        @foreach($sub_categories as $sub_cat)
                            <li class="{{request()->getRequestUri() === '/products/'.$cat_id.'/'.$sub_cat->sub_category_id ? 'active' : null }}">
                                <a href="/products/{{$cat_id}}/{{$sub_cat->sub_category_id}}">{{$sub_cat->sub_category_name}}</a>
                            </li>
                        @endforeach
                        <li><a href="/shop">All Categories</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-sm-4 col-md-4">
                            <div class="rs-shop-box mb-5">
                                <div class="media">
                                    <a href="/single_product/{{$product->product_id}}"><img src="/images/{{$product->product_image}}"
                                                                    alt="{{$product->product_name}}" class="img-fluid"></a>
                                </div>
                                <div class="body-text">
                                    <h4 style="text-align: center" class="title"><a
                                            href="single_product_page/{{$product->product_id}}"><b>{{$product->product_name}}</b></a>
                                    </h4>
                                    <div class="meta">
                                        <div class="price">{{$product->product_price}} JOD</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
