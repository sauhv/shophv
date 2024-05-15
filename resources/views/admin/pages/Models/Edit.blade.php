@extends('admin.master')
@section('content')
<form action="{{ route('model.update', $model->id) }}" method="post">
    @csrf @method('PUT')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">You're almost done!</h5>
                </div>
                <div class="col-auto"><button class="btn btn-link text-secondary p-0 me-3 fw-medium" role="button">Discard</button><button class="btn btn-primary" role="button">Update model </button></div>
            </div>
        </div>
    </div>
    <div class="col-lg pe-lg-2">
        <div class="card mb-3">
            <div class="card-header bg-body-tertiary">
                <h6 class="mb-0">Update a model</h6>
            </div>
            <div class="card-body">
                <div class="row gx-2">
                    <div class="col-6 mb-3">
                        <label class="form-label" for="model">Model Name: </label>
                        <input class="form-control" id="model" type="text" name="name" value="{{ $model->model_name }}">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="slugn">Slug: </label>
                        <input class="form-control" id="slugn" type="text" name="slug" value="{{ $model->slug }}">
                    </div>
                    <div class="col-sm-12 mb-3">
                        <label class="form-label" for="category">Category: </label>
                        <select class="form-select" id="category" name="category_id">
                            @foreach ($category_list as $item)
                            <option value="{{$item->id}}" {{ $model->category_id == $item->id ? 'selected' : '' }} >{{$item->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection