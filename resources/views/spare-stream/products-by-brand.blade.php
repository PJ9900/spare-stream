@include('spare-stream.include.header')
<!-- Header End -->

<div class="container">
    <div class="section-head text-center">
        <h3 class="title text-center" style="font-size: 18px; color: #000; padding-top: 30px">
            Products for {{ $brand->name }} Brand
        </h3>
    </div>

    @if ($products->isEmpty())
        <p>No products available for this brand.</p>
    @else
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3">
                    <div class="dz-shop-card style-1">
                        <div class="dz-media cat-img">
                            <center>
                                <!-- Check if images relationship exists and is a collection -->
                                @if ($product->images && $product->images->isNotEmpty())
                                    <!-- Check if the images relationship is loaded and not empty -->
                                    <a href="{{ route('product.details', ['slug' => $product->slug]) }}">
                                        <img src="{{ asset('storage/products-images/' . $product->images->first()->image) }}"
                                            alt="{{ $product->name }}">
                                    </a>
                                @else
                                    <p>No image available</p> <!-- Placeholder if no images -->
                                @endif
                            </center>
                        </div>

                        <div class="dz-content">
                            <h5 class="title">
                                <a
                                    href="{{ route('product.details', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                            </h5>
                            <ul class="dz-rating">
                                <li><i class="flaticon-star text-yellow"></i></li>
                                <li><i class="flaticon-star text-yellow"></i></li>
                                <li><i class="flaticon-star text-yellow"></i></li>
                                <li><i class="flaticon-star text-yellow"></i></li>
                                <li><i class="flaticon-star text-yellow"></i></li>
                            </ul>
                            <div class="price">
                                <span class="price-num"><b>Rs. {{ number_format($product->price, 2) }}</b></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

</div>

@include('spare-stream.include.footer')
</body>

</html>
