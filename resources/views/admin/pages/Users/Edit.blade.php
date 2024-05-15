@extends('admin.master')
@section('content')

<form action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0"><a href="{{ route('user.index') }}"><i class="fa-solid fa-arrow-left"></i> Return User Listing!</a></h5>
                </div>
                <div class="col-auto"><button class="btn btn-primary" role="button">Update user </button></div>
            </div>
        </div>
    </div>
    <div class="col-lg pe-lg-2">
        <div class="card mb-3">
            <div class="card-header bg-body-tertiary">
                <h6 class="mb-0">Update a user</h6>
            </div>
            <div class="card-body">
                <div class="row gx-2">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="name">Fullname:  </label>
                        <input class="form-control" id="name" type="text" name="name" value="{{ $user->name }}">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="email">Email: </label>
                        <input class="form-control" id="email" type="email" name="email" value="{{ $user->email }}">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="phone_number">Phone Number: </label>
                        <input class="form-control" id="phone_number" type="tel" name="phone_number" value="{{ $user->phone_number }}">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Role: </label>
                        <div class="radio-select">
                            <input class="form-check-input" id="admin" type="radio" value="1" name="role" {{ $user->role==1?'checked':'' }}>
                            <label class="form-check-label me-4" for="admin">Admin</label>
                            <input class="form-check-input" id="user" type="radio" value="0" name="role" {{ $user->role==0?'checked':'' }}>
                            <label class="form-check-label" for="user">User</label>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="image">Images: </label>
                        <input class="form-control" id="image" type="file" name="image" accept="image/*">
                        <span><img src="{{ asset('images/avatar/'. $user->image)}}" width="50px"></span>
                        <input type="hidden" value="{{ $user->image }}" name="image_old">
                        <input type="hidden" value="{{ $user->password }}" name="password">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">You're almost done!</h5>
                </div>
                <div class="col-auto"><button class="btn btn-link text-secondary p-0 me-3 fw-medium" type="reset" role="button">Discard</button><button class="btn btn-primary" role="button">Update user </button></div>
            </div>
        </div>
    </div>
</form>
@endsection