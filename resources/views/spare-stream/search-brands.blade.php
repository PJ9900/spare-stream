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
                        <a href="" style="color: #000;">&nbsp; All Brands </a>
                    </li>
                </ol>
            </div>

        </div>

        <div class="container-fluid">
            <div class="section-head text-center">
                <h3 class="title mb-3" style="font-size: 18px; color: #000;">Suggestions</h3>
                <table class="w-100" style="border: 1px solid #edeff1;">
                    <tr>
                        <td>
                            <center>
                                <a href="#">
                                    <img
                                        src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/2504/Asus_Zenfone_Max_Pro_(M1)_ZB601KL_spare_parts_accessories_by_maxbhi.jpeg?t=1731772061">
                                    <h5>Asus Zenfone Max Pro (M1) ZB601KL</h5>
                                </a>
                            </center>
                        </td>
                        <td>
                            <center>
                                <a href="#">
                                    <img
                                        src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/2504/Asus_Zenfone_Max_Pro_(M1)_ZB601KL_spare_parts_accessories_by_maxbhi.jpeg?t=1731772061">
                                    <h5>Asus Zenfone Max Pro (M1) ZB601KL</h5>
                                </a>
                            </center>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- brand -->
        <section class="content-inner-1">
            <div class="container-fluid">
                <div class="section-head text-center pt-4">
                    <h3 class="title text-center" style="font-size: 18px; color: #000; padding-top: 30px">Select Mobile
                        Phone Brand</h3>

                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 mb-3">
                            <div class="header-search-nav">
                                <form class="header-item-search" style="margin: 0px;">
                                    <div class="input-group search-input">
                                        <input type="text" aria-label="Text input with dropdown button"
                                            placeholder="Search Products By Keywords"
                                            style="width: 91%; border: 1px solid #c2c9d0; padding-left: 10px;     padding-top: 5px; padding-bottom: 5px;">
                                        <button class="btn" type="button"
                                            style="border: 1px solid #c2c9d0 !important;
    height: 33px;
    padding-left: 5px;
    padding-right: 18px;
    width: 5px; border-left: 0px solid !important"><i
                                                class="flaticon-loupe"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

                </div>

                <div style="padding-bottom: 30px;">
                    <table class="table table-border" style="border: 1px solid #edeff1;  padding: 4px 20px;">
                        @if ($models->isEmpty())
                            <tr>
                                <td>No Products realted model</td>
                            </tr>
                        @else
                            <tr class="l-border brand-row">
                                @foreach ($models as $item)
                                    <td class="brand-cell" style=" vertical-align: middle;">
                                        <center>
                                            <a href="{{ route('brand.model', ['brand' => $brand->slug, 'slug' => $item->slug]) }}">
                                                <img width="100"
                                                    src="{{ asset('storage/model-images/' . $item->image) }}"
                                                    alt="{{ $item->name }}">
                                                    <p>{{ $item->name }}</p>
                                            </a>
                                            <!--<a width="100" href="{{ route('product.details', ['slug' => $item->slug]) }}">{{ $item->name }}</a>-->
                                        </center>
                                    </td>
                                @endforeach
                            </tr>
                        @endif
                        {{--  <td>
                                <center>
                                    <a href="#">
                                        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3892/Samsung_by_maxbhi_67to-l2.jpeg?t=1731769244"
                                            class="brand-image">
                                    </a>
                                </center>
                            </td>
                             <td>
				            <center>
							<a href="#">
						        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Xiaomi_by_maxbhi.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>
				        </td>
				        <td>
				            <center>
							<a href="#">
						        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Vivo_by_maxbhi.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>
				        </td>
				        <td>
				            <center>
							<a href="#">
						        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Apple_by_maxbhi.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>
				        </td>
				        <td>
				            <center>
							<a href="#">
						        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Realme_by_maxbhi.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>
				        </td> --}}
                        </tr>
                        {{-- <tr>
				        <td>
				          <center>
							<a href="#">
								<img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3892/Samsung_by_maxbhi_67to-l2.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>  
				        </td>
				        <td>
				            <center>
							<a href="#">
						        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Xiaomi_by_maxbhi.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>
				        </td>
				        <td>
				            <center>
							<a href="#">
						        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Vivo_by_maxbhi.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>
				        </td>
				        <td>
				            <center>
							<a href="#">
						        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Apple_by_maxbhi.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>
				        </td>
				        <td>
				            <center>
							<a href="#">
						        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Realme_by_maxbhi.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>
				        </td>
				    </tr>
				    <tr>
				        <td>
				          <center>
							<a href="#">
								<img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3892/Samsung_by_maxbhi_67to-l2.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>  
				        </td>
				        <td>
				            <center>
							<a href="#">
						        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Xiaomi_by_maxbhi.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>
				        </td>
				        <td>
				            <center>
							<a href="#">
						        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Vivo_by_maxbhi.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>
				        </td>
				        <td>
				            <center>
							<a href="#">
						        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Apple_by_maxbhi.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>
				        </td>
				        <td>
				            <center>
							<a href="#">
						        <img src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3893/Realme_by_maxbhi.jpeg?t=1731769244" class="brand-image">
							</a>
						</center>
				        </td>
				    </tr> --}}
                    </table>
                </div>

            </div>
        </section>


        <section class="content-inner-1">
            <div class="container-fluid">
                <div class="section-head text-center pt-4">
                    <h3 class="title text-center" style="font-size: 18px; color: #000; padding-top: 30px">Search Brand
                        By Starting Alphabet</h3>

                </div>

                <table class="w-100">
                    <tr>
                        <td style="width: 4%">
                            <a href="#">A</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">B</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">C</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">D</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">E</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">F</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">G</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">H</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">I</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">J</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">K</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">L</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">M</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">N</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">O</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">P</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">Q</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">R</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">S</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">T</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">U</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">V</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">W</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">X</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">Y</a>
                        </td>
                        <td style="width: 4%">
                            <a href="#">Z</a>
                        </td>
                    </tr>
                </table>
                <div class="bnv">
                    <p class="text-center mb-0">Not able to search the brand you are looking for in our website?
                        Request new Brand / Model here.</p>
                </div>

            </div>
        </section>


        <section class="content-inner-1">
            <div class="container-fluid">
                <div class="section-head text-center pt-4">
                    <h3 class="title text-center" style="font-size: 18px; color: #000; padding-top: 30px">How to
                        Search for your product</h3>

                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <img src="https://www.maxbhi.com/temp/images/search_v3/brand_search.jpg"
                                        class="bnv-img">
                                    <h3 class="text-center bnv-head">1. Select Brand</h3>
                                    <p>Select the brand of the handset for which you are looking products for. If your
                                        brand is not listed, then search using the search box or click on the brand
                                        starting alphabet.</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <img src="https://www.maxbhi.com/temp/images/search_v3/model_search.jpg"
                                        class="bnv-img">
                                    <h3 class="text-center bnv-head">2. Select Model</h3>
                                    <p>After selecting the brand, you now need to select the model of the handset. If
                                        your model is not listed, then search using the search box.</p>
                                </center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <center>
                                    <img src="https://www.maxbhi.com/temp/images/search_v3/part_search.jpg"
                                        class="bnv-img">
                                    <h3 class="text-center bnv-head">3. Select Product Type</h3>
                                    <p>You can now see all type of products which are available for your handset. You
                                        can now select the product type which you are looking details for.</p>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="content-inner-1">
            <div class="container-fluid">
                <div class="section-head pt-4">
                    <h3 class="title" style="font-size: 18px; color: #000; padding-top: 30px">Best Sellers</h3>

                </div>

                <div class="row" style="border: 1px solid #ededf5;">
                    <!-- 7 Columns for desktop and 3 columns on mobile -->
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 text-center p-2">
                        <a href="#">
                            <img
                                src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3735/Apple_iPhone_11_spare_parts_accessories_by_maxbhi.jpeg?t=1731769300">
                            <h6>Apple iPhone 11</h6>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 text-center p-2">
                        <a href="#">
                            <img
                                src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3735/Apple_iPhone_11_spare_parts_accessories_by_maxbhi.jpeg?t=1731769300">
                            <h6>Apple iPhone 11</h6>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 text-center p-2">
                        <a href="#">
                            <img
                                src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3735/Apple_iPhone_11_spare_parts_accessories_by_maxbhi.jpeg?t=1731769300">
                            <h6>Apple iPhone 11</h6>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 text-center p-2">
                        <a href="#">
                            <img
                                src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3735/Apple_iPhone_11_spare_parts_accessories_by_maxbhi.jpeg?t=1731769300">
                            <h6>Apple iPhone 11</h6>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 text-center p-2">
                        <a href="#">
                            <img
                                src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3735/Apple_iPhone_11_spare_parts_accessories_by_maxbhi.jpeg?t=1731769300">
                            <h6>Apple iPhone 11</h6>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 text-center p-2">
                        <a href="#">
                            <img
                                src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3735/Apple_iPhone_11_spare_parts_accessories_by_maxbhi.jpeg?t=1731769300">
                            <h6>Apple iPhone 11</h6>
                        </a>
                    </div>
                </div>

            </div>
        </section>

        <section class="content-inner-1">
            <div class="container-fluid" style="padding-bottom: 30px;">
                <div class="section-head pt-4">
                    <h3 class="title" style="font-size: 18px; color: #000; padding-top: 30px">New Additions</h3>

                </div>

                <div class="row" style="border: 1px solid #ededf5;">
                    <!-- 7 Columns for desktop and 3 columns on mobile -->
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 text-center p-2">
                        <a href="#">
                            <img
                                src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3735/Apple_iPhone_11_spare_parts_accessories_by_maxbhi.jpeg?t=1731769300">
                            <h6>Apple iPhone 11</h6>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 text-center p-2">
                        <a href="#">
                            <img
                                src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3735/Apple_iPhone_11_spare_parts_accessories_by_maxbhi.jpeg?t=1731769300">
                            <h6>Apple iPhone 11</h6>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 text-center p-2">
                        <a href="#">
                            <img
                                src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3735/Apple_iPhone_11_spare_parts_accessories_by_maxbhi.jpeg?t=1731769300">
                            <h6>Apple iPhone 11</h6>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 text-center p-2">
                        <a href="#">
                            <img
                                src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3735/Apple_iPhone_11_spare_parts_accessories_by_maxbhi.jpeg?t=1731769300">
                            <h6>Apple iPhone 11</h6>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 text-center p-2">
                        <a href="#">
                            <img
                                src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3735/Apple_iPhone_11_spare_parts_accessories_by_maxbhi.jpeg?t=1731769300">
                            <h6>Apple iPhone 11</h6>
                        </a>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 text-center p-2">
                        <a href="#">
                            <img
                                src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/100/100/feature_variant/3735/Apple_iPhone_11_spare_parts_accessories_by_maxbhi.jpeg?t=1731769300">
                            <h6>Apple iPhone 11</h6>
                        </a>
                    </div>
                </div>

            </div>
        </section>


</div>
</section>

@include('spare-stream.include.footer')
<!-- Header End -->
</body>

</html>
