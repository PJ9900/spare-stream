@include('spare-stream.include.header')
<!-- Header End -->


<div class="page-content bg-grey">
    <section class="content-inner-1 border-bottom">
        <div class="container-fluid breadcrum mb-0">
            <div>
                <ol class="d-flex ">
                    <li>
                        <a href="{{ route('index') }}" style="color: #000;">Home &nbsp; / </a>
                    </li>
                    <li>
                        <a href="#" style="color: #000;">&nbsp; Mobile Accessories &nbsp; / </a>
                    </li>
                    <li>
                        <a href="#"> &nbsp;{{ $sub_name }}</a>
                    </li>
                </ol>
            </div>

        </div>

        <div class="container-fluid">
            <div class="inner-banner">
                <div class="search-box">
                    <form class="d-flex">
                        <input class="me-2" type="search" placeholder="Search your handset model"
                            aria-label="Search">
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="section-head text-center">
                @if ($products->isEmpty())
                @else
                    <h2 class="title">{{ $sub_name }}</h2>
                @endif
            </div>
            <div class="row">
                @if ($products->isEmpty())
                    No products
                @else
                    @foreach ($products as $item)
                        <div class="col-md-3">
                            <div class="dz-shop-card style-1">
                                <div class="dz-media cat-img">

                                    <center>
                                        @if ($item->images->isNotEmpty())
                                            <a href="{{ route('product.details', ['slug' => $item->slug]) }}"><img
                                                    src="{{ asset('storage/products-images/' . $item->images->first()->image) }}"></a>
                                        @else
                                            <p>No image available</p>
                                        @endif
                                    </center>
                                </div>

                                <div class="dz-content">
                                    <h5 class="title"><a href="detail.php">{{ $item->name }}</a></h5>

                                    <ul class="dz-rating">
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                    </ul>
                                    <div class="price">
                                        <span class="price-num"><b>Rs. {{ $item->price }}</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>

</div>
</section>

@include('spare-stream.include.footer')
<!-- Header End -->
</body>

</html>
