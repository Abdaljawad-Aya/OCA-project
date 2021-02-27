@extends('public.layout.layout')
@section('content')
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none !important;
        }
    </style>
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-3">
                <ul class="category-nav">
                    <li class="{{request()->getRequestUri() == '/manage_shop' ? 'active' : null}}">
                        <a href="/manage_shop">Shop Details</a>
                    </li>
                    <li class="{{request()->getRequestUri() == '/manage_sub_categories' ? 'active' : null}}">
                        <a href="/manage_sub_categories">Manage Categories</a>
                    </li>
                    <li class="{{request()->getRequestUri() == '/manage_products' ? 'active' : null}}">
                        <a href="/manage_products">Manage Products</a>
                    </li>

                </ul>
            </div>

            <div class="content-wrapper mt-5 mb-5 col-9">
                <div class="content">
                    {{--Form Start--}}
                    <div class="row justify-content-center align-items-center">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">Create Product</div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Product Details</h3>
                                    </div>
                                    <hr>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                    <form action="/manage_products" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="product_name" class="control-label mb-1">Product Name</label>
                                            <input name="product_name" type="text" class="form-control"
                                                   value="{{ old('product_name') }}">
                                            @if ($errors->has('product_name'))
                                                <div
                                                    class="alert alert-danger">{{ $errors->first('product_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="product_price" class="control-label mb-1">Product Price</label>
                                            <input name="product_price" type="number"
                                                   class="form-control"
                                                   value="{{ old('product_price') }}">
                                            @if ($errors->has('product_price'))
                                                <div
                                                    class="alert alert-danger">{{ $errors->first('product_price') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="product_desc" class="control-label mb-1">Product Name</label>
                                            <textarea name="product_desc" type="text" class="form-control"
                                                      >
                                                {{ old('product_desc') }}
                                            </textarea>
                                            @if ($errors->has('product_desc'))
                                                <div
                                                    class="alert alert-danger">{{ $errors->first('product_desc') }}
                                                </div>
                                            @endif
                                        </div>

                                        <div class="form-group row">
                                            <label for="product_sub_cat" class="col-md-4 col-form-label text-md-right">Sub
                                                Category</label>
                                            <div class="col-md-12">
                                                <select required name="product_sub_cat" class="custom-select "
                                                        id="product_sub_cat">

                                                    @foreach($sub_cat as $value)
                                                        <option
                                                            value="{{$value->sub_category_id}}">{{$value->sub_category_name}}</option>
                                                    @endforeach

                                                </select>
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="product_image" class="control-label mb-1">Shop Image</label>
                                            <input name="product_image" type="file" class="form-control">
                                        </div>
                                        <div>
                                            <button id="payment-button" type="submit"
                                                    class="btn btn-lg btn-primary btn-block" name="submit">Add
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Table Start--}}
                    <div class="row justify-content-center align-items-center mt-4">
                        <div class="col-12">
                            <!-- Recent Order Table -->
                            <div class="card card-table-border-none" id="recent-orders">
                                <div class="card-header justify-content-between">
                                    <h2>Products</h2>

                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <table
                                        class="table"
                                        style="width: 100%; text-align: center">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>description</th>
                                            <th>price</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $value)
                                            <tr>
                                                <td>{{$value->product_id}}</td>
                                                <td><img src="images/{{$value->product_image}}" width="55"
                                                         height="55"
                                                         class="rounded-circle"/></td>
                                                <td>
                                                    <a class="text-dark" href="">{{$value->product_name}}</a>
                                                </td>
                                                <td>
                                                    {{ Str::limit($value->product_description, 40) }}
                                                </td>
                                                <td>
                                                    {{$value->product_price}} JOD
                                                </td>
                                                <td>
                                                    <button class="btn btn-success p-1"><a style="color: white"
                                                    href="{{ route('manage_products.edit', $value->product_id)  }}">Edit</a>
                                                    </button>
                                                </td>
                                                <td>
                                                    <form method="post"
                                                          action="{{route('manage_products.destroy', $value->product_id)}}">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button type="submit" class="btn btn-danger p-1"><a>Remove</a>
                                                        </button>

                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--Table End--}}
                </div>
            </div>
        </div>
    </div>
@endsection
