@include('admin.header')

<section class="content-header">
    <h1>Dashboard</h1>
</section>

<section class="content">
    <div class="row">

        <!--./col -->
        {{-- <div class="col-lg-3 col-xs-6">
				<!-- small box -->
				<div class="small-box bg-blue">
				  <div class="inner">
					<h3>0</h3>
  
					<p>Today Orders</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-android-menu"></i>
				  </div>
				  
				</div>
			  </div> --}}
        {{-- <div class="col-lg-3 col-xs-6">
               <!--small box -->
              <div class="small-box bg-maroon">
                <div class="inner">
                  <h3>0</h3>

                  <p>Pending Orders</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-clipboard"></i>
                </div>
                
              </div>
            </div> --}}
        <!--./col -->
        {{-- <div class="col-lg-3 col-xs-6">
               <!--small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <h3>0</h3>

                  <p>Completed Orders</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-android-checkbox-outline"></i>
                </div>
               
              </div>
            </div> --}}
        <!--./col -->
        {{-- <div class="col-lg-3 col-xs-6">
               <!--small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <h3>0</h3>

                  <p>Completed Shipping</p>
                </div>
                <div class="icon">
                  <i class="ionicons ion-checkmark-circled"></i>
                </div>
                
              </div>
            </div> --}}
        <!--./col -->

        {{-- <div class="col-lg-3 col-xs-6">
				 <!--small box -->
				<div class="small-box bg-orange">
				  <div class="inner">
					<h3>0</h3>
  
					<p>Pending Shippings</p>
				  </div>
				  <div class="icon">
					<i class="ionicons ion-load-a"></i>
				  </div>
				  
				</div>
			  </div> --}}

        <div class="col-lg-3 col-xs-6">
            <!--small box -->
            <a href="{{ route('customers') }}" class="small-box bg-red">
                <div class="inner">
                    <h3>{{ $customers }}</h3>

                    <p>Active Customers</p>
                </div>
                <div class="icon">
                    <i class="ionicons ion-person-stalker"></i>
                </div>

            </a>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ route('products') }}" class="small-box bg-primary">
                <div class="inner">
                    <h3>{{ $products }}</h3>

                    <p>Products</p>
                </div>
                <div class="icon">
                    <i class="ionicons ion-android-cart"></i>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ route('categories') }}" class="small-box bg-olive">
                <div class="inner">
                    <h3>{{ $categories }}</h3>

                    <p>Top Categories</p>
                </div>
                <div class="icon">
                    <i class="ionicons ion-arrow-up-b"></i>
                </div>

            </a>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ route('subcategories') }}" class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $subcategories }}</h3>
                    <p>Mid Categories</p>
                </div>
                <div class="icon">
                    <i class="ionicons ion-android-menu"></i>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ route('brands') }}" class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $brands }}</h3>
                    <p>Brands</p>
                </div>
                <div class="icon">
                    <i class="ionicons ion-android-cart"></i>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ route('models') }}" class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $models }}</h3>
                    <p>Models</p>
                </div>
                <div class="icon">
                    <i class="ionicons ion-android-menu"></i>
                </div>
            </a>
        </div>

        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <a href="{{ route('models') }}" class="small-box bg-blue">
                <div class="inner">
                    <h3>{{ $model_accessories }}</h3>
                    <p>Model Accessories</p>
                </div>
                <div class="icon">
                    <i class="ionicons ion-android-menu"></i>
                </div>
            </a>
        </div>

        <!-- <div class="col-lg-3 col-xs-6">-->
        <!-- small box -->
        <!--<div class="small-box bg-maroon">-->
        <!--  <div class="inner">-->
        <!--	<h3></h3>-->

        <!--	<p>End Categories</p>-->
        <!--  </div>-->
        <!--  <div class="icon">-->
        <!--	<i class="ionicons ion-arrow-down-b"></i>-->
        <!--  </div>-->

        <!--</div>-->
        <!-- </div>-->

    </div>

</section>

@include('admin.footer')
