<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Spare Stream | Admin Panel </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/datepicker3.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/on-off-switch.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">


</head>

<body class="hold-transition fixed skin-blue sidebar-mini">

    <div class="wrapper">
        <header class="main-header">

            <a href="index.php" class="logo">
                <!-- <img class="logo-lg" src="../assets/images/logo.gif"></span> -->
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <span style="float:left;line-height:50px;color:#fff;padding-left:15px;font-size:18px;">Admin
                    Panel</span>
                <!-- Top Bar ... User Inforamtion .. Login/Log out Area -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav " style="">
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- <img src="../assets/images/user-profile/<?php //echo $_SESSION['user']['photo'];
                                ?>" class="user-image" alt="User Image"> -->
                                <span class="hidden-xs"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-footer"
                                    style="background: whitesmoke;margin-right: 2rem;margin-top: 1rem;color: black;">
                                    {{-- <div>
										<a href="profile-edit.php" class="btn btn-default btn-flat">Edit Profile</a>
									</div> --}}
                                    <div>
                                        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-link">
                                                <i class="far fa-sign-out"></i> Logout
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

            </nav>
        </header>


        <!-- Side Bar to Manage Shop Activities -->
        <aside class="main-sidebar">
            <section class="sidebar">

                <ul class="sidebar-menu">

                    {{-- <li class="treeview ">
			          <a href="index.php">
			            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
			          </a>
			        </li> --}}


                    <li class="treeview ">
                        <a href="{{ route('admin.index') }}">
                            <i class="fa fa-sliders"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="treeview ">
                        <a href="">
                            <i class="fa fa-cogs"></i>
                            <span>Category Settings</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">


                            <li><a href="{{ route('categories') }}"><i class="fa fa-circle-o"></i> Category</a></li>
                            <li><a href="{{ route('subcategories') }}"><i class="fa fa-circle-o"></i> Sub Category</a>
                            </li>
                            {{-- <li><a href="low-category.php"><i class="fa fa-circle-o"></i> Low Level Category</a></li> --}}
                        </ul>
                    </li>

                    <li class="treeview ">
                        <a href="{{ route('products') }}">
                            <i class="fa fa-shopping-bag"></i> <span>Product Management</span>
                        </a>
                    </li>

                    <li class="treeview ">
                        <a href="#">
                            <i class="fa fa-cogs"></i>
                            <span>Color variants</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            {{-- <li><a href=""><i class="fa fa-circle-o"></i>Images</a></li> --}}
                            <li><a href="{{ route('color') }}"><i class="fa fa-circle-o"></i>Color</a></li>

                        </ul>
                    </li>

                    <li class="treeview ">
                        <a href="{{ route('brands') }}">
                            <i class="fa fa-sliders"></i> <span>Brands</span>
                        </a>
                    </li>

                    <li class="treeview ">
                        <a href="{{ route('models') }}">
                            <i class="fa fa-sticky-note"></i> <span>Models</span>
                        </a>
                    </li>

                    <li class="treeview ">
                        <a href="{{ route('customers') }}">
                            <i class="fa fa-sliders"></i> <span>Registered Customer</span>
                        </a>
                    </li>

                    <li class="treeview ">
                        <a href="{{ route('orders') }}">
                            <i class="fa fa-sliders"></i> <span>Order Management</span>
                        </a>
                    </li>

                    <li class="treeview ">
                        <a href="{{ route('submodels') }}">
                            <i class="fa fa-sliders"></i> <span>Submodels Management</span>
                        </a>
                    </li>


                    {{--   <li class="treeview >">
                        <a href="discount.php">
                            <i class="fa fa-sticky-note"></i> <span>Discount Management</span>
                        </a>
                    </li> --}}
                    <!-- <li class="treeview ">
   <a href="slider.php">
   <i class="fa fa-picture-o"></i> <span>Manage Sliders</span>
   </a>
     </li> -->
                    {{-- <li class="treeview ">
			          <a href="banners.php">
			            <i class="fa fa-tasks"></i> <span>Manage Banners</span>
			          </a>
			        </li>
					
			          <li class="treeview ">
			          <a href="blog.php">
			            <i class="fa fa-picture-o"></i> <span>Manage Blogs</span>
			          </a> --}}


                    <!--	        <li class="treeview ">-->
                    <!--  <a href="faq.php">-->
                    <!--    <i class="fa fa-question-circle"></i> <span>FAQ</span>-->
                    <!--  </a>-->
                    <!--</li>-->

                    {{-- <li class="treeview ">
			         <a href="customer.php">
			           <i class="fa fa-user-plus"></i> <span>Registered Customer</span>
			         </a>
			       </li>
			       
			       <li class="treeview ">
			         <a href="customer-review.php">
			           <i class="fa fa-user"></i> <span>Customer Review</span>
			         </a>
			       </li>

			        
			        <li class="treeview ">
			          <a href="meta_tag.php">
			            <i class="fa fa-tasks"></i> <span>Manage Meta</span>
			          </a>
			        </li> --}}

                    {{-- <li class="treeview ">
			          <a href="social-media.php">
			            <i class="fa fa-globe"></i> <span>Social Media</span>
			          </a>
			        </li>
			        
			          <li class="treeview ">
			          <a href="user.php">
			            <i class="fa fa-globe"></i> <span>User Management</span>
			          </a>
			        </li> --}}

                    <!--<li class="treeview ">-->
                    <!-- <a href="subscriber.php">-->
                    <!--   <i class="fa fa-hand-o-right"></i> <span>Subscriber</span>-->
                    <!-- </a>-->
                    </li>

                </ul>
            </section>
        </aside>

        <div class="content-wrapper">
