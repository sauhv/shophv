<div class="header-content-all w-100" style="background: #515154;">
    <div class="header-lower container d-flex justify-content-between align-items-center">
        <div class="header-logo d-ms-none d-lg-block d-sm-none">
            <a href="{{url('/')}}">
                <img class="object-fit-cover" src="{{ asset('images/uploaded/logo/0012445_Logo_ShopDunk.png')}}" width="173px" alt="">
            </a>
        </div>
        <!-- Nav -->
        <div class="navbar navbar-expand-lg p-0">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <!-- <ul class="navbar-nav" id="categoryList">
                        </ul> -->
                        @foreach ($categories as $cate )
                            <li class="nav-item">
                                <a class="nav-link px-3 py-4 text-light" href="{{ url('product/'.$cate->id) }}">{{$cate->category_name}}</a>
                            </li>
                        @endforeach
                        <li>

                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link px-3 py-4 text-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Dịch vụ
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class=" dropdown-item" href="{{url('/contact')}}">Liên hệ</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Tra cứu thần số học</a></li>
                                <li><a class="dropdown-item" href="#">Thu mới đổ cũ</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link px-3 py-4 text-light dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                Tin tức
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('news') }}">News</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 py-4 text-light" href="#!sale">Khuyến mãi</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End nav -->
        <div class="header-links-wrapper text-light d-flex align-items-center">
            <div class="search-icon px-2 py-3">
                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="nav-link p-0"><i class="fs-5 fa-thin fa-magnifying-glass"></i></button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog mt-0">
                        <div class="modal-content border-0" style="background: none;">
                            <div class="p-3 w-100">
                                <form action="{{ url('search')}}" method="get">
                                    <div class="form-group w-50 m-auto">
                                        <input class="form-control" type="text" name="keyword" list="keyword" placeholder="Tìm kiếm..." required>
                                        <datalist id="keyword">
                                            <option value="IPhone">IPhone</option>
                                            <option value="Watch">Watch</option>
                                            <option value="IPad">IPad</option>
                                            <option value="Mac">Mac</option>
                                            <option value="AriPos">AriPos</option>
                                        </datalist>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cart-icon position-relative px-2 py-3">
                <a class="nav-link" href="{{url('/cart')}}">
                    <i class="fs-5 fa-thin fa-bag-shopping"></i>
                    <!-- <span class="position-absolute bottom-0 start-100 translate-middle badge text-bg-light fw-light rounded-circle">
                        2
                    </span> -->
                </a>
            </div>
            <div class="user-icon px-2 py-3">
                @if (empty(\Auth::check()))
                <a class="nav-link" href="{{url('/login')}}"><i class="fs-5 fa-thin fa-user"></i></a>
                @else
                <div class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('images/avatar/admin.png')}}" width="30px">
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Chào Admin!</a></li>
                        <li><a class="dropdown-item" href="{{ route('user.change_password') }}"><i class="fa-solid fa-key"></i> Đổi mật khẩu</a></li>
                        <li><a class="dropdown-item" href="{{ url('orders') }}"><i class="fa-solid fa-cart-circle-check"></i> Đơn hàng</a></li>
                        <li><a class="dropdown-item" href="{{ url('logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                    </ul>
                </div>
                @endif
            </div>
            <div class="languague-flag px-2 py-3">
                <a href="#"><img src="{{ asset('images/uploaded/logo/vn.png')}}" alt="flags"></a>
            </div>
        </div>
    </div>
</div>