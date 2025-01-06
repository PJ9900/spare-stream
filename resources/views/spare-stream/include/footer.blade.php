<!-- Newsletter -->
<section class="py-3 newsletter-wrapper d-none d-sm-none d-md-block d-lg-block">
    <div class="container" style="background: transparent">
        <div class="subscride-inner">
            <div
                class="row style-1 justify-content-xl-between justify-content-lg-center align-items-center text-xl-start text-center">
                <div class="col-xl-3 col-lg-12 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="section-head mb-0">
                        <h3 class="title text-white my-lg-3 mt-0" style="font-size: 22px;">Stay Connected
                        </h3>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <form class="dzSubscribe style-1" action="#" method="post">
                        <div class="dzSubscribeMsg"></div>
                        <div class="form-group">
                            <div class="input-group mb-0">
                                <input name="dzEmail" required="required" type="email" class="form-control"
                                    placeholder="Enter Email">
                                <div class="input-group-addon" style="border: 0px solid !important;">
                                    <i class="fa-solid fa-paper-plane"></i>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-xl-5 col-lg-6"></div>
            </div>
        </div>
    </div>
</section>
<!-- Newsletter End -->

</div>

<!-- Footer -->
<footer class="site-footer style-1 d-none d-sm-none d-md-block d-lg-block">

    <!-- Footer Top -->
    <div class="footer-top">
        <div class="container" style="background: transparent">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="widget widget_services">
                        <h5 class="footer-title">My Account</h5>
                        @if (!Auth::check())
                            <ul>
                                <li>
                                    <a href="{{ route('login') }}">Sign in</a>
                                </li>
                                <li><a href="{{ route('register') }}">Create account</a></li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-sm-4 col-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="widget widget_services">
                        <h5 class="footer-title">Sparestream.com</h5>
                        <ul>
                            <li><a href="{{ route('about.us') }}">About us</a></li>
                            <li><a href="{{ route('contact.us') }}">Contact us</a></li>
                            <li><a href="{{ route('career') }}">Career with us</a></li>
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="{{ route('mobile.directory') }}">Mobile Directory</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="widget widget_services">
                        <h5 class="footer-title">Customer Service</h5>
                        <ul>
                            <li><a href="{{ route('support') }}">Contact Customer Support</a></li>
                            <li><a href="{{ route('order') }}">Track Order Status</a></li>
                            <li><a href="{{ route('term.condition') }}">Terms & Conditions</a></li>
                            <li><a href="{{ route('warranty') }}">Warranty T&C</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="widget widget_services">
                        <h5 class="footer-title">How to Sparestream</h5>
                        <ul>
                            <li>
                                <a href="{{ route('manual') }}">How to manual's</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Top End -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container" style="background: transparent">
            <div class="row fb-inner">
                <div class="col-lg-6 col-md-12 text-start">
                    <p class="copyright-text">Sparestream - © 2024 All Rights Reserved</p>
                </div>
                <div class="col-lg-6 col-md-12 text-end">
                    <p>Designes & Developed <span class="heart"></span> by <a href="">wedigital India</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

</footer>
<!-- Footer End -->

<!--mobile footer-->
<div class="accordion accordion-flush d-block d-sm-block d-md-none d-lg-none" id="accordionFlushExample"
    style="padding-bottom: 60px;">
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                My Account
            </button>
        </h2>
        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <ul>
                    <li class="mob-foot"><a href="{{ route('login') }}">Sign in</a></li>
                    <li class="mob-foot"><a href="{{ route('register') }}">Create account</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Sparestream.com
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <ul>
                    <li class="mob-foot"><a href="#">About us</a></li>
                    <li class="mob-foot"><a href="#">Contact us</a></li>
                    <li class="mob-foot"><a href="#">Career with us</a></li>
                    <li class="mob-foot"><a href="#">Sitemap</a></li>
                    <li class="mob-foot"><a href="#">Mobile Directory</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Customer Service
            </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <ul>
                    <li class="mob-foot"><a href="#">Contact Customer Support</a></li>
                    <li class="mob-foot"><a href="#">Track Order Status</a></li>
                    <li class="mob-foot"><a href="#">Terms & Conditions</a></li>
                    <li class="mob-foot"><a href="#">Warranty T&C</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="accordion-item">
        <h2 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                How to Sparestream
            </button>
        </h2>
        <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
            data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <ul>
                    <li class="mob-foot">
                        <a href="">How to manual's</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

</div>

