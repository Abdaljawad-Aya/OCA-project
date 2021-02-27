@extends('public.layout.layout')
@section('content')

        @foreach($sub_category as $value)
            <div class="content-wrapper mt-5 mb-5">
                <div class="content">
{{--                                Form Start--}}
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
                                    <form action="{{ route('manage_sub_categories.update', $value->sub_category_id) }}" method="post" enctype="multipart/form-data">
                                        @method('PATCH')
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="shop_name" class="control-label mb-1">Shop Name</label>
                                            <input name="shop_name" type="text" class="form-control"
                                                   value="{{$value->sub_category_name}}"
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
                                                    class="btn btn-lg btn-primary btn-block" name="submit">Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
@endsection
