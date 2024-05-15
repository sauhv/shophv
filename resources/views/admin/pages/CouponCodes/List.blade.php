@extends('admin.master')
@section('content')
<div class="card mb-3">
  <div class="card-body">
    <div class="row flex-between-center">
      <div class="col-md">
        <h5 class="mb-2 mb-md-0">Coupon Code Listing</h5>
      </div>
      <div class="col-auto"><a href="{{ url('admin/coupon_code/create') }}" class="btn btn-primary" role="button">Add Coupon Code </a></div>
    </div>
  </div>
</div>
<div class="card mb-3">
  <div class="card-body">
    <div class="row flex-between-center">
      <div class="col-sm-auto mb-2 mb-sm-0">
        <h6 class="mb-0">Showing 1-24 of 205 Products</h6>
      </div>
      <div class="col-sm-auto">
        <div class="row gx-2 align-items-center">
          <div class="col-auto">
            <form class="row gx-2">
              <div class="col-auto"><small>Sort by: </small></div>
              <div class="col-auto"><select class="form-select form-select-sm" aria-label="Bulk actions">
                  <option selected="">Default</option>
                  <option value="Hot">Hot</option>
                  <option value="Refund">Newest</option>
                  <option value="Delete">Price</option>
                </select></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="table-responsive scrollbar">
  <table class="table table-striped overflow-hidden">
    <thead>
      <tr class=" table-dark">
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Code</th>
        <th scope="col">Type</th>
        <th scope="col">Percent Amount</th>
        <th scope="col">Expire Date</th>
        <th scope="col">Status</th>
        <th scope="col">Date Create</th>
        <th scope="col">Date Update</th>
        <th class="text-end" scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @if(!$coupon_codes->isEmpty())
      @foreach ($coupon_codes as $coupon)
      <tr>
        <td>{{$coupon->id}}</td>
        <td>{{$coupon->name}}</td>
        <td>{{$coupon->code}}</td>
        <td>{{$coupon->type}}</td>
        <td>{{$coupon->percent_amount}}</td>
        <td>{{$coupon->expire_date}}</td>
        <td>{{$coupon->status}}</td>
        <td>{{$coupon->created_at}}</td>
        <td>{{$coupon->updated_at}}</td>
        <td class="text-end">
          <div class="dropdown font-sans-serif position-static"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-10"></span></button>
            <div class="dropdown-menu dropdown-menu-end border py-0">
              <div class="py-2">
                <a class="dropdown-item" href="{{ route('coupon_code.edit',$coupon->id) }}">Edit</a>
                <a class="btn-delete dropdown-item text-danger" href="#" data-url="{{ route('coupon_code.destroy', $coupon->id) }}">Delete</a>
              </div>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
      @else
      <tr>
        <td>Không có coupon nào</td>
      </tr>
      @endif
    </tbody>
  </table>
</div>
@endsection