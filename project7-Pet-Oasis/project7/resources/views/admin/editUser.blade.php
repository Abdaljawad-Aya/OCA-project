@extends('admin.layout.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            {{--            Form Start--}}
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">Manage User</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create ‘ser</h3>
                            </div>
                            <hr>
                            <form action="{{ route('user.update', $user->user_id) }}" method="post"
                                  enctype="multipart/form-data">
                                @method('PATCH')
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="user_name" class="control-label mb-1">User Name</label>
                                    <input name="user_name" type="text" class="form-control"
                                           value="{{ $user-> user_name }}">
                                    @if ($errors->has('user_name'))
                                        <div class="alert alert-danger">{{ $errors->first('user_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="user_email" class="control-label mb-1">User Email</label>
                                    <input name="user_email" type="email" class="form-control"
                                           value="{{ $user-> user_email }}">
                                    @if ($errors->has('user_email'))
                                        <div class="alert alert-danger">{{ $errors->first('user_email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="user_password" class="control-label mb-1">User Password</label>
                                    <input name="user_password" type="password" value="{{ $user-> user_password  }}"
                                           class="form-control">
                                    @if ($errors->has('user_password'))
                                        <div class="alert alert-danger">{{ $errors->first('user_password') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="user_image" class="control-label mb-1">User Image</label>
                                    <input name="user_image" type="file" class="form-control">
                                </div>
                                @if ($errors->has('user_image'))
                                    <div class="alert alert-danger">{{ $errors->first('user_image') }}</div>
                                @endif
                                <div>
                                    <button id="payment-button" type="submit" class="btn btn-lg btn-success btn-block"
                                            name="submit">Save
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{--            Form End--}}
        </div>
    </div>
@endsection
