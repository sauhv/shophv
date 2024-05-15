@extends('admin.master')
@section('content')
<div class="card mb-3">
  <div class="card-body">
    <div class="row flex-between-center">
      <div class="col-md">
        <h5 class="mb-2 mb-md-0">Product Listing</h5>
      </div>
      <div class="col-auto"><a href="{{ url('admin/product/create') }}" class="btn btn-primary" role="button">Add product </a></div>
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
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Amount</th>
        <th scope="col">Price</th>
        <th scope="col">Category</th>
        <th scope="col">Model</th>
        <th scope="col">View</th>
        <th scope="col">Hidden</th>
        <th scope="col">Slugn</th>
        <th scope="col">Description</th>
        <th scope="col">Date Create</th>
        <th scope="col">Date Update</th>
        <th class="text-end" scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($products as $product)
      <tr>
        <td>{{$product->id}}</td>
        <td style="width: 50px;">
          <img src="{{ asset('images/product/'.$product->image) }}" alt="{{$product->image}}" width="" class="img-thumbnail">
        </td>
        <td>{{$product->name}}</td>
        <td>{{number_format($product->amount)}}</td>
        <td>{{number_format($product->price)}}</td>
        <td>{{$product->category_name}}</td>
        <td>{{$product->model_name}}</td>
        <td>{{$product->views}}</td>
        <td>{{ ($product->hidden==1) ? 'Public' : 'Private' }}</td>
        <td>{{$product->slug}}</td>
        <td title="{{$product->description}}" style="max-width: 80px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{$product->description}}</td>
        <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d-m-Y H:i:s') }}</td>
        <td>{{ ($product->updated_at==null) ? 'No update' : $product->updated_at }}</td>
        <td class="text-end">
          <div class="dropdown font-sans-serif position-static"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-10"></span></button>
            <div class="dropdown-menu dropdown-menu-end border py-0">
              <div class="py-2"><a class="dropdown-item" href="{{ route('product.edit', $product->id) }}">Edit</a>
              <a class="btn-delete dropdown-item text-danger" href="#" data-url="{{ route('product.destroy', $product->id) }}">Delete</a>
              </div>
            </div>
          </div>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
<div class="category-pagination d-flex justify-content-center mt-3">
  <nav aria-label="Page navigation">
    <ul class="pagination">
      <ul class="pagination">
        <li class="page-item me-2">{{ $products->onEachSide(5)->links() }}</li>
      </ul>
    </ul>
  </nav>
</div>
@endsection