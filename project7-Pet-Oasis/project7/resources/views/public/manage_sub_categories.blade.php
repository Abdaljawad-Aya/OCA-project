@extends('public.layout.layout')
@section('content')

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
                                <div class="card-header">Create Category</div>
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Category Details</h3>
                                    </div>
                                    <hr>
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>
                                    @endif
                                    <form action="/manage_sub_categories" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="category_name" class="control-label mb-1">Category Name</label>
                                            <input name="category_name" type="text" class="form-control"
                                                   value="{{ old('category_name') }}">
                                            @if ($errors->has('category_name'))
                                                <div
                                                    class="alert alert-danger">{{ $errors->first('category_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="category_image" class="control-label mb-1">Shop Image</label>
                                            <input name="category_image" type="file" class="form-control">
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
                                    <h2>Vendors</h2>

                                </div>
                                <div class="card-body pt-0 pb-5">
                                    <table
                                        class="table"
                                        style="width: 100%; text-align: center">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Category Name</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sub_categories as $value)
                                            <tr>
                                                <td>{{$value->sub_category_id}}</td>
                                                <td><img src="images/{{$value->sub_category_image}}" width="55"
                                                         height="55"
                                                         class="rounded-circle"/></td>
                                                <td>
                                                    <a class="text-dark" href="">{{$value->sub_category_name}}</a>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success p-1"><a style="color: white"
                                                                                           href="{{ route('manage_sub_categories.edit', $value->sub_category_id)  }}">Edit</a>
                                                    </button>
                                                </td>
                                                <td>
                                                    <form method="post"
                                                          action="{{route('manage_sub_categories.destroy', $value->sub_category_id)}}">
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
