@extends('admin.master')
@section('content')
<div class="card mb-3">
  <div class="card-body">
    <div class="row flex-between-center">
      <div class="col-md">
        <h5 class="mb-2 mb-md-0">User Listing</h5>
      </div>
      <div class="col-auto"><a href="{{ url('admin/user/create') }}" class="btn btn-primary" role="button">Add User </a></div>
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
        <th scope="col">Avatar</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Role</th>
        <th class="text-end" scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($users as $user)
      <tr>
        <td>{{ $user->id }}</td>
        <td ><img src="{{ asset('images/avatar/'.$user->image) }}" width="45px" alt="avatar"></td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td style="max-width: 80px; overflow: hidden; white-space: nowrap; text-overflow: ellipsis;">{{ $user->password }}</td>
        <td>{{ $user->phone_number }}</td>
        <td>{{ $user->role==1?'Admin' : 'User' }}</td>
        <td class="text-end">
          <div class="dropdown font-sans-serif position-static"><button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal" type="button" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false"><span class="fas fa-ellipsis-h fs-10"></span></button>
            <div class="dropdown-menu dropdown-menu-end border py-0">
              <div class="py-2">
                <a class="dropdown-item" href="{{ route('user.edit', $user->id) }}">Edit</a>
                <a class="btn-delete dropdown-item text-danger" data-url="{{ route('user.destroy', $user->id) }}">Delete</a>
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
        <li class="page-item me-2">{{ $users->onEachSide(5)->links() }}</li>
      </ul>
    </ul>
  </nav>
</div>
@endsection