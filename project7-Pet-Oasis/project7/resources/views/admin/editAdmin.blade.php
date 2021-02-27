@extends('admin.layout.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content">
            {{--            Form Start--}}
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-header">Manage Admin</div>
                        <div class="card-body">
                            <div class="card-title">
                                <h3 class="text-center title-2">Create Admin</h3>
                            </div>
                            <hr>
                            <form action="{{ route('adminside.update', $admin->user_id) }}" method="post"
                                  enctype="multipart/form-data">
                                @method('PATCH')
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="admin_name" class="control-label mb-1">Admin Name</label>
                                    <input name="admin_name" type="text" class="form-control"
                                           value="{{ $admin-> user_name }}">
                                    @if ($errors->has('admin_name'))
                                        <div class="alert alert-danger">{{ $errors->first('admin_name') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="admin_email" class="control-label mb-1">Admin Email</label>
                                    <input name="admin_email" type="email" class="form-control"
                                           value="{{ $admin-> user_email }}">
                                    @if ($errors->has('admin_email'))
                                        <div class="alert alert-danger">{{ $errors->first('admin_email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="admin_password" class="control-label mb-1">Admin Password</label>
                                    <input name="admin_password" type="password" value="{{ $admin-> user_password  }}"
                                           class="form-control">
                                    @if ($errors->has('admin_password'))
                                        <div class="alert alert-danger">{{ $errors->first('admin_password') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="admin_image" class="control-label mb-1">Admin Image</label>
                                    <input name="admin_image" type="file" class="form-control">
                                </div>
                                @if ($errors->has('admin_image'))
                                    <div class="alert alert-danger">{{ $errors->first('admin_image') }}</div>
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
