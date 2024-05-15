<div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <div class="navbar-vertical-content scrollbar">
        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Dashboard</span></div>
            <li class="nav-item">
                <!-- label-->
                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Slidebar</div>
                    <div class="col ps-0">
                        <hr class="mb-0 navbar-vertical-divider" />
                    </div>
                </div>
                <!-- parent pages-->
                <a class="nav-link dropdown-indicator" href="#category" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="category">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><i class="fa-sharp fa-solid fa-layer-group"></i></span><span class="nav-link-text ps-1">Categories</span></div>
                </a>
                <ul class="nav collapse" id="category">
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/category') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Category List</span></div>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/category/create') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create a Category</span></div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-indicator" href="#model" data-bs-toggle="collapse" aria-expanded="true" aria-controls="e-commerce">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Models</span></div>
                        </a>
                        <!-- more inner pages-->
                        <ul class="nav collapse" id="model">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('admin/model') }}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Models list</span></div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('model.create') }}">
                                    <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create model</span></div>
                                </a>
                                <!-- more inner pages-->
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- parent pages-->
                <a class="nav-link dropdown-indicator" href="#product" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="product">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><i class="fa-sharp fa-solid fa-box-open-full"></i></span><span class="nav-link-text ps-1">Products</span></div>
                </a>
                <ul class="nav collapse" id="product">
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/product') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Products List</span></div>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/product/create') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create a Product</span></div>
                        </a>
                    </li>
                </ul>
                <!-- parent pages-->
                <a class="nav-link dropdown-indicator" href="#order" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="order">
                    <div class="d-flex align-items-center"><i class="nav-link-icon fa-solid fa-cart-shopping"></i><span class="nav-link-text ps-1">Orders</span></div>
                </a>
                <ul class="nav collapse" id="order">
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/order') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Orders List</span></div>
                        </a>
                    </li>
                </ul>
                <a class="nav-link dropdown-indicator" href="#user" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="user">
                    <div class="d-flex align-items-center"><i class="nav-link-icon fa-solid fa-user"></i><span class="nav-link-text ps-1">Users</span></div>
                </a>
                <ul class="nav collapse" id="user">
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/user') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">User List</span></div>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/user/create') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create a user</span></div>
                        </a>
                    </li>
                </ul>
                <!-- parent pages-->
                <a class="nav-link dropdown-indicator" href="#couponcode" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="couponcode">
                    <div class="d-flex align-items-center"><i class="nav-link-icon fa-solid fa-tags"></i><span class="nav-link-text ps-1">Coupon Code</span></div>
                </a>
                <ul class="nav collapse" id="couponcode">
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/coupon_code') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Coupon Code List</span></div>
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('admin/coupon_code/create') }}">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create a Coupon</span></div>
                        </a>
                    </li>
                </ul>
                <!-- parent pages-->
            </li>
        </ul>
    </div>
</div>