@include('spare-stream.include.header')
<!-- Header End -->

<style>
    .form-group {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .form-control {
        border: 1px solid #ccc;
        border-radius: 0.5rem;
        padding: 1rem 0.5rem;
        outline: none;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .form-label {
        position: absolute;
        top: 50%;
        left: 0.75rem;
        transform: translateY(-50%);
        background: white;
        padding: 0 0.25rem;
        color: #aaa;
        transition: all 0.3s ease;
        pointer-events: none;
    }

    .form-control:focus+.form-label,
    .form-control:not(:placeholder-shown)+.form-label {
        top: -0.5rem;
        font-size: 0.85rem;
        color: #007bff;
    }
</style>

<div class="page-content bg-grey">
    <section class="content-inner-1 border-bottom">

        <div class="container-fluid">
            <div class="section-head text-center">
                <h2 class="title mb-5" style="font-size: 20px; text-transform: none;">Checkout</h2>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('place.order') }}" method="POST" class="animatedForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-2">
                                <h6 style="font-size: 20px;">Deliver to</h6>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" id="floatingInput" name="full_name"
                                        value="{{ $user->first_name }}" class="form-control" placeholder="Full Name">
                                    <label for="floatingInput" class="form-label">Full Name*</label>
                                </div>
                                @error('full_name')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <input type="text" id="floatingInput" name="mobile" value="{{ $user->phone }}"
                                        class="form-control" placeholder="Mobile">
                                    <label for="floatingInput" class="form-label">Mobile*</label>
                                </div>
                                @error('mobile')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" id="floatingInput" name="address"
                                        value="{{ $user->ship_address1 }}" class="form-control" placeholder="Address">
                                    <label for="floatingInput" class="form-label">Address*</label>
                                </div>
                                @error('address')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" id="floatingInput" name="landmark" class="form-control"
                                        placeholder="Landmark">
                                    <label for="floatingInput" class="form-label">Landmark</label>
                                </div>
                                @error('landmark')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" id="floatingInput" name="city" class="form-control"
                                        value="{{ $user->ship_city }}" placeholder="City">
                                    <label for="floatingInput" class="form-label">City*</label>
                                </div>
                                @error('city')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" id="floatingInput" name="state"
                                        value="{{ $user->ship_city }}" class="form-control" placeholder="State">
                                    <label for="floatingInput" class="form-label">State*</label>
                                </div>
                                @error('state')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" id="floatingInput" name="country"
                                        value="{{ $user->ship_country }}" class="form-control" placeholder="Country">
                                    <label for="floatingInput" class="form-label">Country*</label>
                                </div>
                                @error('state')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-9">
                                <div class="form-group">
                                    <input type="text" id="floatingInput" name="pincode" class="form-control"
                                        value="{{ $user->ship_zip }}" placeholder="Pincode">
                                    <label for="floatingInput" class="form-label">Pincode*</label>
                                </div>
                                @error('pincode')
                                    <div class="invalid-feedback text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>


                        {{-- <h6 style="font-size: 20px">Courier</h6>
                        <div class="row">
                            <div class="col-md-3">
                                <div style="border: 1px solid #f5f5f5; padding: 10px; border-radius: 5px;">
                                    <img
                                        src="https://d57avc95tvxyg.cloudfront.net/images/shipping/4103/Blue_Dart_logo_transparent.png?t=1591863198">
                                    <h6>Bluedart SR — Free</h6>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div style="border: 1px solid #f5f5f5; padding: 10px; border-radius: 5px;">
                                    <img
                                        src="https://d57avc95tvxyg.cloudfront.net/images/shipping/4044/xpresbbees.jpg?t=1583578002">
                                    <h6>Xpressbees — Free</h6>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div style="border: 1px solid #f5f5f5; padding: 10px; border-radius: 5px;">
                                    <img
                                        src="https://d57avc95tvxyg.cloudfront.net/images/shipping/653/logo.jpg?t=1432221817">
                                    <h6>Delhivery.com — Free</h6>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div style="border: 1px solid #f5f5f5; padding: 10px; border-radius: 5px;">
                                    <img
                                        src="https://d57avc95tvxyg.cloudfront.net/images/shipping/4152/logo3.png?t=1593800555">
                                    <h6>Ekart Logistics Surface — Free</h6>
                                </div>
                            </div>
                        </div>

                        <h6 style="font-size: 20px">Payment methods</h6>
                        <div class="row" style="padding-bottom: 40px;">
                            <div class="col-md-6">
                                <div style="border: 1px solid #f5f5f5; padding: 10px; border-radius: 5px;">
                                    <img
                                        src="https://d57avc95tvxyg.cloudfront.net/images/payment/10/square-brothers-gpay1.png?t=1658773133">
                                    <h5 class="text-center" style="font-size: 20px;">CCAvenue</h5>
                                    <h6>UPI, BHIM, PhonePe, Google Pay, WhatsApp, etc</h6>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="border: 1px solid #f5f5f5; padding: 10px; border-radius: 5px;">
                                    <img
                                        src="https://d57avc95tvxyg.cloudfront.net/images/payment/1050/Untitled.jpg?t=1658777499">
                                    <h5 class="text-center" style="font-size: 20px;">PayTM</h5>
                                    <h6>Paytm Wallet, Paytm App QR, Postpaid, Debit Credit....</h6>
                                </div>
                            </div>
                        </div> --}}



                        <p>By continuing you accept the <a href="#">Terms and Conditions</a>.</p>

                        <button type="submit" style="font-size: 22px; padding-bottom: 40px;"
                            class="text-center">Place
                            order </button>
                    </form>
                </div>
                <div class="col-md-3">
                    <div class="card">

                        <div class="card-body">
                            @php
                                $items = 0;
                                $total = 0;
                            @endphp
                            @foreach ($carts as $item)
                                @php
                                    $items = $items + 1;
                                    $total = $total + $item->total_price;
                                @endphp

                                <h6><b>{{ $item->product_name }}</b>
                                </h6>
                                <p>{{ $item->prod_qty }} x {{ $item->price }} Rs.</p>
                                <hr>
                            @endforeach
                            <table class="w-100">
                                <tr>
                                    <td>{{ $items }} item(s)</td>
                                    <td style="text-align:right;">{{ $total }} Rs.</td>
                                </tr>
                                {{-- <tr>
                                    <td>Order discount</td>
                                    <td style="text-align:right;">-50.00 Rs.</td>
                                </tr>
                                <tr>
                                    <td>Total weight</td>
                                    <td style="text-align:right;">0.28 Kg</td>
                                </tr> --}}
                            </table>
                            {{-- <div style="padding: 10px; border: 1px solid;">
                                <h5><b>Applied promotions</b></h5>
                                <p class="mb-0">Buy 2 products or more and get flat 50 Rs. off</p>
                            </div> --}}

                            <table class="w-100">
                                {{-- <tr>
                                    <td>Rs. Cash Back</td>
                                    <td style="text-align:right;">77</td>
                                </tr> --}}
                                <tr>
                                    <td>Order Total</td>
                                    <td style="text-align:right;">{{ $total }} Rs.</td>
                                </tr>
                            </table>

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
