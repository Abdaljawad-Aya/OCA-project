@extends('public.layout.layout')
@section('content')
    <div class="container p-5 mt-5">

        <div class="row">

            <div class="col-12 col-sm-6 col-md-6">

                <div class="media-detail">
                    <img src="/images/{{$product->product_image}}" alt="" class="img-fluid">
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <a href="#"><img src="images/no-image.png" alt="" class="border-img img-fluid"></a>
                    </div>
                    <div class="col">
                        <a href="#"><img src="images/no-image.png" alt="" class="border-img img-fluid"></a>
                    </div>
                    <div class="col">
                        <a href="#"><img src="images/no-image.png" alt="" class="border-img img-fluid"></a>
                    </div>
                    <div class="col">
                        <a href="#"><img src="images/no-image.png" alt="" class="border-img img-fluid"></a>
                    </div>
                </div>

            </div>


            <div class="col-12 col-sm-6 col-md-6">
                <div style="direction: ltr" class="single-shop">

                    <p class="title-heading text-secondary mb-1">
                       {{$product->product_name}}
                    </p>
                    <div class="price">{{$product->product_price}} JOD</div>

                    <p class="mt-4">{{$product->product_description}}</p>

{{--                    <a href="" class="btn btn-primary mt-4 mb-4">View More products</a>--}}

{{--                    <p>SKU : N/A <br>Categories : Dog <br>Product ID : 01254</p>--}}
{{--                    <div class="spacer-50"></div>--}}


                </div>
            </div>
        </div>
    </div>
@endsection
