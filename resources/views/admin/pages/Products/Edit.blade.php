@extends('admin.master')
@section('content')
<form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <a href="{{ url('admin/product/')}}" class="mb-2 mb-md-0"> <i class="nav-link-icon fa-solid fa-arrow-left"></i> Back to Product Listing</a>
                </div>
                <div class="col-auto"><button class="btn btn-primary" role="button">Update product </button></div>
            </div>
        </div>
    </div>
    <div class="col-lg pe-lg-2">
        <div class="card mb-3">
            <div class="card-header bg-body-tertiary">
                <h6 class="mb-0">Update a product</h6>
            </div>
            <div class="card-body">
                <div class="row gx-2">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="name">Product Name: </label>
                        <input class="form-control" id="name" type="text" name="name" value="{{$product->name, old('name') }}">
                        @error('name')
                            <span class="alert_error_message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="slugn">Slugn: </label>
                        <input class="form-control" id="slugn" type="text" name="slug" value="{{$product->slug }}">
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="amount">Amount: </label>
                        <input class="form-control" id="amount" type="text" name="amount" value="{{ $product->amount, old('amount') }}">
                        @error('amount')
                            <span class="alert_error_message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="new-price">Price: </label>
                        <input class="form-control" id="new-price" type="text" name="price" value="{{ $product->price, old('price')  }}">
                        @error('price')
                            <span class="alert_error_message">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label class="form-label" for="category">Category: </label>
                        <select class="form-select" id="category" name="category_id">
                            @foreach ($category_list as $item)
                            <option value="{{ $item->id }}" {{$product->category_id==$item->id?'selected':''}}>{{$item->category_name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-sm-6 mb-3">
                        <label class="form-label" for="model_id">Model: </label>
                        <select class="form-select" id="model_id" name="model_id">
                            @foreach ($model_list as $item)
                            <option value="{{$item->id}}" {{$product->model_id==$item->id?'selected':''}}>{{$item->model_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Hidden: </label>
                        <div class="radio-select">
                            <input class="form-check-input" id="show" type="radio" value="1" name="hidden" {{$product->hidden==1?'checked':''}}>
                            <label class="form-check-label me-4" for="show">Public</label>
                            <input class="form-check-input" id="Hidden" type="radio" value="0" name="hidden" {{$product->hidden==0?'checked':''}}>
                            <label class="form-check-label" for="Hidden">Private</label>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label">Hot: </label>
                        <div class="radio-select">
                            <input class="form-check-input" id="normal" type="radio" value="0" name="hot" {{$product->hot==0?'checked':''}}>
                            <label class="form-check-label  me-4" for="normal">Normal</label>

                            <input class="form-check-input" id="hot" type="radio" value="1" name="hot" {{$product->hot==1?'checked':''}}>
                            <label class="form-check-label" for="hot">Hot</label>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="image">Images: </label>
                        <input class="form-control" id="image" type="file" name="image">
                        <input type="hidden" value="{{ $product->image }}" name="old_image">
                        <img width="50px" src="{{ asset('images/product/'.$product->image) }}"></img>
                    </div>
                    <div class="col-6 mb-3">
                        <label class="form-label" for="thumb">Images Thumnails: </label>
                        <input class="form-control" id="thumb" type="file" name="thumbnails[]" accept="image/*" multiple>
                        <input type="hidden" value="{{ $product->thumbnails }}" name="old_thumbnails">
                        @if(isset($thumb))
                            @foreach ($thumb as $thum)
                            <img width="50px" src="{{ asset('images/gallery/'.$thum) }}"></img>
                            @endforeach
                        @endif

                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="editor">Description: </label>
                        <textarea name="description" id="editor">{!!$product->description!!}</textarea>
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
                <div class="col-auto">
                    <button type="reset" class="btn btn-link text-secondary p-0 me-3 fw-medium"   role="button">Discard</button>
                    <button class="btn btn-primary" role="button">Update product </button>
                </div>
            </div>
        </div>
    </div>
</form>


@endsection