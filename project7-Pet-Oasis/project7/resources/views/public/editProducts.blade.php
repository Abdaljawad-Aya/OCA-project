@extends('public.layout.layout')
@section('content')
    <div class="content-wrapper mt-5 mb-5">
        <div class="content">
            {{--Form Start--}}
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4">
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
                            <form action="{{ route('manage_products.update', $product->product_id) }}" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                @method('PATCH')
                                <div class="form-group">
                                    <label for="product_name" class="control-label mb-1">Product Name</label>
                                    <input name="product_name" type="text" class="form-control"
                                           value="{{$product->product_name}}"
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
                                           value="{{$product->product_price}}"
                                               value="{{ old('product_price') }}">
                                    @if ($errors->has('product_price'))
                                        <div
                                            class="alert alert-danger">{{ $errors->first('product_price') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="product_desc" class="control-label mb-1">Product Name</label>
                                    <textarea name="product_desc" type="text" class="form-control">{{$product->product_description}}{{ old('product_desc') }}
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
                                            <option>select an option</option>
                                            @foreach($sub_cat as $value)
                                                <option
                                                    {{$product->sub_category_id == $value->sub_category_id ? 'selected' : ''}}
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
        </div>
    </div>


@endsection
