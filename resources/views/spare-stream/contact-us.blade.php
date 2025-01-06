@include('spare-stream.include.header')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!-- Header End -->

<div class="container bg-light">
    <div class="row py-5 px-3 justify-content-around">
        <div class="col-lg-3 contact-side-bar">
            <div>
                <nav aria-label="breadcrumb mb-4">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><small>Contact us</small></li>
                    </ol>
                </nav>

                <h6><i class="fa-solid fa-user"></i> MY ACCOUNT</h6>
                <hr class="my-2 mb-3">
                <ul class="side-li">
                    <li>Orders</li>
                    <li>Replacement Requests</li>
                    <li>SpareTeam Support</li>
                </ul>

                <div class="track-order">
                    <p class="mb-1">Track my order(s)</p>
                    <div class="track-input">
                        <input type="text" name="" id="" class="text" placeholder="Enter ID/Email">
                        <i class="fa-solid fa-caret-right"></i>
                    </div>
                </div>

                <div class="row track-btn mt-3 align-items-center ">
                    <div class="col-md-5 mb-2 mb-md-0">
                        <button>Sign In</button>
                    </div>
                    <div class="col-md-5 track-btn-outline">
                        <button>Resgister</button>
                    </div>


                </div>

            </div>
        </div>
        <!-- -------- -->
        <div class="col-lg-8 mt-3 mt-lg-0">
            <h6 class="fw-bold">Contact Us</h6>
            <div class="contact-content">
                <small class="fw-semibold">SpareStream sales team:</small>
                <p>Interested in our products? need more information on products and services?
                    Please send us your queries using this form: <a href="#">SpareStream</a></p>
                <p>Or call us on 9599197756 (9 am to 6 pm)

                </p>
            </div>

            <div class="contact-content my-4">
                <small class="fw-semibold">SpareStream support team:</small>
                <p>For any problem with our products or services? Make complain in your order panel by <a href="#">clicking here.</a></p>
                <p>Or call us on 9599197756 (9 am to 6 pm)

                </p>
            </div>

            <div class="contact-content">
                <small>Postal Contact:</small><br>
                <small class="fw-semibold">SpareStream pvt ltd</small><br>
                <small>88, Navyug Market, Ghaziabad</small><br>
                <small>UP - 201001</small>
            </div>
        </div>



    </div>
</div>

@include('spare-stream.include.footer')
<!-- Header End -->
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>

</html>