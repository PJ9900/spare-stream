<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="" />
    <meta name="author" content="DexignZone" />
    <meta name="robots" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Bookland-Book Store Ecommerce Website" />
    <meta property="og:title" content="Bookland-Book Store Ecommerce Website" />
    <meta property="og:description" content="Bookland-Book Store Ecommerce Website" />
    <meta property="og:image" content="../../makaanlelo.com/tf_products_007/bookland/xhtml/social-image#" />
    <meta name="format-detection" content="telephone=no">

    <!-- FAVICONS ICON -->
    <link rel="icon" type="image/x-icon" href="images/favicon.png" />

    <!-- PAGE TITLE HERE -->
    <title>Sparestream</title>

    <!-- MOBILE SPECIFIC -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- STYLESHEETS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('client/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/icons/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/vendor/animate/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('client/css/style.css') }}">


    <!-- GOOGLE FONTS-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Oswald:wght@200..700&family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

</head>

<body>

    <div class="page-wraper">

        <!-- Header -->
        <header class="site-header mo-left header style-1">
            <!-- Main Header -->
            <div class="header-info-bar">
                <div class="container-fluid clearfix" style="padding: 0;">
                    <!-- Website Logo -->
                    <div class="logo-header logo-dark">
                        <a href="{{ route('index') }}"><img src="{{ asset('client/img/logo/updated-logo.png') }}"
                                alt="logo"></a>
                    </div>

                    <!-- EXTRA NAV -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <ul class="navbar-nav header-right" style="height: 50px;">

                                <li class="nav-item dropdown profile-dropdown  ms-4">
                                    <a class="nav-link" href="javascript:void(0);" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="flaticon-user"></i>
                                        <div class="profile-info">
                                            <h6 class="title">My Account</h6>
                                            <!-- <span>info@gmail.com</span> -->
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end" style="width: 200px;">

                                        @if (!Auth::check())
                                            <div class="dropdown-body">
                                                <a href="#"
                                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div>
                                                        <span class="ms-2">My Orders</span>
                                                    </div>
                                                </a>
                                                <a href="#"
                                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div>
                                                        <span class="ms-2">Replacement Request</span>
                                                    </div>
                                                </a>

                                                <a style="margin-bottom: 10px; " href="{{ route('support') }}"
                                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div><span class="ms-2">Sparestream Support</span>
                                                    </div>
                                                </a>

                                                <a
                                                    class="dropdown-item bg-light d-flex justify-content-between align-items-center ai-icon">
                                                    <div>

                                                        <span class="ms-2 mb-2">Track my order(s)</span><br>
                                                        <input class="ms-2 mb-2 w-100" style="margin-top: 10px;"
                                                            type="text" placeholder="Order Id/Email">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="dropdown-footer">
                                                <a class="btn btn-primary w-100 btnhover btn-sm"
                                                    href="{{ route('login') }}">Sign In</a>
                                            </div>
                                            <div class="dropdown-footer">
                                                <a class="btn btn-primary w-100 btnhover btn-sm"
                                                    href="{{ route('register') }}">Register</a>
                                            </div>
                                        @elseif(Auth::user()->role_as == 'admin')
                                            <div class="dropdown-body">
                                                <a href="#"
                                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div>
                                                        <span class="ms-2">My Orders</span>
                                                    </div>
                                                </a>
                                                <a href="#"
                                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div>
                                                        <span class="ms-2">Replacement Request</span>
                                                    </div>
                                                </a>

                                                <a style="margin-bottom: 10px; " href="{{ route('support') }}"
                                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div><span class="ms-2">Sparestream Support</span>
                                                    </div>
                                                </a>

                                                <a
                                                    class="dropdown-item bg-light d-flex justify-content-between align-items-center ai-icon">
                                                    <div>

                                                        <span class="ms-2 mb-2">Track my order(s)</span><br>
                                                        <input class="ms-2 mb-2 w-100" style="margin-top: 10px;"
                                                            type="text" placeholder="Order Id/Email">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="dropdown-footer">
                                                <a class="btn btn-primary w-100 btnhover btn-sm"
                                                    href="{{ route('admin.index') }}">Admin</a>
                                            </div>
                                            <form action="{{ route('logout') }}" method="POST"
                                                class="dropdown-footer">
                                                @csrf
                                                <button type="submit" class="btn btn-primary w-100 btnhover btn-sm">
                                                    Logout
                                                </button>
                                            </form>
                                        @else
                                            <div class="dropdown-body">
                                                <a href="#"
                                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div>
                                                        <span
                                                            class="ms-2">{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</span>
                                                    </div>
                                                </a>
                                                <a href="{{ route('profile.details') }}"
                                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div>
                                                        <span class="ms-2">Profile details</span>
                                                    </div>
                                                </a>
                                                <a href="#"
                                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div>
                                                        <span class="ms-2">e-wallet(0)</span>
                                                    </div>
                                                </a>
                                                <a href="#"
                                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div>
                                                        <span class="ms-2">My Orders</span>
                                                    </div>
                                                </a>
                                                <a href="#"
                                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div>
                                                        <span class="ms-2">Replacement Request</span>
                                                    </div>
                                                </a>

                                                <a style="margin-bottom: 10px; " href="{{ route('support') }}"
                                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div><span class="ms-2">Sparestream Support</span>
                                                    </div>
                                                </a>

                                                <a
                                                    class="dropdown-item bg-light d-flex justify-content-between align-items-center ai-icon">
                                                    <div>

                                                        <span class="ms-2 mb-2">Track my order(s)</span><br>
                                                        <input class="ms-2 mb-2 w-100" style="margin-top: 10px;"
                                                            type="text" placeholder="Order Id/Email">
                                                    </div>
                                                </a>
                                            </div>
                                            <form action="{{ route('logout') }}" method="POST"
                                                class="dropdown-footer">
                                                @csrf
                                                <button type="submit" class="btn btn-primary w-100 btnhover btn-sm">
                                                    Logout
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- header search nav -->
                    <div class="header-search-nav">
                        <form class="header-item-search">
                            <div class="input-group search-input">
                                <select class="default-select select" style="width: 150px;">
                                    <option value="">All Categories</option>
                                    @if ($categories->isNotEmpty())
                                        @php print_r($categories); @endphp
                                        @foreach ($categories as $category)
                                            <optgroup label="{{ $category->name }}">
                                                @foreach ($category->subcategories as $subcategory)
                                                    <option
                                                        value="{{ route('category.detail', ['slug' => $subcategory->slug]) }}">
                                                        {{ $subcategory->name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    @else
                                        <option value="">No categories available</option>
                                    @endif

                                </select>


                                <input type="text" aria-label="Text input with dropdown button"
                                    placeholder="Search Products By Keywords" style="width: 51%;">
                                <button class="btn" type="button"
                                    style=
								"border-left: 0px solid !important"><i
                                        class="flaticon-loupe"></i></button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>

            <!-- Main Header End -->

            <!-- Main Header -->
            <div class="sticky-header main-bar-wraper navbar-expand-lg">
                <div class="main-bar clearfix">
                    <div class="container-fluid clearfix fix-head" style="background: transparent; padding: 0;">
                        <!-- Website Logo -->
                        <div class="logo-header logo-dark">
                            <a href="{{ route('index') }}"><img
                                    src="{{ asset('client/img/logo/updated-logo.png') }}" alt="logo"></a>
                        </div>

                        <!-- Nav Toggle Button -->
                        <a href="" class="navbar-toggler collapsed navicon justify-content-end">
                            <i class="fa fa-search" aria-hidden="true" style="color: #000; margin-top: 13px;"></i>
                        </a>

                        <a class="nav-link d-block d-sm-block d-md-none d-lg-none" href="javascript:void(0);"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="flaticon-user" style="color: #000; float: right; margin-top: 7px;"></i>
                            <div class="profile-info">
                                <h6 class="title"></h6>
                            </div>
                        </a>
                        <div class="dropdown-menu mob-ord-menu dropdown-menu-end">
                            <div class="dropdown-body">
                                <a href="#"
                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                    <div><span>My Orders</span></div>
                                </a>
                                <a href="#"
                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                    <div><span>Replacement Request</span></div>
                                </a>
                                <a href="#"
                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                    <div><span>Sparestream Support</span></div>
                                </a>
                                <a href="#"
                                    class="dropdown-item d-flex justify-content-between align-items-center ai-icon"
                                    style="margin-top: 10px;">
                                    <div class="w-100">
                                        <span class="mb-2">Track my order(s)</span><br>
                                        <input type="text" class="w-100" placeholder="Order Id/Email">
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-footer">
                                <a class="btn btn-primary w-100 btnhover btn-sm" href="login.php">Sign In</a>
                            </div>
                            <div class="dropdown-footer">
                                <a class="btn btn-primary w-100 btnhover btn-sm" href="signup.php">Register</a>
                            </div>
                        </div>

                        <a class="nav-link d-block d-sm-block d-md-none d-lg-none" href="javascript:void(0);"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="profile-info text-white" style="margin-top: -20px;">
                                <svg xmlns="http://www.w3.org/2000/svg" height="15px" viewBox="0 0 24 24"
                                    width="15px" fill="#000">
                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                    <path
                                        d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
                                </svg>
                            </div>
                        </a>
                        <div class="dropdown-menu det-mob dropdown-menu-end">
                            {{-- <div class="dropdown-body cart-list">
                                <a href="#" style="width:330px;"
                                    class="cart-item dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                    <div>
                                        <div class="row">
                                            <div class="col-2">
                                                <img
                                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/40/40/detailed/6118/replacement_front_glass_for_vivo_v23_problack_by_maxbhi_com_44331.jpg?t=1731832193">
                                            </div>
                                            <div class="col-8 p-0">
                                                <h6>Front Glass for Vivo V23 Pro - Black</h6>
                                                <p>1 x 489.00 Rs.</p>
                                            </div>
                                            <div class="col-2">
                                                &nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <a href="#" style="width:330px;"
                                    class="cart-item dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                    <div>
                                        <div class="row">
                                            <div class="col-2">
                                                <img
                                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/40/40/detailed/6118/replacement_front_glass_for_vivo_v23_problack_by_maxbhi_com_44331.jpg?t=1731832193">
                                            </div>
                                            <div class="col-8 p-0">
                                                <h6>Front Glass for Vivo V23 Pro - Black</h6>
                                                <p>1 x 489.00 Rs.</p>
                                            </div>
                                            <div class="col-2">
                                                &nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true"></i>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div> --}}
                            <div class="dropdown-footer" style="padding-top: 10px;">
                                <div class="row">
                                    <div class="col-5">
                                        <a class="btn btn-primary w-100 btnhover btn-sm" style="margin-left: 20px;"
                                            href="{{ route('show.cart') }}">View Cart</a>
                                    </div>

                                    <div class="col-5">
                                        <a class="btn btn-primary w-100 btnhover btn-sm" style="margin-right: 20px;"
                                            href="{{ route('cart.checkout', ['token' => 'null']) }}">Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Desktop View -->
                        <div class="extra-nav d-none d-md-block d-lg-block">
                            <div class="extra-cell">
                                <ul class="navbar-nav header-right" style="height: 40px;">
                                    <!-- Cart Dropdown (Desktop) -->
                                    <li class="nav-item dropdown profile-dropdown ms-4">
                                        <a class="nav-link" href="javascript:void(0);" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <div class="profile-info text-white">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                    viewBox="0 0 24 24" width="24px" fill="#fff">
                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                    <path
                                                        d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
                                                </svg>
                                                <span style="color: #fff;">Cart</span>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <div class="dropdown-body cart-list">
                                                {{-- <a href="#"
                                                    class="cart-item dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <img
                                                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/40/40/detailed/6118/replacement_front_glass_for_vivo_v23_problack_by_maxbhi_com_44331.jpg?t=1731832193">
                                                            </div>
                                                            <div class="col-8 p-0">
                                                                <h6>Front Glass for Vivo V23 Pro - Black</h6>
                                                                <p>1 x 489.00 Rs.</p>
                                                            </div>
                                                            <div class="col-2">
                                                                &nbsp;&nbsp;<i class="fa fa-times"
                                                                    aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <a href="#"
                                                    class="cart-item dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                                    <div>
                                                        <div class="row">
                                                            <div class="col-2">
                                                                <img
                                                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/40/40/detailed/6118/replacement_front_glass_for_vivo_v23_problack_by_maxbhi_com_44331.jpg?t=1731832193">
                                                            </div>
                                                            <div class="col-8 p-0">
                                                                <h6>Front Glass for Vivo V23 Pro - Black</h6>
                                                                <p>1 x 489.00 Rs.</p>
                                                            </div>
                                                            <div class="col-2">
                                                                &nbsp;&nbsp;<i class="fa fa-times"
                                                                    aria-hidden="true"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a> --}}
                                            </div>
                                            <div class="dropdown-footer" style="padding-top: 10px;">
                                                <div class="row">
                                                    <div class="col-5">
                                                        <a class="btn btn-primary w-100 btnhover btn-sm"
                                                            href="{{ route('show.cart') }}">View Cart</a>
                                                    </div>
                                                    <div class="col-2"></div>
                                                    <div class="col-5">
                                                        <a class="btn btn-primary w-100 btnhover btn-sm"
                                                            href="{{ route('cart.checkout', ['token' => 'null']) }}">Checkout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <!-- Main Nav -->
                        <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                            <div class="logo-header logo-dark">
                                <a href="#"><img src="{{ asset('client/img/logo/updated-logo.png') }}"
                                        alt=""></a>
                            </div>
                            <form class="search-input">
                                <div class="input-group">
                                    <input type="text" class="form-control" style="background-color: #efeceb;"
                                        aria-label="Text input with dropdown button" placeholder="Search Books Here">
                                    <button class="btn" type="button"><i class="flaticon-loupe"></i></button>
                                </div>
                            </form>
                            <ul class="nav navbar-nav">
                                {{-- <li class="sub-menu-down">
									<!-- Display the category name -->
									<a href="javascript:void(0);"><span>All Products</span></a>
									<ul class="sub-menu">
											<!-- Display each subcategory name and link -->
											<li><a href="{{ route('all.products') }}">All Products</a></li>
									</ul>
								</li> --}}
                                @foreach ($categories as $category)
                                    <li class="sub-menu-down">
                                        <!-- Display the category name -->
                                        <a href="javascript:void(0);"><span>{{ $category->name }}</span></a>

                                        <ul class="sub-menu">
                                            @foreach ($category->subcategories as $item)
                                                <!-- Display each subcategory name and link -->
                                                <li><a
                                                        href="{{ route('category.detail', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Main Header End -->

        </header>
