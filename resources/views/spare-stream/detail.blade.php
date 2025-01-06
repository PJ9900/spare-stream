@include('spare-stream.include.header')
<style>
    .slideshow-items {
        width: 500px;
    }

    .slideshow-thumbnails {
        width: 100px;
    }

    #slideshow-items-container {
        display: inline-block;
        position: relative;
    }

    #lens {
        background-color: rgba(233, 233, 233, 0.4)
    }

    #lens,
    #result {
        position: absolute;
        display: none;
        z-index: 1;
    }

    .slideshow-items {
        display: none;
    }

    .slideshow-items.active {
        display: block;
    }

    .slideshow-thumbnails {
        opacity: 0.5;
    }

    .slideshow-thumbnails.active {
        opacity: 1;
    }

    #lens,
    .slideshow-items,
    .slideshow-thumbnails,
    #result {
        border: solid var(--light-grey-2) 1px;
    }
</style>

<div class="page-content">
    <section class="content-inner-1">
        <div class="container-fluid breadcrum mb-0">
            <div>
                <ol class="d-flex ">
                    <li>
                        <a href="" style="color: #000;">Home &nbsp; / </a>
                    </li>
                    <li>
                        <a href="" style="color: #000;">&nbsp; Mobile Accessories &nbsp; / </a>
                    </li>
                    <li>
                        <a href=""> &nbsp;Battery</a>
                    </li>
                </ol>
            </div>
        </div>
        @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
        <div class="container-fluid">
            <div class="row book-grid-row style-4 m-b60">
                <div class="col-md-4">
                    <div id='lens'></div>

                    <div id='slideshow-items-container'>
                        @foreach ($product_images as $index => $item)
                            <img class='slideshow-items {{ $index == 0 ? 'active' : '' }}'
                                src='{{ asset('storage/products-images/' . $item->image) }}'>
                        @endforeach
                    </div>

                    <div id='result'></div>

                    <div class='row'>
                        @foreach ($product_images as $index => $item)
                            <img class='slideshow-thumbnails {{ $index == 0 ? 'active' : '' }}'
                                src='{{ asset('storage/products-images/' . $item->image) }}'>
                        @endforeach
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="dz-content">
                        <div class="dz-header">

                            <h1 class="detail-title">{{ $product->name }}</h1>
                            <div class="shop-item-rating">
                                <ul class="dz-rating d-flex">
                                    <li><i class="flaticon-star text-yellow"></i></li>
                                    <li><i class="flaticon-star text-yellow"></i></li>
                                    <li><i class="flaticon-star text-yellow"></i></li>
                                    <li><i class="flaticon-star text-yellow"></i></li>
                                    <li><i class="flaticon-star text-yellow"></i></li>
                                </ul>


                            </div>

                            <div class="row">
                                <div class="col-md-8" style="z-index:0">
                                    <div class="price">
                                        <h5 class="prixe-size">{{ $product->price }} Rs.</h5>

                                    </div>
                                    <!--<p>List price: 3,050.00 Rs. You save: 1,851.00 Rs. (61%)</p>-->
                                    <!--<p class="mb-0" style="padding: 6px 0;">Cash Back: &emsp; 60 Rs.</p>-->
                                    <!--<a href="">Report incorrect product information.</a>-->
                                    <p>Expected delivery by: <b>Tue, 3rd Dec</b> (if ordered within <b>5 mins</b>).
                                        Details</p>

                                    <table class="mb-3">
                                        <tr>
                                            <td style="width: 100px;">CODE:</td>
                                            <td>{{ $product->sku }}</td>
                                        </tr>
                                        <tr>
                                            <td>Availability:</td>
                                            <td><a href="#"><b>In Stock</b></a></td>
                                        </tr>
                                        <form action="{{ route('add.cart') }}" method="post">
                                            @csrf
                                            <tr>
                                                <td>Quantity:</td>
                                                <td>
                                                    <input type="number" id="numberInput" name="quantity"
                                                        min="1" max="100" step="1" value="1">
                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <input type="submit" class="btn btn-primary" name="action"
                                                        value="Buy Now">
                                                    <input type="submit" class="btn btn-primary" name="action"
                                                        value="Add to Cart">
                                                </td>
                                            </tr>
                                        </form>
                                    </table>


                                    @if (!empty($merged_array))
                                        <h6 class="pt-3">Other colors for {{ $product->name }}</h6>
                                    @endif
                                    <div class="palette">
                                        @foreach ($merged_array as $item)
                                            <a href="{{ route('variant.product', ['slug' => $item['slug']]) }}">
                                                <div class="color-option"
                                                    style="background-color: {{ $item['color_code'] }};"
                                                    data-color="{{ $item['slug'] }}">
                                                </div>
                                            </a>
                                        @endforeach
                                        {{-- <div class="color-option" style="background-color: blue;" data-color="Blue">
                                        </div>
                                        <div class="color-option" style="background-color: green;" data-color="Green">
                                        </div>
                                        <div class="color-option" style="background-color: yellow;" data-color="Yellow">
                                        </div>
                                        <div class="color-option" style="background-color: black;" data-color="Black">
                                        </div>
                                        <div class="color-option"
                                            style="background-color: white; border: 1px solid #ccc;" data-color="White">
                                        </div> --}}
                                    </div>

                                    <script>
                                        // JavaScript for color selection
                                        const colorOptions = document.querySelectorAll('.color-option');
                                        const selectedColor = document.getElementById('selectedColor');

                                        colorOptions.forEach(option => {
                                            option.addEventListener('click', function() {
                                                const color = this.getAttribute('data-color');
                                                selectedColor.style.backgroundColor = this.style.backgroundColor;
                                                selectedColor.textContent = color;
                                            });
                                        });
                                    </script>

                                </div>
                                <div class="col-md-4 d-none d-sm-none d-md-block d-lg-block">
                                    <div>
                                        <h6 style="text-align: right; font-weight: bold;">Need help?</h6>
                                        <p style="text-align: right; font-size: 11px;">Call us on 7419740026 & select
                                            ext. 2 <br>to speak to our sales team specialist.</p>
                                        <hr>
                                        <h6 style="text-align: right; font-weight: bold;">Free Shipping</h6>
                                        <p style="text-align: right; font-size: 11px;">All India Free Shipping with
                                            Express <br>Delivery</p>
                                        <hr>
                                        <h6 style="text-align: right; font-weight: bold;">Spare Stream Guarantee</h6>
                                        <p style="text-align: right; font-size: 11px;">100% Refund if you do not get
                                            your<br> shipment within time</p>
                                        <hr>
                                        <h6 style="text-align: right; font-weight: bold;">Payment Protection</h6>
                                        <p style="text-align: right; font-size: 11px;">Secure Payments & Easy Returns
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row pb-5">
                <div class="col-xl-12">
                    <div class="product-description tabs-site-button">
                        {{-- <center>
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="{{ $product->video }}"
                                    style="height: 350px; width: 600px;" allowfullscreen></iframe>
                            </div>
                        </center> --}}

                        <h4 class="pro-deta"><b>Product Details</b></h4>
                        <p>
                        <p>{!! $product->details !!}</p>
                        </p>
                        {{-- <p>The replacement combo lcd with touch for Asus Zenfone Max Pro (M1) ZB601KL comes with
                            manufacturing defect warranty and the shipping is done in secured packing to make sure you
                            get the product in perfect shape.</p>
                        <ul class="mb-3">
                            <li style="list-style-type: disc">Easiest part type available for Asus Zenfone Max Pro (M1)
                                ZB601KL to replace in your handset with least technical knowledge required.</li>
                            <li style="list-style-type: disc">High quality product with 100% perfect fit.</li>
                            <li style="list-style-type: disc">Complete display combo with LCD screen and digitizer touch
                                screen.</li>
                            <li style="list-style-type: disc">Tested before shipping (QC done).</li>
                            <li style="list-style-type: disc">Brand new product with manufacturing defect warranty.</li>
                        </ul> --}}

                        <h2 class="card-title mb-4">Product Specifications</h2>

                        @if ($product_spec)
                            @foreach ($product_spec as $heading => $specifications)
                                <div class="mb-4">
                                    <h3 class="text-lg font-semibold mb-2">{{ $heading }}</h3>
                                    <div class="pl-4">
                                        @foreach ($specifications as $key => $value)
                                            <div class="grid grid-cols-2 gap-4 mb-2">
                                                <span class="font-medium">{{ $key }}:</span>
                                                <span>{{ $value }}</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>No specifications available</p>
                        @endif
                    </div>

                    <h4 class="pro-deta"><b>Shipping Estimation</b></h4>
                    <p>xpected delivery by: <b>Wed, 4th Dec</b> (if ordered within <b>32 mins</b>).</p>
                    <form>
                        <label>Check New Pincode*</label><br>
                        <input type="text" placeholder="Pincode"><br>
                        <input type="submit" class="btn btn-primary mt-3" value="Check Pincode">
                    </form>

                    <h5 class="pt-5"><b>Delivery Time of the product:</b></h5>
                    <hr>
                    <p>The delivery time of the product depends on the availability of the product & the shipping
                        method selected at the time of checkout. In most cases, when an order is received it is sent
                        to our ordering department & is completed within the time shown while making the order.</p>
                    <p>For any further clarifications, please contact us here or call us on 7419740026</p>
                    <h4 class="pro-deta"><b>Customer Reviews</b></h4>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mt-2">
                                <div class="card-body"
                                    style="
                                        border: 1px solid #edeff1; border-radius: 0">
                                    <h4 class="pro-deta mt-0" style="border-bottom: 0;"><b>4.65</b>
                                        <ul class="dz-rating d-flex" style="float: right;">
                                            <li><i class="flaticon-star text-yellow"></i></li>
                                            <li><i class="flaticon-star text-yellow"></i></li>
                                            <li><i class="flaticon-star text-yellow"></i></li>
                                            <li><i class="flaticon-star text-yellow"></i></li>
                                            <li><i class="flaticon-star text-yellow"></i></li>
                                        </ul>
                                    </h4>
                                    <p>Average Rating based on 55 ratings</p>
                                    <div class="row align-items-center mb-2">
                                        <div class="col-2" style="padding: 0 0 0 20px;">5 Star</div>
                                        <div class="col-9">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                                    aria-valuemax="100">80</div>
                                            </div>
                                        </div>
                                        <div class="col-1 text-end" style="padding: 0">80</div>
                                    </div>
                                    <div class="row align-items-center mb-2">
                                        <div class="col-2" style="padding: 0 0 0 20px;">4 Star</div>
                                        <div class="col-9">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                    aria-valuemax="100">60</div>
                                            </div>
                                        </div>
                                        <div class="col-1 text-end" style="padding: 0">60</div>
                                    </div>
                                    <div class="row align-items-center mb-2">
                                        <div class="col-2" style="padding: 0 0 0 20px;">3 Star</div>
                                        <div class="col-9">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                                    aria-valuemax="100">40</div>
                                            </div>
                                        </div>
                                        <div class="col-1 text-end" style="padding: 0">40</div>
                                    </div>
                                    <div class="row align-items-center mb-2">
                                        <div class="col-2" style="padding: 0 0 0 20px;">2 Star</div>
                                        <div class="col-9">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                    aria-valuemax="100">20</div>
                                            </div>
                                        </div>
                                        <div class="col-1 text-end" style="padding: 0">20</div>
                                    </div>
                                    <div class="row align-items-center mb-2">
                                        <div class="col-2" style="padding: 0 0 0 20px;">1 Star</div>
                                        <div class="col-9">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar"
                                                    style="width: 10%" aria-valuenow="10" aria-valuemin="0"
                                                    aria-valuemax="100">10</div>
                                            </div>
                                        </div>
                                        <div class="col-1 text-end" style="padding: 0">10</div>
                                    </div>


                                </div>
                            </div>
                            <form>
                                <textarea placeholder="Write a review" class="form-control" rows="3" cols="7"></textarea>
                            </form>
                            <input type="submit" class="btn btn-primary mt-3" value="Write a review">

                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="review">
                                        <h3 style="font-size: 20px;"><b> Most Helpful</b>
                                            <ul class="dz-rating d-flex" style="float: right;">
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                            </ul>
                                        </h3>
                                        <hr>
                                        <p>Don't go anywhere in local market this is a very good product i am
                                            personally experience this product thax Spare Stream</p>
                                        <h6><b>Manoj Lahane</b></h6>
                                        <p>28/11/2019, 07:11 PM</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review">
                                        <h3 style="font-size: 20px;"><b> Most Helpful</b>
                                            <ul class="dz-rating d-flex" style="float: right;">
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                            </ul>
                                        </h3>
                                        <hr>
                                        <p>Don't go anywhere in local market this is a very good product i am
                                            personally experience this product thax Spare Stream</p>
                                        <h6><b>Manoj Lahane</b></h6>
                                        <p>28/11/2019, 07:11 PM</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review">
                                        <h3 style="font-size: 20px;"><b> Most Helpful</b>
                                            <ul class="dz-rating d-flex" style="float: right;">
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                            </ul>
                                        </h3>
                                        <hr>
                                        <p>Don't go anywhere in local market this is a very good product i am
                                            personally experience this product thax Spare Stream</p>
                                        <h6><b>Manoj Lahane</b></h6>
                                        <p>28/11/2019, 07:11 PM</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review">
                                        <h3 style="font-size: 20px;"><b> Most Helpful</b>
                                            <ul class="dz-rating d-flex" style="float: right;">
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                            </ul>
                                        </h3>
                                        <hr>
                                        <p>Don't go anywhere in local market this is a very good product i am
                                            personally experience this product thax Spare Stream</p>
                                        <h6><b>Manoj Lahane</b></h6>
                                        <p>28/11/2019, 07:11 PM</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review">
                                        <h3 style="font-size: 20px;"><b> Most Helpful</b>
                                            <ul class="dz-rating d-flex" style="float: right;">
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                            </ul>
                                        </h3>
                                        <hr>
                                        <p>Don't go anywhere in local market this is a very good product i am
                                            personally experience this product thax Spare Stream</p>
                                        <h6><b>Manoj Lahane</b></h6>
                                        <p>28/11/2019, 07:11 PM</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="review">
                                        <h3 style="font-size: 20px;"><b> Most Helpful</b>
                                            <ul class="dz-rating d-flex" style="float: right;">
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                            </ul>
                                        </h3>
                                        <hr>
                                        <p>Don't go anywhere in local market this is a very good product i am
                                            personally experience this product thax Spare Stream</p>
                                        <h6><b>Manoj Lahane</b></h6>
                                        <p>28/11/2019, 07:11 PM</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
