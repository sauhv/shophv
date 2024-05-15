@extends('admin.master')
@section('content')

<form action="{{ route('coupon_code.update', $coupon->id) }}" method="post">
    @csrf @method('PUT')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0"><a href="#"><i class="fa-solid fa-arrow-left"></i> Return Coupon Code Listing!</a></h5>
                </div>
                <div class="col-auto"><button class="btn btn-primary" role="button">Add Coupon Code </button></div>
            </div>
        </div>
    </div>
    <div class="col-lg pe-lg-2">
        <div class="card mb-3">
            <div class="card-header bg-body-tertiary">
                <h6 class="mb-0">Add a Coupon code</h6>
            </div>
            <div class="card-body">
                <div class="row gx-2">
                    <div class="col-6 mb-3">
                        <label class="form-label" for="name">Coupon Code Name: </label>
                        <input class="form-control" id="name" type="text" name="name" value="{{$coupon->name}}">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="code">Coupon Code: </label>
                        <input class="form-control" id="code" type="text" name="code" placeholder="Coupon Code" value="{{$coupon->code}}">
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label class="form-label" for="type">Type: </label>
                        <select class="form-select" id="type" name="type">
                            <option {{ $coupon->type=='Amount' ? 'selected' : '' }} value="amount">Amount</option>
                            <option {{ $coupon->type=='Percent' ? 'selected' : '' }} value="Percent">Percent</option>
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="percent_amount">Percent / Amount: </label>
                        <input class="form-control" id="percent_amount" type="text" name="percent_amount" placeholder="Percent / Amount" value="{{$coupon->percent_amount}}">
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="Expire_date">Expire Date: </label>
                        <input class="form-control" id="Expire_date" type="date" name="expire_date" value="{{$coupon->expire_date}}">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Status: </label>
                        <div class="radio-select">
                            <input class="form-check-input" id="active" type="radio" value="1" name="status" {{ $coupon->status==1 ? 'checked' : '' }}>
                            <label class="form-check-label me-4" for="active">Active</label>
                            <input class="form-check-input" id="inactive" type="radio" value="0" name="status" {{ $coupon->status==0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="inactive">Inactive</label>
                        </div>
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
                <div class="col-auto"><button class="btn btn-link text-secondary p-0 me-3 fw-medium" type="reset" role="button">Discard</button><button class="btn btn-primary" role="button">Update Coupon Code </button></div>
            </div>
        </div>
    </div>
</form>
@endsection