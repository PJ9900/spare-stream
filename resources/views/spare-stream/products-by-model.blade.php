@include('spare-stream.include.header')
<!-- Header End -->

<div class="container">
    <div class="section-head text-center">
        <h3 class="title text-center" style="font-size: 18px; color: #000; padding-top: 30px">
            Products for {{ $brand->name }} Brand
        </h3>
    </div>

    @if ($models->isEmpty())
        <p>No products available for this brand.</p>
    @else
        <div class="row">
            @foreach ($models as $product)
                <div class="col-md-3">
                    <div class="dz-shop-card style-1">
                        <div class="dz-media cat-img">
                            <center>
                                <!-- Check if images relationship exists and is a collection -->

                                <!-- Check if the images relationship is loaded and not empty -->
                                <a href="{{ route('product.detail', ['slug' => $product->slug]) }}">
                                    <img src="{{ asset('storage/model-images/' . $product->image) }}"
                                        alt="{{ $product->name }}">
                                </a>

                            </center>
                        </div>

                        <div class="dz-content">
                            <h5 class="title">
                                <a
                                    href="{{ route('product.detail', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
                            </h5>
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