</div>
</section>

</div>
<!-- Footer -->

@include('spare-stream.include.footer')

<script>
    $(document).ready(function() {

        $('.slideshow-thumbnails').hover(function() {
            changeSlide($(this));
        });

        $(document).mousemove(function(e) {
            var x = e.clientX;
            var y = e.clientY;

            var x = e.clientX;
            var y = e.clientY;

            var imgx1 = $('.slideshow-items.active').offset().left;
            var imgx2 = $('.slideshow-items.active').outerWidth() + imgx1;
            var imgy1 = $('.slideshow-items.active').offset().top;
            var imgy2 = $('.slideshow-items.active').outerHeight() + imgy1;

            if (x > imgx1 && x < imgx2 && y > imgy1 && y < imgy2) {
                $('#lens').show();
                $('#result').show();
                imageZoom($('.slideshow-items.active'), $('#result'), $('#lens'));
            } else {
                $('#lens').hide();
                $('#result').hide();
            }

        });

    });

    function imageZoom(img, result, lens) {

        result.width(img.innerWidth());
        result.height(img.innerHeight());
        lens.width(img.innerWidth() / 2);
        lens.height(img.innerHeight() / 2);

        result.offset({
            top: img.offset().top,
            left: img.offset().left + img.outerWidth() + 10
        });

        var cx = img.innerWidth() / lens.innerWidth();
        var cy = img.innerHeight() / lens.innerHeight();

        result.css('backgroundImage', 'url(' + img.attr('src') + ')');
        result.css('backgroundSize', img.width() * cx + 'px ' + img.height() * cy + 'px');

        lens.mousemove(function(e) {
            moveLens(e);
        });
        img.mousemove(function(e) {
            moveLens(e);
        });
        lens.on('touchmove', function() {
            moveLens();
        })
        img.on('touchmove', function() {
            moveLens();
        })

        function moveLens(e) {
            var x = e.clientX - lens.outerWidth() / 2;
            var y = e.clientY - lens.outerHeight() / 2;
            if (x > img.outerWidth() + img.offset().left - lens.outerWidth()) {
                x = img.outerWidth() + img.offset().left - lens.outerWidth();
            }
            if (x < img.offset().left) {
                x = img.offset().left;
            }
            if (y > img.outerHeight() + img.offset().top - lens.outerHeight()) {
                y = img.outerHeight() + img.offset().top - lens.outerHeight();
            }
            if (y < img.offset().top) {
                y = img.offset().top;
            }
            lens.offset({
                top: y,
                left: x
            });
            result.css('backgroundPosition', '-' + (x - img.offset().left) * cx + 'px -' + (y - img.offset().top) * cy +
                'px');
        }
    }


    function changeSlide(elm) {
        $('.slideshow-items').removeClass('active');
        $('.slideshow-items').eq(elm.index()).addClass('active');
        $('.slideshow-thumbnails').removeClass('active');
        $('.slideshow-thumbnails').eq(elm.index()).addClass('active');
    }
</script>

</body>

</html>
