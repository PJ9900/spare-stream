@include('spare-stream.include.header')
<!-- Header End -->


<div class="page-content">
    <section class="content-inner-1 border-bottom">
        <div class="container-fluid breadcrum mb-0">
            <div>
                <ol class="d-flex ">
                    <li>
                        <a href="" style="color: #000;">Home &nbsp; / </a>
                    </li>
                    <li>
                        <a href="">&nbsp; Search Results </a>
                    </li>
                </ol>
            </div>

        </div>


        <div class="container-fluid">
            <div class="section-head text-center">
                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header d-md-none" id="headingOne">
                                <!-- Accordion toggle for mobile -->
                                <button style="text-align: left;" class="btn btn-link w-100 text-left" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    Product Type (1)
                                </button>
                            </div>

                            <div id="collapseOne" class="collapse d-md-block" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <!-- Content -->
                                <div class="card-body" style="background: #e0d6cc; border-radius: 0px;">
                                    <p style="text-align: left;" class="d-none d-md-block"><b>Product Type (1)</b></p>
                                    <input type="text" placeholder="Search"
                                        style="padding: 4px 8px; border: 1px solid #c2c9d0; width: 100%; margin-bottom: 10px;">
                                    @foreach ($subcategory as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="{{ $item->slug }}"
                                                value="{{ $item->id }}" @checked($submodel_id == $item->id) />
                                            <label class="form-check-label"
                                                for="{{ $item->slug }}">{{ $item->name }}</label>
                                        </div>
                                    @endforeach
                                    <hr>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 style="font-size: 18px; text-align: left;"><b>Search results</b></h4>
                            </div>
                            <div class="col-md-6">
                                <!--<h4 style="text-align: right; font-size: 18px; font-weight: normal;">Products found:-->
                                <!--    {{ count($products) }}-->
                                <!--</h4>-->
                            </div>
                        </div>

                        <table class="w-100">
                            <tr>
                                <td>

                                    @if (!empty($brand))
                                        <center>
                                            <input type="hidden" id="model_name" value="{{ $model_for_show->name }}">
                                            <a
                                                href="{{ route('brand.model', ['brand' => $brand->slug, 'slug' => $model_for_show->slug]) }}">
                                                <!-- Check if image exists before accessing it -->
                                                @if ($model_for_show->image)
                                                    <img src="{{ asset('storage/model-images/' . $model_for_show->image) }}"
                                                        alt="{{ $model_for_show->name }}">
                                                @else
                                                    <p>No image available</p> <!-- Fallback if no image exists -->
                                                @endif
                                            </a>
                                        </center>
                                    @else
                                        <center>
                                            <input type="hidden" id="model_name" value="{{ $model_for_show->name }}">
                                            <a href="#">
                                                <!-- Check if image exists before accessing it -->
                                                @if ($model_for_show->image)
                                                    <img src="{{ asset('storage/model-images/' . $model_for_show->image) }}"
                                                        alt="{{ $model_for_show->name }}" style="width: 40%;">
                                                @else
                                                    <p>No image available</p> <!-- Fallback if no image exists -->
                                                @endif
                                            </a>
                                        </center>
                                    @endif
                                </td>
                                <td>
                                    <center>
                                        <h5 style="font-size: 18px;"><b>{{ $model_for_show->name }}</b></h5>
                                        <p class="mb-0">Release July 2019</p>
                                        <p class="mb-0">Display 6.39 inches</p>
                                        <a href="">(View more specs)</a>
                                    </center>
                                </td>
                            </tr>
                        </table>

                        <div class="container-fluid" style="padding:0; margin:0;">
                            <div class="row align-items-center bg-light">
                                <!-- Sort By Dropdown -->
                                {{-- <div class="col-md-3 col-12 mb-0 mb-md-0">
                                    <select class="form-select form-select-sm" style="border: 0px solid; height:100%;padding: 4px 20px;background-color: #f5f5f5 !important;">
                                        <option selected>Sort by Popularity</option>
                                        <option value="1">Price: Low to High</option>
                                        <option value="2">Price: High to Low</option>
                                        <option value="3">Newest First</option>
                                    </select>
                                </div> --}}

                                <!-- Per Page Dropdown -->
                                {{-- <div class="col-md-2 col-12 mb-0 mb-md-0">
                                    <select class="form-select form-select-sm" style="border: 0px solid; height:100%;padding: 4px 20px;background-color: #f5f5f5 !important;">
                                        <option selected>36 Per Page</option>
                                        <option value="12">12 Per Page</option>
                                        <option value="24">24 Per Page</option>
                                        <option value="48">48 Per Page</option>
                                    </select>
                                </div> --}}


                            </div>
                        </div>

                        <!--<div class="row">-->
                        <!--    <div id="product-list" class="row">-->
                        <!--        @foreach ($products as $item)
-->
                        <!--            <div class="col-md-3">-->
                        <!--                <div class="dz-shop-card style-1">-->
                        <!--                    <div class="dz-media cat-img">-->
                        <!--                        <center>-->
                        <!-- Check if there are images and access the first image -->
                        <!--                            @if ($item->images->isNotEmpty())
-->
                        <!--                                <a-->
                        <!--                                    href="{{ route('product.details', ['slug' => $item->slug]) }}">-->
                        <!--                                    <img src="{{ asset('storage/products-images/' . $item->images->first()->image) }}"-->
                        <!--                                        alt="{{ $item->name }}">-->
                        <!--                                </a>-->
                    <!--                            @else-->
                        <!--                                <p>No image available</p>-->
                        <!--
@endif-->
                        <!--                        </center>-->
                        <!--                    </div>-->

                        <!--                    <div class="dz-content">-->
                        <!--                        <h5 class="title"><a-->
                        <!--                                href="{{ route('product.details', ['slug' => $item->slug]) }}">{{ $item->name }}</a>-->
                        <!--                        </h5>-->

                        <!--                        <ul class="dz-rating">-->
                        <!--                            <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                            <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                            <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                            <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                            <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                        </ul>-->
                        <!--                        <div class="price">-->
                        <!--                            <span class="price-num"><b>Rs.-->
                        <!--                                    {{ number_format($item->price, 2) }}</b></span>-->
                        <!--                        </div>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--
@endforeach-->
                        <!--    </div>-->


                        <!--    {{-- <div class="col-md-3">-->
                        <!--        <div class="dz-shop-card style-1">-->
                        <!--            <div class="dz-media cat-img">-->
                        <!--                <center>-->
                        <!--                    <a href="detail.php"><img-->
                        <!--                            src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>-->
                        <!--                </center>-->
                        <!--            </div>-->

                        <!--            <div class="dz-content">-->
                        <!--                <h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3-->
                        <!--                        Pro - Black (display glass combo folder)</a></h5>-->

                        <!--                <ul class="dz-rating">-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                </ul>-->
                        <!--                <div class="price">-->
                        <!--                    <span class="price-num"><b>Rs. 1354.78</b></span>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="col-md-3">-->
                        <!--        <div class="dz-shop-card style-1">-->
                        <!--            <div class="dz-media cat-img">-->
                        <!--                <center>-->
                        <!--                    <a href="detail.php"><img-->
                        <!--                            src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>-->
                        <!--                </center>-->
                        <!--            </div>-->

                        <!--            <div class="dz-content">-->
                        <!--                <h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3-->
                        <!--                        Pro - Black (display glass combo folder)</a></h5>-->

                        <!--                <ul class="dz-rating">-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                </ul>-->
                        <!--                <div class="price">-->
                        <!--                    <span class="price-num"><b>Rs. 1354.78</b></span>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="col-md-3">-->
                        <!--        <div class="dz-shop-card style-1">-->
                        <!--            <div class="dz-media cat-img">-->
                        <!--                <center>-->
                        <!--                    <a href="detail.php"><img-->
                        <!--                            src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>-->
                        <!--                </center>-->
                        <!--            </div>-->

                        <!--            <div class="dz-content">-->
                        <!--                <h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3-->
                        <!--                        Pro - Black (display glass combo folder)</a></h5>-->

                        <!--                <ul class="dz-rating">-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                </ul>-->
                        <!--                <div class="price">-->
                        <!--                    <span class="price-num"><b>Rs. 1354.78</b></span>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="col-md-3">-->
                        <!--        <div class="dz-shop-card style-1">-->
                        <!--            <div class="dz-media cat-img">-->
                        <!--                <center>-->
                        <!--                    <a href="detail.php"><img-->
                        <!--                            src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>-->
                        <!--                </center>-->
                        <!--            </div>-->

                        <!--            <div class="dz-content">-->
                        <!--                <h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3-->
                        <!--                        Pro - Black (display glass combo folder)</a></h5>-->

                        <!--                <ul class="dz-rating">-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                </ul>-->
                        <!--                <div class="price">-->
                        <!--                    <span class="price-num"><b>Rs. 1354.78</b></span>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="col-md-3">-->
                        <!--        <div class="dz-shop-card style-1">-->
                        <!--            <div class="dz-media cat-img">-->
                        <!--                <center>-->
                        <!--                    <a href="detail.php"><img-->
                        <!--                            src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>-->
                        <!--                </center>-->
                        <!--            </div>-->

                        <!--            <div class="dz-content">-->
                        <!--                <h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3-->
                        <!--                        Pro - Black (display glass combo folder)</a></h5>-->

                        <!--                <ul class="dz-rating">-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                </ul>-->
                        <!--                <div class="price">-->
                        <!--                    <span class="price-num"><b>Rs. 1354.78</b></span>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="col-md-3">-->
                        <!--        <div class="dz-shop-card style-1">-->
                        <!--            <div class="dz-media cat-img">-->
                        <!--                <center>-->
                        <!--                    <a href="detail.php"><img-->
                        <!--                            src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>-->
                        <!--                </center>-->
                        <!--            </div>-->

                        <!--            <div class="dz-content">-->
                        <!--                <h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3-->
                        <!--                        Pro - Black (display glass combo folder)</a></h5>-->

                        <!--                <ul class="dz-rating">-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                </ul>-->
                        <!--                <div class="price">-->
                        <!--                    <span class="price-num"><b>Rs. 1354.78</b></span>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div class="col-md-3">-->
                        <!--        <div class="dz-shop-card style-1">-->
                        <!--            <div class="dz-media cat-img">-->
                        <!--                <center>-->
                        <!--                    <a href="detail.php"><img-->
                        <!--                            src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>-->
                        <!--                </center>-->
                        <!--            </div>-->

                        <!--            <div class="dz-content">-->
                        <!--                <h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3-->
                        <!--                        Pro - Black (display glass combo folder)</a></h5>-->

                        <!--                <ul class="dz-rating">-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                    <li><i class="flaticon-star text-yellow"></i></li>-->
                        <!--                </ul>-->
                        <!--                <div class="price">-->
                        <!--                    <span class="price-num"><b>Rs. 1354.78</b></span>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div> --}}-->
                        <!--</div>-->

                        <div class="row product-list">
                            <!-- The filtered products will be injected here by AJAX -->
                        </div>

                    </div>
                </div>
            </div>
        </div>


</div>
</section>
@include('spare-stream.include.footer')
<!-- Header End -->
</body>

</html>
