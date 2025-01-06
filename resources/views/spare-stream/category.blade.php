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
                        <a href="" style="color: #000;">&nbsp; Mobile Accessories &nbsp; / </a>
                    </li>
                    <li>
                        <a href=""> &nbsp;{{ $subcategory_name }}</a>
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

        {{-- <div class="container-fluid">
			    <div class="section-head text-center">
					<h2 class="title">Recommended for you</h2>
				</div>
			    <div class="row book-grid-row">
					<div class="col-book style-1">
						<div class="dz-shop-card style-1">
							<div class="dz-media cat-img">
							    <center>
							        <a href="detail.php"><img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>
							    </center>
							</div>
						
							<div class="dz-content">
								<h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3 Pro - Black (display glass combo folder)</a></h5>
							
								<ul class="dz-rating">
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>		
									<li><i class="flaticon-star text-yellow"></i></li>		
								</ul>
								<div class="price">
									<span class="price-num"><b>Rs. 1354.78</b></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-book style-1">
						<div class="dz-shop-card style-1">
							<div class="dz-media cat-img">
							    <center>
							        <a href="detail.php"><img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>
							    </center>
							</div>
						
							<div class="dz-content">
								<h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3 Pro - Black (display glass combo folder)</a></h5>
							
								<ul class="dz-rating">
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>		
									<li><i class="flaticon-star text-yellow"></i></li>		
								</ul>
								<div class="price">
									<span class="price-num"><b>Rs. 1354.78</b></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-book style-1">
						<div class="dz-shop-card style-1">
							<div class="dz-media cat-img">
							    <center>
							        <a href="detail.php"><img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>
							    </center>
							</div>
						
							<div class="dz-content">
								<h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3 Pro - Black (display glass combo folder)</a></h5>
							
								<ul class="dz-rating">
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>		
									<li><i class="flaticon-star text-yellow"></i></li>		
								</ul>
								<div class="price">
									<span class="price-num"><b>Rs. 1354.78</b></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> --}}

        <div class="container-fluid">
            <div class="section-head text-center">
                <h2 class="title">{{ $subcategory_name }}</h2>
            </div>
            <div class="row">
                @if ($products->isEmpty())
                    <div class="col-md-3">
                        <p>No Products in this category</p>
                    </div>
                @else
                    @foreach ($products as $item)
                        <div class="col-md-3">
                            <div class="dz-shop-card style-1">
                                <div class="dz-media cat-img">
                                    <center>
                                        <!-- Display the first image for each product -->
                                        @if ($item->images->isNotEmpty())
                                            <!-- Check if there are images -->
                                            <a href="{{ route('product.details', ['slug' => $item->slug]) }}">
                                                <img src="{{ asset('storage/products-images/' . $item->images->first()->image) }}"
                                                    alt="{{ $item->name }}">
                                            </a>
                                        @else
                                            <a href="{{ route('product.details', ['slug' => $item->slug]) }}">
                                                <img src="{{ asset('storage/products-images/default.jpg') }}"
                                                    alt="No image available">
                                            </a>
                                        @endif
                                    </center>
                                </div>

                                <div class="dz-content">
                                    <h5 class="title">
                                        <a
                                            href="{{ route('product.details', ['slug' => $item->slug]) }}">{{ $item->name }}</a>
                                    </h5>

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
                {{-- <div class="col-md-3">
					    <div class="dz-shop-card style-1">
							<div class="dz-media cat-img">
							    <center>
							        <a href="detail.php"><img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>
							    </center>
							</div>
						
							<div class="dz-content">
								<h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3 Pro - Black (display glass combo folder)</a></h5>
							
								<ul class="dz-rating">
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>		
									<li><i class="flaticon-star text-yellow"></i></li>		
								</ul>
								<div class="price">
									<span class="price-num"><b>Rs. 1354.78</b></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
					    <div class="dz-shop-card style-1">
							<div class="dz-media cat-img">
							    <center>
							        <a href="detail.php"><img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>
							    </center>
							</div>
						
							<div class="dz-content">
								<h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3 Pro - Black (display glass combo folder)</a></h5>
							
								<ul class="dz-rating">
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>		
									<li><i class="flaticon-star text-yellow"></i></li>		
								</ul>
								<div class="price">
									<span class="price-num"><b>Rs. 1354.78</b></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
					    <div class="dz-shop-card style-1">
							<div class="dz-media cat-img">
							    <center>
							        <a href="detail.php"><img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>
							    </center>
							</div>
						
							<div class="dz-content">
								<h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3 Pro - Black (display glass combo folder)</a></h5>
							
								<ul class="dz-rating">
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>		
									<li><i class="flaticon-star text-yellow"></i></li>		
								</ul>
								<div class="price">
									<span class="price-num"><b>Rs. 1354.78</b></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
					    <div class="dz-shop-card style-1">
							<div class="dz-media cat-img">
							    <center>
							        <a href="detail.php"><img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>
							    </center>
							</div>
						
							<div class="dz-content">
								<h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3 Pro - Black (display glass combo folder)</a></h5>
							
								<ul class="dz-rating">
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>		
									<li><i class="flaticon-star text-yellow"></i></li>		
								</ul>
								<div class="price">
									<span class="price-num"><b>Rs. 1354.78</b></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
					    <div class="dz-shop-card style-1">
							<div class="dz-media cat-img">
							    <center>
							        <a href="detail.php"><img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>
							    </center>
							</div>
						
							<div class="dz-content">
								<h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3 Pro - Black (display glass combo folder)</a></h5>
							
								<ul class="dz-rating">
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>		
									<li><i class="flaticon-star text-yellow"></i></li>		
								</ul>
								<div class="price">
									<span class="price-num"><b>Rs. 1354.78</b></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
					    <div class="dz-shop-card style-1">
							<div class="dz-media cat-img">
							    <center>
							        <a href="detail.php"><img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>
							    </center>
							</div>
						
							<div class="dz-content">
								<h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3 Pro - Black (display glass combo folder)</a></h5>
							
								<ul class="dz-rating">
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>		
									<li><i class="flaticon-star text-yellow"></i></li>		
								</ul>
								<div class="price">
									<span class="price-num"><b>Rs. 1354.78</b></span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
					    <div class="dz-shop-card style-1">
							<div class="dz-media cat-img">
							    <center>
							        <a href="detail.php"><img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4097/lcd_with_touch_screen_for_oppo_reno_3_pro_black_by_maxbhi_com_43032.jpg?t=1731769242"></a>
							    </center>
							</div>
						
							<div class="dz-content">
								<h5 class="title"><a href="detail.php">LCD with Touch Screen for Oppo Reno 3 Pro - Black (display glass combo folder)</a></h5>
							
								<ul class="dz-rating">
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>	
									<li><i class="flaticon-star text-yellow"></i></li>		
									<li><i class="flaticon-star text-yellow"></i></li>		
								</ul>
								<div class="price">
									<span class="price-num"><b>Rs. 1354.78</b></span>
								</div>
							</div>
						</div>
					</div> --}}
            </div>
        </div>

</div>
</section>

@include('spare-stream.include.footer')
<!-- Header End -->
</body>

</html>
