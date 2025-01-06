@include('spare-stream.include.header')
<!-- Header End -->

<div class="page-content">

    <div class="banner">
        <div class="container-fluid">
            <a href="#">

                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ 'client/img/banner/banner-1920.png' }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ 'client/img/banner/banner-1920-550.jpg' }}" class="d-block w-100"
                                alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ 'client/img/banner/banner-1920-24.png' }}" class="d-block w-100"
                                alt="...">
                        </div>
                    </div>
                </div>
            </a>

        </div>
    </div>
    <!--Recommend Section Start-->

    <section class="content-inner-1 reccomend d-none d-sm-none d-md-block d-lg-block">
        <div class="container-fluid">
            <div class="section-head text-center">
                <h2 class="title">Spare Parts</h2>
            </div>
            <div class="swiper-container-fluid swiper-two">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.1s">
                            @if (!empty($spare_slug))
                                <a href="{{ route('spare.products', ['slug' => $spare_slug]) }}">
                                @else
                                    <a href="#">
                            @endif
                            <div class="dz-media">
                                <center>
                                    <!-- Display the image of the product -->
                                    <img src="{{ asset('client/img/lcd.jpg') }}" alt="mobile spare image"
                                        width="130px">
                                </center>
                            </div>
                            <div class="dz-content">
                                <h4 class="title">Mobile Spare Parts</h4>
                                <!-- Display other product details here -->
                            </div>
                            </a>
                        </div>
                    </div>
                    @foreach ($spare_parts as $item)
                        <div class="swiper-slide">
                            <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.1s">
                                <a href="{{ route('sub.products', ['id' => $item->id]) }}">
                                    <div class="dz-media">
                                        <center>
                                            <!-- Display the image of the product -->
                                            <img src="{{ asset('storage/subcategory-images/' . $item->image) }}"
                                                alt="{{ $item->name }}" width="130px">
                                        </center>
                                    </div>
                                    <div class="dz-content">
                                        <h4 class="title">{{ $item->name }}</h4>
                                        <!-- Display other product details here -->
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="swiper-slide">
							<div class="books-card style-1 wow fadeInUp" data-wow-delay="0.2s">
								<div class="dz-media">
									<center>
									    <img src="{{('client/img/display-screen.jpg')}}" alt="book">
									</center>									
								</div>
								<div class="dz-content">
									<h4 class="title">Display Screen</h4>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="books-card style-1 wow fadeInUp" data-wow-delay="0.3s">
								<div class="dz-media">
									<center>
									    <img src="{{('client/img/touch-screen.jpg')}}" alt="book">	
									</center>								
								</div>
								<div class="dz-content">
									<h4 class="title">Touch Screen</h4>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="books-card style-1 wow fadeInUp" data-wow-delay="0.4s">
								<div class="dz-media">
									<center>
									    <img src="{{('client/img/lcd.jpg')}}" alt="book">
									</center>									
								</div>
								<div class="dz-content">
									<h4 class="title">LCD</h4>
								</div>
							</div>
						</div>
						<div class="swiper-slide">
							<div class="books-card style-1 wow fadeInUp" data-wow-delay="0.5s">
								<div class="dz-media">
									<center>
									    <img src="{{('client/img/housing.jpg')}}" alt="book">
									</center>									
								</div>
								<div class="dz-content">
									<h4 class="title">Housing</h4>
								</div>
							</div>
						</div> --}}
                </div>
            </div>
        </div>
    </section>

    <!--Recommend Section Start-->
    <section class="content-inner-1 reccomend d-none d-sm-none d-md-block d-lg-block">
        <div class="container-fluid">
            <div class="section-head text-center">
                <h2 class="title">Accessories</h2>
            </div>
            <!-- Swiper -->
            <div class="swiper-container-fluid swiper-two">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.1s">
                            @if (!empty($accessor_slug))
                                <a href="{{ route('spare.products', ['slug' => $accessor_slug]) }}">
                                @else
                                    <a href="#">
                            @endif
                            <div class="dz-media">
                                <center>
                                    <img src="{{ asset('client/img/mobile-accessories.jpg') }}"
                                        alt="{{ $item->name }}" width="100px">
                                </center>
                            </div>
                            <div class="dz-content">
                                <h4 class="title">Mobile Accessories</h4>
                            </div>
                            </a>
                        </div>
                    </div>
                    @foreach ($accessories as $item)
                        <div class="swiper-slide">
                            <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.1s">
                                <a href="{{ route('sub.products', ['id' => $item->id]) }}">
                                    <div class="dz-media">
                                        <center>
                                            <img src="{{ asset('storage/subcategory-images/' . $item->image) }}"
                                                alt="{{ $item->name }}" width="100px">
                                        </center>
                                    </div>
                                    <div class="dz-content">
                                        <h4 class="title">{{ $item->name }}</h4>

                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!--Recommend Section Start-->
    <!-- <section class="content-inner-1 reccomend d-none d-sm-none d-md-block d-lg-block">
   <div class="container-fluid">
    <div class="section-head text-center">
     <h2 class="title">Repair Tools</h2>
    </div>
    
    <div class="swiper-container-fluid swiper-two">
     <div class="swiper-wrapper">
      <div class="swiper-slide">
       <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.1s">
        <div class="dz-media">
         <center>
         <img src="{{ 'client/img/mobile-tool.jpg' }}" alt="book">
         </center>
        </div>
        <div class="dz-content">
         <h4 class="title">Mobile Tool Kits</h4>
         
        </div>
       </div>
      </div>
      <div class="swiper-slide">
       <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.2s">
        <div class="dz-media">
         <center>
         <img src="{{ 'client/img/screw-driver.jpg' }}" alt="book">
         </center>
        </div>
        <div class="dz-content">
         <h4 class="title">Screw Driver</h4>
        </div>
       </div>
      </div>
      <div class="swiper-slide">
       <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.3s">
        <div class="dz-media">
         <center>
         <img src="{{ 'client/img/glue.jpg' }}" alt="book">
         </center>
        </div>
        <div class="dz-content">
         <h4 class="title">Glue</h4>
        </div>
       </div>
      </div>
      <div class="swiper-slide">
       <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.4s">
        <div class="dz-media">
         <Center>
         <img src="{{ 'client/img/touch-changing.jpg' }}" alt="book">
         </Center>
        </div>
        <div class="dz-content">
         <h4 class="title">Touch Changing Machine</h4>
        </div>
       </div>
      </div>
      <div class="swiper-slide">
       <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.5s">
        <div class="dz-media">
         <center>
         <img src="{{ 'client/img/opening-tool.jpg' }}" alt="book">
         </center>
        </div>
        <div class="dz-content">
         <h4 class="title">Opening Tool Set</h4>
        </div>
       </div>
      </div>
      
     </div>
    </div>
   </div>
  </section> -->


    <!--Recommend Section Start-->
    <!-- <section class="content-inner-1 reccomend d-none d-sm-none d-md-block d-lg-block">
   <div class="container-fluid">
    <div class="section-head text-center">
     <h2 class="title">Solar & LED</h2>
    </div>
   
    <div class="row">
     <div class="col text-center">
      <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.1s">
       <div class="dz-media">
        <center>
        <img src="{{ 'client/img/mobile-accessories.jpg' }}" alt="book">
        </center>
       </div>
       <div class="dz-content">
        <h4 class="title">Solar, Lighting & Essentials</h4>
        
       </div>
      </div>
     </div>
     <div class="col text-center">
      <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.2s">
       <div class="dz-media">
        <center>
        <img src="{{ 'client/img/battery.jpg' }}" alt="book">
        </center>
       </div>
       <div class="dz-content">
        <h4 class="title">Street Light Fixtures</h4>
       </div>
      </div>
     </div>
     <div class="col text-center">
      <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.3s">
       <div class="dz-media">
        <center>
        <img src="{{ 'client/img/cases-covers.jpg' }}" alt="book">
        </center>
       </div>
       <div class="dz-content">
        <h4 class="title">Solar Panels</h4>
       </div>
      </div>
     </div>
     <div class="col text-center">
      <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.4s">
       <div class="dz-media">
        <center>
        <img src="{{ 'client/img/protective-films.jpg' }}" alt="book">
        </center>
       </div>
       <div class="dz-content">
        <h4 class="title">Indoor LED Lighting</h4>
       </div>
      </div>
     </div>
     
    </div>
    
   </div>
  </section> -->

    <!--Recommend Section Start-->
    <section class="content-inner-1 reccomend d-none d-sm-none d-md-block d-lg-block">
        <div class="container-fluid">
            <div class="section-head text-center">
                <h2 class="title">Recently viewed</h2>
            </div>
            <!-- Swiper -->
            <div class="row">
                <div class="col text-center ">
                    <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="dz-media">
                            <center>
                                <img src="{{ 'client/img/tempered-glass.jpg' }}" alt="book">
                            </center>
                        </div>
                        <div class="dz-content">
                            <h4 class="title">Tempered Glass for Asus Zenfone 5 A500KL - Screen Protector Guard</h4>

                        </div>
                    </div>
                </div>
                <div class="col text-center">
                    <div class="books-card style-1 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="dz-media">
                            <center>
                                <img src="{{ 'client/img/touch-screen-digitizer.jpg' }}" alt="book">
                            </center>
                        </div>
                        <div class="dz-content">
                            <h4 class="title">Touch Screen Digitizer for Asus Zenfone 5 A500KL - Black</h4>

                        </div>
                    </div>
                </div>
                <div class="col text-center"></div>
                <div class="col text-center"></div>
                <div class="col text-center"></div>
            </div>

        </div>
    </section>

    <!-- Book Sale -->
    <section class="content-inner-1 d-none d-sm-none d-md-block d-lg-block">
        <div class="container-fluid">
            <div class="section-head book-align">
                <h2 class="title mb-0">Customers also bought</h2>
                <!--<div class="pagination-align style-1">-->
                <!--	<div class="swiper-button-prev"><i class="fa-solid fa-angle-left"></i></div>-->
                <!--	<div class="swiper-pagination-two"></div>-->
                <!--	<div class="swiper-button-next"><i class="fa-solid fa-angle-right"></i></div>-->
                <!--</div>-->
            </div>
            <div class="swiper-container-fluid books-wrapper-3 swiper-four">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="books-card style-3 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="dz-media">
                                <center>
                                    <img src="{{ 'client/img/flip-cover-for-asus-zenfone-5-a500kl-champagne-gold-maxbhi-4-3-1-flpcvr003526.jpg' }}"
                                        alt="book">
                                </center>
                            </div>
                            <div class="dz-content">
                                <h4 class="title">Flip Cover for Asus Zenfone 5 A500KL - Black
                                    </h44>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="books-card style-3 wow fadeInUp" data-wow-delay="0.2s">
                            <div class="dz-media">
                                <center>
                                    <img src="{{ 'client/img/flip-cover-for-asus-zenfone-5-a500kl-charcoal-black-maxbhi-8-6-1-flpcvr003527.jpg' }}"
                                        alt="book">
                                </center>
                            </div>
                            <div class="dz-content">
                                <h4 class="title">Flip Cover for Asus Zenfone 5 A500KL - Black</h4>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="books-card style-3 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="dz-media">
                                <center>
                                    <img src="{{ 'client/img/flip-cover-for-asus-zenfone-5-a500kl-cherry-red-maxbhi-9-8-1-flpcvr003528.jpg' }}"
                                        alt="book">
                                </center>
                            </div>
                            <div class="dz-content">
                                <h4 class="title">Flip Cover for Asus Zenfone 5 A500KL - Black</h4>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="books-card style-3 wow fadeInUp" data-wow-delay="0.4s">
                            <div class="dz-media">
                                <center>
                                    <img src="{{ 'client/img/flip-cover-for-asus-zenfone-5-a500kl-pearl-white-maxbhi-5-3-1-flpcvr003529.jpg' }}"
                                        alt="book">
                                </center>
                            </div>
                            <div class="dz-content">
                                <h4 class="title">Flip Cover for Asus Zenfone 5 A500KL - Black</h4>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="books-card style-3 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="dz-media">
                                <center>
                                    <img src="{{ 'client/img/screen-guard-for-asus-zenfone-5-a500kl-maxbhi-7-7-1.jpg' }}"
                                        alt="book">
                                </center>
                            </div>
                            <div class="dz-content">
                                <h4 class="title">Flip Cover for Asus Zenfone 5 A500KL - Black</h4>

                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="books-card style-3 wow fadeInUp" data-wow-delay="0.6s">
                            <div class="dz-media">
                                <center>
                                    <img src="{{ 'client/img/flip-cover-for-asus-zenfone-5-a500kl-cherry-red-maxbhi-9-8-1-flpcvr003528.jpg' }}"
                                        alt="book">
                                </center>
                            </div>
                            <div class="dz-content">
                                <h4 class="title">Flip Cover for Asus Zenfone 5 A500KL - Black</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Book Sale End -->

    <!-- brand -->
    <!--<section class="content-inner-1">-->
    <!--	<div class="container-fluid">-->
    <!--		<div class="section-head text-center">-->
    <!--			<h3 class="title text-center" style="font-size: 18px; color: #000; padding-top: 30px">Select Mobile Phone Brand</h3>-->
    <!--		</div>-->

    <!--		<div style="padding-bottom: 30px;">-->
    <!--		    <table class="table table-border" style="border: 1px solid #edeff1;  padding: 4px 20px;">-->
    <!--		    <tr>-->
    <!--		        <td>-->
    <!--		          <center>-->
    <!--					<a href="search-model.php">-->
    <!--						<img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3892/Samsung_by_maxbhi_67to-l2.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>  -->
    <!--		        </td>-->
    <!--		        <td>-->
    <!--		            <center>-->
    <!--					<a href="search-model.php">-->
    <!--				        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Xiaomi_by_maxbhi.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>-->
    <!--		        </td>-->
    <!--		        <td>-->
    <!--		            <center>-->
    <!--					<a href="search-model.php">-->
    <!--				        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Vivo_by_maxbhi.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>-->
    <!--		        </td>-->
    <!--		        <td>-->
    <!--		            <center>-->
    <!--					<a href="search-model.php">-->
    <!--				        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Apple_by_maxbhi.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>-->
    <!--		        </td>-->
    <!--		        <td>-->
    <!--		            <center>-->
    <!--					<a href="search-model.php">-->
    <!--				        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Realme_by_maxbhi.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>-->
    <!--		        </td>-->
    <!--		    </tr>-->
    <!--		    <tr>-->
    <!--		        <td>-->
    <!--		          <center>-->
    <!--					<a href="search-model.php">-->
    <!--						<img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3892/Samsung_by_maxbhi_67to-l2.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>  -->
    <!--		        </td>-->
    <!--		        <td>-->
    <!--		            <center>-->
    <!--					<a href="search-model.php">-->
    <!--				        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Xiaomi_by_maxbhi.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>-->
    <!--		        </td>-->
    <!--		        <td>-->
    <!--		            <center>-->
    <!--					<a href="search-model.php">-->
    <!--				        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Vivo_by_maxbhi.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>-->
    <!--		        </td>-->
    <!--		        <td>-->
    <!--		            <center>-->
    <!--					<a href="search-model.php">-->
    <!--				        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Apple_by_maxbhi.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>-->
    <!--		        </td>-->
    <!--		        <td>-->
    <!--		            <center>-->
    <!--					<a href="search-model.php">-->
    <!--				        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Realme_by_maxbhi.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>-->
    <!--		        </td>-->
    <!--		    </tr>-->
    <!--		    <tr>-->
    <!--		        <td>-->
    <!--		          <center>-->
    <!--					<a href="search-model.php">-->
    <!--						<img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3892/Samsung_by_maxbhi_67to-l2.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>  -->
    <!--		        </td>-->
    <!--		        <td>-->
    <!--		            <center>-->
    <!--					<a href="search-model.php">-->
    <!--				        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Xiaomi_by_maxbhi.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>-->
    <!--		        </td>-->
    <!--		        <td>-->
    <!--		            <center>-->
    <!--					<a href="search-model.php">-->
    <!--				        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Vivo_by_maxbhi.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>-->
    <!--		        </td>-->
    <!--		        <td>-->
    <!--		            <center>-->
    <!--					<a href="search-model.php">-->
    <!--				        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Apple_by_maxbhi.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>-->
    <!--		        </td>-->
    <!--		        <td>-->
    <!--		            <center>-->
    <!--					<a href="search-model.php">-->
    <!--				        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Realme_by_maxbhi.jpeg?t=1731769244" class="brand-image">-->
    <!--					</a>-->
    <!--				</center>-->
    <!--		        </td>-->
    <!--		    </tr>-->
    <!--		</table>-->
    <!--		</div>-->

    <!--	</div>-->
    <!--</section>-->

    <section class="content-inner-1">
        <div class="container-fluid">
            <div class="section-head text-center">
                <h3 class="title text-center" style="font-size: 18px; color: #000; padding-top: 30px">
                    Select Mobile Phone Brand
                </h3>
            </div>

            <div style="padding-bottom: 30px;">
                <table class="table table-border" style="border: 1px solid #edeff1; padding: 4px 20px;">
                    <tr class="l-border brand-row">
                        @foreach ($brands as $brand)
                            <td class="brand-cell">
                                <center>
                                    <a href="{{ route('brand.products', ['slug' => $brand->slug]) }}">
                                        <img src="{{ asset('storage/brand-images/' . $brand->photo) }}"
                                            class="brand-image" alt="{{ $brand->slug }}">
                                    </a>
                                </center>
                            </td>
                        @endforeach
                    </tr>
                </table>
            </div>


        </div>
    </section>


    @include('spare-stream.include.footer')
    </body>

    </html>
