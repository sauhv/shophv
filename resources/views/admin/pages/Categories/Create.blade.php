@extends('admin.master')
@section('content')
<form action="{{route('category.store')}}" method="post">
    @csrf
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">You're almost done!</h5>
                </div>
                <div class="col-auto"><a href="{{ route('category.index') }}" class="btn btn-primary">Category List</a></div>
            </div>
        </div>
    </div>
    <div class="col-lg pe-lg-2">
        <div class="card mb-3">
            <div class="card-header bg-body-tertiary">
                <h6 class="mb-0">Add a Category</h6>
            </div>
            <div class="card-body">
                <div class="row gx-2">
                    <div class="col-6 mb-3">
                        <label class="form-label" for="category_name">Category Name: </label>
                        <input class="form-control" id="category_name" type="text" name="category_name" required>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="slug">slug: </label>
                        <input class="form-control" id="slug" type="text" name="slug">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="rank">Rank: </label>
                        <input class="form-control" id="rank" type="number" name="rank">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Hidden: </label>
                        <div class="radio-select">
                            <input class="form-check-input" id="show" type="radio" value="1" name="hidden" checked>
                            <label class="form-check-label me-4" for="show">Show</label>
                            <input class="form-check-input" id="Hidden" type="radio" value="0" name="hidden">
                            <label class="form-check-label" for="Hidden">Hidden</label>
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
                    <h5 class="mb-2 mb-md-0">Are You Ready!</h5>
                </div>
                <div class="col-auto"><button type="reset" class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button">Discard</button><button class="btn btn-primary" role="button">Add category </button></div>

            </div>
        </div>
    </div>
</form>

@endsection