<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
</div>
<!-- JAVASCRIPT FILES ========================================= -->
<script src="{{ asset('client/js/jquery.min.js') }}"></script><!-- JQUERY MIN JS -->
<script src="{{ asset('client/vendor/wow/wow.min.js') }}"></script><!-- WOW JS -->
<script src="{{ asset('client/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script><!-- BOOTSTRAP MIN JS -->
<script src="{{ asset('client/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script><!-- BOOTSTRAP SELECT MIN JS -->
<script src="{{ asset('client/vendor/counter/waypoints-min.js') }}"></script><!-- WAYPOINTS JS -->
<script src="{{ asset('client/vendor/counter/counterup.min.js') }}"></script><!-- COUNTERUP JS -->
<script src="{{ asset('client/vendor/swiper/swiper-bundle.min.js') }}"></script><!-- SWIPER JS -->
<script src="{{ asset('client/js/dz.carousel.js') }}"></script><!-- DZ CAROUSEL JS -->
<script src="{{ asset('client/js/dz.ajax.js') }}"></script><!-- AJAX -->
<script src="{{ asset('client/js/custom.js') }}"></script><!-- CUSTOM JS -->

<script>
    $(document).ready(function() {
        // Function to fetch and display products based on selected categories and model
        function fetchProducts() {
            var selectedCategories = [];
            // Collect the selected categories (including already checked ones on page load)
            $('input[type="checkbox"]:checked').each(function() {
                selectedCategories.push($(this).val());
            });

            var model = $('#model_name').val();

            $.ajax({
                url: '{{ route('filter.products') }}',
                method: 'GET',
                data: {
                    subcategories: selectedCategories,
                    model: model
                },
                success: function(response) {
                    console.log(response.products.length);
                    if (response.products.length > 0) {
                        $('#new_product_found span').text(response.products.length);
                    } else {
                        $('#new_product_found span').text(0); // Show 0 if no products found
                    }

                    // If products are returned, update the product list
                    if (response.products.length > 0) {
                        var productHTML = '';
                        response.products.forEach(function(item) {
                            productHTML += `
                        <div class="col-md-3">
                            <div class="dz-shop-card style-1">
                                <div class="dz-media cat-img">
                                    <center>
                                        ${item.images.length > 0 ? 
                                            '<a href="' + item.details_url + '"><img class="search-pro-img" src="' + item.image_url + '" alt="' + item.name + '"></a>' :
                                            '<p>No image available</p>'
                                        }
                                    </center>
                                </div>
                                <div class="dz-content">
                                    <h5 class="title"><a href="${item.details_url}">${item.name}</a></h5>
                                    <ul class="dz-rating">
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                        <li><i class="flaticon-star text-yellow"></i></li>
                                    </ul>
                                    <div class="price">
                                        <span class="price-num"><b>Rs. ${item.price}</b></span>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                        });

                        // Insert the generated HTML into the product-list div
                        $('.product-list').html(productHTML);
                    } else {
                        $('.product-list').html('<p>No products found</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error: ' + error);
                }
            });
        }

        // Call the fetchProducts function when the page is loaded
        fetchProducts();

        // When the user selects or deselects a category or color
        $('input[type="checkbox"]').on('change', function() {
            fetchProducts(); // Fetch products again based on the updated selection
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Listen for the quantity change event
        $(document).on('input', '.quantity-input', function() {

            var quantityInput = $(this);
            var itemId = quantityInput.attr('id').replace('quantity', '');
            var cartRow = quantityInput.closest('tr');
            var cart_id = cartRow.find('.cart_id').val();
            var cart_quantity = quantityInput.val();
            var cart_price = cartRow.find('.cart_price')
                .val();
            var cart_total_price = cartRow.find('.cart_total_price')
                .val();

            console.log(cart_id + ' ' + cart_quantity + ' ' + cart_price + ' ' + cart_total_price);

            // Call the function to update the cart in the database
            updateCartInDatabase(cart_id, cart_quantity, cart_price);
        });
        // AJAX request to update the cart in the database
        function updateCartInDatabase(cartItemId, quantity, cart_price) {
            $.ajax({
                url: "{{ route('cart.update') }}", // Assuming the route is named 'cart.update'
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    cart_item_id: cartItemId,
                    quantity: quantity,
                    cart_price: cart_price
                },
                success: function(response) {
                    // Handle the success response (optional)
                    location.reload();
                    $('.updating_cart_for_products').load(document.URL +
                        ' .updating_cart_for_products');
                    console.log(response.message);
                },
                error: function(xhr, status, error) {
                    // Handle any errors (optional)
                    console.error('Error updating cart:', error);
                }
            });
        }
    });
</script>
