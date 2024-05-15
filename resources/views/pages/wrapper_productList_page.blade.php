@extends('layout')
@section('content')
<div class="wrapper-category-page container">
  <div class="all_content-category py-4">
    <div class="page-title text-center">
      <h1 class="text-uppercase"></h1>
    </div>
    <div class="category-slider">
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-touch="true">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="2000">
            <img src="{{ asset('images/uploaded/banner/slider/ipadProM1_Home.png')}}" class="d-block w-100 object-fit-cover" height="400px" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('images/uploaded/banner/slider/PC_(2).png')}}" class="d-block w-100 object-fit-cover" height="400px" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ asset('images/uploaded/banner/slider/macprom3pc-Copy-1.png')}}" class="d-block w-100 object-fit-cover" height="400px" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>

    <div class="category-nav py-4 d-flex justify-content-between align-items-center">
      <nav class="navbar navbar-expand overflow-auto col-lg-8">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <!-- <li class="nav-item me-4">
                <a href="{{ url('product-series/')}}" class="nav-link fw-medium text-nowrap active text-primary text-decoration-underline">Tất cả</a>
              </li> -->
              @foreach($models as $model)
              <li class="nav-item me-4" style="cursor: pointer;">
                <a href="{{ url('product-series/'.$model->id) }}" class="nav-link fw-medium text-nowrap">{{ $model->model_name }}</a>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
      </nav>
      <div class="col-lg-2 ms-5">

        <form action="{{ url('search')}}" method="get">
          <input type="text" class="form-control" name="keyword" placeholder="Tìm kiếm">
        </form>

      </div>
      <div class=" col-lg-2 sosanh ms-4">
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Xắp xếp theo
          </button>
          <ul class="dropdown-menu">
            <form action="" method="post">
              <li><button name="abc" value="123" class="btn">Giá tăng dần</button></li>
              <li><button name="abc" value="12" class="btn">Giá giảm dần</button></li>
              <li><button name="abc" value="222" class="btn">Sắp xếp theo tên</button></li>
            </form>
          </ul>
        </div>
      </div>
    </div>

    @yield('product')

    <div class="topic-block mt-4">
      <div class="topic-block-body row justify-content-around">
        <div class="col-lg-5 d-flex bg-body justify-content-center align-items-center px-4">
          <img src="{{ asset('images/thums/Image-Standard.png')}}" width="200px" alt="1">
          <div class="">
            <h4>Tìm IPhone phù hợp với bạn</h4>
            <a class="text-decoration-none" href="#">So sánh các iPhone</a>
          </div>
        </div>
        <div class="col-lg-5 d-flex bg-body justify-content-center align-items-center px-4">
          <img src="{{ asset('images/thums/Image-Standard-1.png')}}" width="200px" alt="1">
          <div class="">
            <h4>Phụ kiện iPhone thường mua kèm</h4>
            <a class="text-decoration-none" href="#">So sánh các iPhone</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection