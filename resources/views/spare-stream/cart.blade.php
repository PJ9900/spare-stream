@include('spare-stream.include.header')
<!-- Header End -->


<div class="page-content bg-grey">
    <section class="content-inner-1 border-bottom">
        <div class="container-fluid breadcrum mb-0">
            <div>
                <ol class="d-flex ">
                    <li>
                        <a href="" style="color: #000;">Home &nbsp; / </a>
                    </li>
                    <li>
                        <a href="" style="color: #000;">&nbsp; Cart contents &nbsp; / </a>
                    </li>
                </ol>
            </div>

        </div>
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
        @endif
        @if (Session::has('message'))
            <div class="alert alert-success">{{ Session::get('message') }}</div>
        @endif
        @if ($carts->isEmpty())
            <div class="container-fluid">
                <div class="row">
                    <div class="col">No Products in Cart</div>
                </div>
            </div>
        @else
            <div class="container-fluid">
                <div class="section-head text-center">
                    <h2 class="title mb-5" style="font-size: 20px; text-transform: none;">Cart Contents</h2>
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="" class="btn btn-primary"
                                style="text-transform: none; float: inline-start;">Continue shopping </a>
                        </div>
                        <div class="col-lg-6">

                            <a href="{{ route('cart.checkout') }}" class="btn btn-primary"
                                style="text-transform: none; float: inline-end;">Proceed to
                                checkout </a>
                            {{-- 
                                <a href="{{ route('cart.checkout', ['token' => 'null']) }}" class="btn btn-primary"
                                    style="text-transform: none; float: inline-end;">Proceed to
                                    checkout </a> --}}

                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div style="padding: 15px; border: 1px solid; margin-top: 30px;">
                    <table style="width: 100%;">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Unit Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Row 1 -->


                            {{-- check kro nhi tha --}}
                            @php
                                $total = 0;
                            @endphp
                            {{-- @foreach ($carts as $item)
                                {{ $total += $item->total_price }}
                                <tr class="mb-2 pb-4">
                                    <td class="mb-2">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <center>
                                                    <!-- Display product image -->
                                                    @if ($item->product->images->isNotEmpty())
                                                        <a
                                                            href="{{ route('product.details', ['slug' => $item->product->slug]) }}">
                                                            <img src="{{ asset('storage/products-images/' . $item->product->images->first()->image) }}"
                                                                alt="{{ $item->product->name }}"
                                                                style="max-width: 100px; max-height: 100px;">
                                                        </a>
                                                    @else
                                                        <img src="https://via.placeholder.com/100"
                                                            alt="No Image Available"
                                                            style="max-width: 100px; max-height: 100px;">
                                                    @endif
                                                </center>
                                            </div>
                                            <div class="col-md-10">
                                                <!-- Product Name -->
                                                <h5>{{ $item->product->name }}</h5>
                                                <!-- Product SKU or code -->
                                                <p>CODE: {{ $item->product->sku }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Product Price -->
                                    <td class="mb-2">{{ number_format($item->product->price, 2) }} Rs.</td>
                                    <td class="mb-2">
                                        <div class="input-group" style="width: 100px;">
                                            <!-- Quantity input -->
                                            <input type="number" class="text-center" value="{{ $item->prod_qty }}"
                                                id="quantity{{ $item->id }}" min="1"
                                                style="border: 1px solid; width: 42px;"
                                                oninput="updateTotal({{ $item->id }}, this)">
                                        </div>
                                    </td>
                                    <!-- Total Price -->
                                    <td class="mb-2" id="total{{ $item->id }}">
                                        {{ number_format($item->total_price, 2) }} Rs.</td>
                                </tr>
                            @endforeach --}}

                            @foreach ($carts as $item)
                                <tr class="mb-2 pb-4" class="updating_cart_for_products">
                                    {{ $total += $item->total_price }}
                                    <td class="mb-2">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <center>
                                                    <!-- Display product image -->
                                                    @if ($item->product->images->isNotEmpty())
                                                        <a
                                                            href="{{ route('product.details', ['slug' => $item->product->slug]) }}">
                                                            <img src="{{ asset('storage/products-images/' . $item->product->images->first()->image) }}"
                                                                alt="{{ $item->product->name }}"
                                                                style="max-width: 100px; max-height: 100px;">
                                                        </a>
                                                    @else
                                                        <img src="https://via.placeholder.com/100"
                                                            alt="No Image Available"
                                                            style="max-width: 100px; max-height: 100px;">
                                                    @endif
                                                </center>
                                            </div>
                                            <div class="col-md-10">
                                                <!-- Product Name -->
                                                <h5>{{ $item->product->name }}</h5>
                                                <!-- Product SKU or code -->
                                                <p>CODE: {{ $item->product->sku }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- Product Price -->
                                    <td class="mb-2">{{ number_format($item->product->price, 2) }} Rs.</td>
                                    <td class="mb-2">
                                        <div class="input-group" style="width: 100px;">
                                            <!-- Quantity input -->
                                            <input type="number" class="text-center quantity-input"
                                                value="{{ $item->prod_qty }}" id="quantity{{ $item->id }}"
                                                min="1" style="border: 1px solid; width: 42px;">
                                        </div>
                                    </td>
                                    <!-- Total Price -->
                                    <td class="mb-2 total-price" id="total{{ $item->id }}">
                                        {{ number_format($item->total_price, 2) }} Rs.
                                    </td>
                                    <input type="hidden" class='cart_id' value="{{ $item->id }}">
                                    <input type="hidden" class='cart_quantity' value="{{ $item->prod_qty }}">
                                    <input type="hidden" class='cart_price' value="{{ $item->price }}">
                                    <input type="hidden" class='cart_total_price' value="{{ $item->total_price }}">
                                </tr>
                            @endforeach



                            {{-- check mat kro nhi tha --}}

                        </tbody>
                    </table>
                    <div class="row" style="padding: 17px 20px 0px; border-top: 1px solid;">
                        {{-- <div class="col-md-3">
                        <div style="padding: 10px; border: 1px solid;">
                            <h5><b>Applied promotions</b></h5>
                            <p class="mb-0">Buy 2 products or more and get flat 50 Rs. off</p>
                        </div>
                        <h5 class="mt-4">Rs. Cash Back &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; 77
                        </h5>
                    </div> --}}
                        <div class="col-md-6"></div>
                        <div class="col-md-3">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <p>Subtotal</p>
                                    </td>
                                    <td style="text-align: right;">
                                        <p>{{ $total }} Rs.</p>
                                    </td>
                                </tr>
                                {{-- <tr>
                                <td>
                                    <p>Total weight</p>
                                </td>
                                <td style="text-align: right;">
                                    <p>0.28 Kg</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Bluedart SR</p>
                                </td>
                                <td style="text-align: right;">
                                    <p>0.00 Rs.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Order discount</p>
                                </td>
                                <td style="text-align: right;">
                                    <p>-50.00 Rs.</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p>Rs. Cash Back</p>
                                </td>
                                <td style="text-align: right;">
                                    <p>+77</p>
                                </td>
                            </tr> --}}
                            </table>
                        </div>
                        <div class="col-md-12">
                            <p class="mb-0"
                                style="font-size: 20px; text-align: right; border-top: 1px solid; padding-top: 10px;">
                                <b>Total cost {{ $total }} Rs.</b>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row" style="padding: 20px 0;">
                    <div class="col-lg-6">
                        <a href="" class="btn btn-primary"
                            style="text-transform: none; float: inline-start;">Continue shopping </a>

                        <a href="{{ route('clear.cart') }}" class="btn btn-primary"
                            style="text-transform: none; float: inline-start;">Clear
                            Cart </a>

                        {{-- <a href="{{ route('clear.cart', ['token' => 'null']) }}" class="btn btn-primary"
                                style="text-transform: none; float: inline-start;">Clear
                                Cart </a>
                        --}}
                    </div>
                    <div class="col-lg-6">
                        {{-- @if ($cartToken != 'null') --}}
                        <a href="{{ route('cart.checkout') }}" class="btn btn-primary"
                            style="text-transform: none; float: inline-end;">Proceed
                            to checkout </a>
                        {{-- @else
                            <a href="{{ route('cart.checkout', ['token' => 'null']) }}" class="btn btn-primary"
                                style="text-transform: none; float: inline-end;">Proceed
                                to checkout </a>
                        @endif --}}
                    </div>
                </div>

            </div>
        @endif

</div>
</section>

@include('spare-stream.include.footer')
<!-- Header End -->
</body>

</html>
