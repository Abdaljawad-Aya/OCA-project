@extends('public.layout.layout')
@section('content')

    @if($verified)
        <div class="container mt-4">
            <div class="row">
                <div class="col-lg-3">
                    <ul class="category-nav">
                        <li class="{{request()->getRequestUri() == '/manage_shop' ? 'active' : null}}">
                            <a href="/manage_shop">Shop Details</a>
                        </li>
                        @foreach($category as $item)
                            @if($item->category_approved == 1)
                                <li class="{{request()->getRequestUri() == '/manage_sub_categories' ? 'active' : null}}">
                                    <a href="/manage_sub_categories">Manage Categories</a>
                                </li>
                                <li class="{{request()->getRequestUri() == '/manage_products' ? 'active' : null}}">
                                    <a href="/manage_products">Manage Products</a>
                                </li>
                            @else

                            @endif
                        @endforeach



                    </ul>
                </div>

                <div class="col-lg-9">
                    <div class="single-news mb-5" style="padding: 0">
                        <div class="author-box" style="padding: 10px;">
                            <div class="row">

                                <div class="author-box"
                                     style="padding: 10px;display: flex;justify-items: center;align-items: center;margin-top: 0;background:none">
                                    <div class="media" style="margin-bottom: 0;width:60px">
                                        <img width="200" height="50"
                                             src="/images/{{\Illuminate\Support\Facades\Auth::user()->user_image}}"
                                             alt=""
                                             class="img-fluid rounded-circle">
                                    </div>
                                    <div class="body">
                                        <h4 class="media-heading m-1">{{\Illuminate\Support\Facades\Auth::user()->user_name}}</h4>
                                        <div class="meta-date m-0">May 12, 2017</div>
                                    </div>
                                </div>
                                @foreach($category as $item)
                                    @if($item->category_approved)
                                        <div class="ml-auto mt-3 align-items-center justify-content-center">
                                            <button style="height: 50px" type='submit' disabled
                                                    class="ml-auto btn btn-sm btn-success p-0 mr-5">Approved
                                            </button>
                                        </div>
                                    @else
                                        <div class="ml-auto mt-3 align-items-center justify-content-center">
                                            <button style="height: 50px" type='submit' disabled
                                                    class="ml-auto btn btn-sm btn-danger p-0 mr-5">Awaiting Approval
                                            </button>
                                        </div>
                                    @endif
                            </div>

                            <div class="row justify-content-center align-items-center">
                                <h2 style="margin: 0; padding: 0; color: black">{{$item->category_name}}</h2>
                            </div>
                            <div class="row justify-content-center align-items-center">
                                <div class="col-lg-6">

                                    @if($item->category_image != null)
                                        <div class="col-12"
                                             style="margin: 0; display: flex; justify-content: center; align-items: center">

                                            <img height="80%" width="80%" src="/images/{{$item->category_image}}"
                                                 alt=""
                                                 class="img-fluid rounded">

                                        </div>
                                    @endif
                                    @if($item->category_approved)
                                        <div class="row justify-content-center align-items-center mt-4 mb-4">
                                            <form action="{{route('manage_shop.show', $item->category_id)}} ">
                                            <button style="outline: none; cursor: pointer" class="btn-primary" type="submit">
                                                                                           Edit</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="content-wrapper mt-5 mb-5">
            <div class="content">
                {{--Form Start--}}
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-header">Create Your Chop</div>
                            <div class="card-body">
                                <div class="card-title">
                                    <h3 class="text-center title-2">Shop Details</h3>
                                </div>
                                <hr>
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <p>{{ $message }}</p>
                                    </div>
                                @endif
                                <form action="/manage_shop" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="shop_name" class="control-label mb-1">Shop Name</label>
                                        <input name="shop_name" type="text" class="form-control"
                                               value="{{ old('shop_name') }}">
                                        @if ($errors->has('shop_name'))
                                            <div class="alert alert-danger">{{ $errors->first('shop_name') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="shop_image" class="control-label mb-1">Shop Image</label>
                                        <input name="shop_image" type="file" class="form-control">
                                    </div>
                                    <div>
                                        <button id="payment-button" type="submit"
                                                class="btn btn-lg btn-success btn-block" name="submit">Add
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
