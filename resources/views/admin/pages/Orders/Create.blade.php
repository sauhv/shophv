@extends('admin.master')
@section('content')

<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0"><a href="#"><i class="fa-solid fa-arrow-left"></i> Return Product Listing!</a></h5>
                </div>
                <div class="col-auto"><button class="btn btn-primary" role="button">Add product </button></div>
            </div>
        </div>
    </div>
    <div class="col-lg pe-lg-2">
        <div class="card mb-3">
            <div class="card-header bg-body-tertiary">
                <h6 class="mb-0">Add a product</h6>
            </div>
            <div class="card-body">
                <div class="row gx-2">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="name">Product Name: </label>
                        <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}">
                        @error('name')
                            <code>* {{ $message }}</code>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="slugn">Slugn: </label>
                        <input class="form-control" id="slugn" type="text" name="slugn">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="amount">Amount: </label>
                        <input class="form-control" id="amount" type="text" name="amount" value="{{ old('amount') }}">
                        @error('amount')
                            <code>* {{ $message }}</code>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="new-price">Price: </label>
                        <input class="form-control" id="new-price" type="text" name="price" value="{{ old('price') }}">
                        @error('price')
                            <code>* {{ $message }}</code>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label class="form-label" for="category">Category: </label>
                        <select class="form-select" id="category" name="category_id">
                            @foreach ($category_list as $item)
                            <option value="{{$item->id}}">{{$item->category_name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label class="form-label" for="model_id">Model: </label>
                        <select class="form-select" id="model_id" name="model_id">
                            @foreach ($model_list as $item)
                            <option value="{{$item->id}}">{{$item->model_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Hidden: </label>
                        <div class="radio-select">
                            <input class="form-check-input" id="show" type="radio" value="1" name="hidden" checked>
                            <label class="form-check-label me-4" for="show">Public</label>
                            <input class="form-check-input" id="Hidden" type="radio" value="0" name="hidden">
                            <label class="form-check-label" for="Hidden">Private</label>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Hot: </label>
                        <div class="radio-select">
                            <input class="form-check-input" id="normal" type="radio" value="0" name="hot" checked>
                            <label class="form-check-label  me-4" for="normal">Normal</label>
                            <input class="form-check-input" id="hot" type="radio" value="1" name="hot">
                            <label class="form-check-label" for="hot">Hot</label>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="image">Images: </label>
                        <input class="form-control" id="image" type="file" name="image" accept="image/*" value="{{ old('image') }}">
                        @error('image')
                            <code>* {{ $message }}</code>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="image">Images Thumnails: </label>
                        <input class="form-control" id="image" type="file" name="thumbnails[]" accept="image/*" multiple value="{{ old('thumbnails') }}">
                        @error('thumbnails')
                            <code>* {{ $message }}</code>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="description">Description: </label>
                        <textarea id="editor" name="description" value="{{ old('description') }}"></textarea>
                        @error('description')
                            <code>* {{ $message }}</code>
                        @enderror
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
                <div class="col-auto"><button class="btn btn-link text-secondary p-0 me-3 fw-medium" type="reset" role="button">Discard</button><button class="btn btn-primary" role="button">Add product </button></div>
            </div>
        </div>
    </div>
</form>
@endsection