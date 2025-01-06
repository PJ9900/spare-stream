@include('spare-stream.include.header')
<!-- Header End -->


<div class="page-content bg-grey">
    <section class="content-inner-1 border-bottom">
        <div class="container-fluid breadcrum mb-0">
            <div>
                <!--<ol style="display: ruby; padding: 0;">-->
                <!--    <li>-->
                <!--        <a href="" style="color: #000;">Home &nbsp; / </a>-->
                <!--    </li>-->
                <!--    <li>-->
                <!--        <a href="" style="color: #000;">&nbsp; All Brands &nbsp; / </a>-->
                <!--    </li>-->
                <!--    <li>-->
                <!--        <a href="" style="color: #000;">&nbsp; Xiaomi &nbsp; / </a>-->
                <!--    </li>-->
                <!--    <li>-->
                <!--        <a href="" style="color: #000;">&nbsp; Xiaomi Redmi K20 Pro </a>-->
                <!--    </li>-->
                <!--</ol>-->
            </div>

        </div>

        <div class="container-fluid" style="padding: 0; margin: 0;">
            <div class="section-head text-center">
                <table class="w-100">
                    <tr>
                        <td>
                            <center>
                                <a href="search.php">
                                    <img src="{{ asset('storage/model-images/' . $models->image) }}">
                                </a>
                            </center>
                        </td>
                        <td>
                            <center>
                                <h5 style="font-size: 18px;"><b>{{ $models->name }}</b></h5>
                                <p class="mb-0">Release July 2024</p>
                                <p class="mb-0">Display 6.39 inches</p>
                                <a href="">(View more specs)</a>
                            </center>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="container-fluid">
            <div class="section-head text-center">
                <table class="w-100" style="border: 1px solid #edeff1;">
                    <tr>
                        <td colspan="2">
                            <h3 style="font-size: 16px; text-align: left; padding-left: 10px;">Display & Screens
                                for
                                {{ $models->name }}</h3>
                        </td>
                    </tr>
                    <tr>
                        @if (empty($display))
                    <tr>
                        <td>No Products realted model</td>
                    </tr>
                @else
                    <tr>
                        @foreach ($display as $item)
                            <td>
                                <center>
                                    <a
                                        href="{{ route('search.model', ['slug' => $item->slug, 'model' => $models->name]) }}">
                                        <img width="100" src="{{ asset('storage/submodel-images/' . $item->photo) }}"
                                            alt="{{ $item->name }}" class="brand-image">
                                        <h6>{{ $item->name }}</h6>
                                    </a>
                                    <!--<a-->
                                    <!--    href="{{ route('search.model', ['slug' => $item['slug'], 'model' => $models->name]) }}">{{ $item['name'] }}</a>-->
                                </center>
                            </td>
                        @endforeach
                    </tr>
                    @endif
                    </tr>
                </table>
            </div>
        </div>

        <div class="container-fluid">
            <div class="section-head text-center">
                <div style="padding-bottom: 30px;">
                    <div class="row" style="border: 1px solid #ededf5; margin: 0px;">
                        <div class="col-lg-12">
                            <h3 class="title"
                                style="font-size: 16px; color: #000; text-align: left; padding-top: 10px;">Body &
                                Housings for {{ $models->name }}</h3>
                        </div>
                        <!-- 7 Columns for desktop and 3 columns on mobile -->
                        @if (empty($Housing))
                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center p-2">
                                No products
                            </div>
                        @else
                            @foreach ($Housing as $item)
                                <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center p-2">
                                    <a
                                        href="{{ route('search.model', ['slug' => $item->slug, 'model' => $models->name]) }}">
                                        <img src="{{ asset('storage/submodel-images/' . $item->photo) }}">
                                        <h6>{{ $item->photo }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                        {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/75/75/detailed/3538/replacement_front_glass_for_xiaomi_redmi_k20_pro_black_by_maxbhi_com_37625.jpg?t=1731769349">
                                <h6>Front Glass Lens</h6>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/75/75/detailed/5233/camera_lens_for_xiaomi_redmi_k20_pro_black_by_maxbhi_com_39105.jpg?t=1731769349">
                                <h6>Camera Lens</h6>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/75/75/detailed/4431/volume_side_button_outer_for_xiaomi_redmi_k20_pro_black_by_maxbhi_com_12983.jpg?t=1731769349">
                                <h6>Volume Button Outer</h6>
                            </a>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="section-head text-center">
                <div style="padding-bottom: 30px;">
                    <div class="row" style="border: 1px solid #ededf5; margin: 0px;">
                        <div class="col-lg-12">
                            <h3 class="title"
                                style="font-size: 16px; color: #000; text-align: left; padding-top: 10px;">Battery for
                                {{ $models->name }}</h3>
                        </div>
                        <!-- 7 Columns for desktop and 3 columns on mobile -->
                        @if (empty($battery))
                            <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center p-2">
                                No products
                            </div>
                        @else
                            @foreach ($battery as $item)
                                <div class="col-lg-4 col-md-4 col-sm-4 col-4 text-center p-2">
                                    <a
                                        href="{{ route('search.model', ['slug' => $item->slug, 'model' => $models->name]) }}">
                                        <img src="{{ asset('storage/submodel-images/' . $item->photo) }}">
                                        <h6>{{ $item->name }}</h6>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                        {{-- <div class="col-lg-12 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/75/75/detailed/3538/back_panel_cover_for_xiaomi_redmi_k20_pro_blue_maxbhi_com_17672.jpg?t=1731769349">
                                <h6>Back Cover</h6>
                            </a>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="container-fluid">
            <div class="section-head text-center">
                <div style="padding-bottom: 30px;">
                    <div class="row" style="border: 1px solid #ededf5; margin: 0px;">
                        <div class="col-lg-12">
                            <h3 class="title"
                                style="font-size: 16px; color: #000; text-align: left; padding-top: 10px;">Internal
                                Components for Xiaomi Redmi K20 Pro</h3>
                        </div>
                         
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3744/lcd_flex_cable_for_xiaomi_redmi_k20_pro_by_maxbhi_com_22408.jpg?t=1731769463">
                                <h6>LCD Flex Cable</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3755/charging_connector_flex_pcb_board_for_xiaomi_redmi_k20_pro_by_maxbhi_com_46292.jpg?t=1731769462">
                                <h6>Charging Connector Flex PCB Board</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4596/power_button_flex_cable_for_xiaomi_redmi_k20_pro_on_off_flex_pcb_by_maxbhi_com_34403.jpg?t=1731769463">
                                <h6>Power Button Flex Cable</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3532/sim_card_holder_tray_for_xiaomi_redmi_k20_pro_blue_maxbhi_com_94982.jpg?t=1731769463">
                                <h6>Sim Tray Holder</h6>
                            </a>
                        </div>

                    </div>
                    <div class="row" style="border: 1px solid #ededf5; margin: 0px;">

                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3744/lcd_flex_cable_for_xiaomi_redmi_k20_pro_by_maxbhi_com_22408.jpg?t=1731769463">
                                <h6>LCD Flex Cable</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3755/charging_connector_flex_pcb_board_for_xiaomi_redmi_k20_pro_by_maxbhi_com_46292.jpg?t=1731769462">
                                <h6>Charging Connector Flex PCB Board</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4596/power_button_flex_cable_for_xiaomi_redmi_k20_pro_on_off_flex_pcb_by_maxbhi_com_34403.jpg?t=1731769463">
                                <h6>Power Button Flex Cable</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3532/sim_card_holder_tray_for_xiaomi_redmi_k20_pro_blue_maxbhi_com_94982.jpg?t=1731769463">
                                <h6>Sim Tray Holder</h6>
                            </a>
                        </div>

                    </div>
                    <div class="row" style="border: 1px solid #ededf5; margin: 0px;">

                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3744/lcd_flex_cable_for_xiaomi_redmi_k20_pro_by_maxbhi_com_22408.jpg?t=1731769463">
                                <h6>LCD Flex Cable</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3755/charging_connector_flex_pcb_board_for_xiaomi_redmi_k20_pro_by_maxbhi_com_46292.jpg?t=1731769462">
                                <h6>Charging Connector Flex PCB Board</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href=search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4596/power_button_flex_cable_for_xiaomi_redmi_k20_pro_on_off_flex_pcb_by_maxbhi_com_34403.jpg?t=1731769463">
                                <h6>Power Button Flex Cable</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3532/sim_card_holder_tray_for_xiaomi_redmi_k20_pro_blue_maxbhi_com_94982.jpg?t=1731769463">
                                <h6>Sim Tray Holder</h6>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="section-head text-center">
                <div style="padding-bottom: 30px;">
                    <div class="row" style="border: 1px solid #ededf5; margin: 0px;">
                        <div class="col-lg-12">
                            <h3 class="title"
                                style="font-size: 16px; color: #000; text-align: left; padding-top: 10px;">Repairing
                                Tools for Xiaomi Redmi K20 Pro</h3>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/11403/50ml_glue_adhesive_gum_for_xiaomi_redmi_k20_pro_by_maxbhicom.jpg?t=1731769463">
                                <h6>Glue for LCD and Touch</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3532/opening_tool_kit_for_xiaomi_redmi_k20_pro_with_screwdriver_set_by_maxbhicom.jpg?t=1731769463">
                                <h6>Opening Tool Set</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/11403/suction_cup_tool_for_xiaomi_redmi_k20_pro_by_maxbhicom.jpg?t=1731769880">
                                <h6>Suction Cup Tool</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/11403/32_pieces_screw_driver_set_for_xiaomi_redmi_k20_pro_by_maxbhicom.jpg?t=1731770405">
                                <h6>32 Pcs Screw Driver Set</h6>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="section-head text-center">
                <div style="padding-bottom: 30px;">
                    <div class="row" style="border: 1px solid #ededf5; margin: 0px;">
                        <div class="col-lg-12">
                            <h3 class="title"
                                style="font-size: 16px; color: #000; text-align: left; padding-top: 10px;">Accessories
                                for Xiaomi Redmi K20 Pro</h3>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3744/lcd_flex_cable_for_xiaomi_redmi_k20_pro_by_maxbhi_com_22408.jpg?t=1731769463">
                                <h6>LCD Flex Cable</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3755/charging_connector_flex_pcb_board_for_xiaomi_redmi_k20_pro_by_maxbhi_com_46292.jpg?t=1731769462">
                                <h6>Charging Connector Flex PCB Board</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4596/power_button_flex_cable_for_xiaomi_redmi_k20_pro_on_off_flex_pcb_by_maxbhi_com_34403.jpg?t=1731769463">
                                <h6>Power Button Flex Cable</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3532/sim_card_holder_tray_for_xiaomi_redmi_k20_pro_blue_maxbhi_com_94982.jpg?t=1731769463">
                                <h6>Sim Tray Holder</h6>
                            </a>
                        </div>

                    </div>
                    <div class="row" style="border: 1px solid #ededf5; margin: 0px;">

                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3744/lcd_flex_cable_for_xiaomi_redmi_k20_pro_by_maxbhi_com_22408.jpg?t=1731769463">
                                <h6>LCD Flex Cable</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3755/charging_connector_flex_pcb_board_for_xiaomi_redmi_k20_pro_by_maxbhi_com_46292.jpg?t=1731769462">
                                <h6>Charging Connector Flex PCB Board</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4596/power_button_flex_cable_for_xiaomi_redmi_k20_pro_on_off_flex_pcb_by_maxbhi_com_34403.jpg?t=1731769463">
                                <h6>Power Button Flex Cable</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3532/sim_card_holder_tray_for_xiaomi_redmi_k20_pro_blue_maxbhi_com_94982.jpg?t=1731769463">
                                <h6>Sim Tray Holder</h6>
                            </a>
                        </div>

                    </div>
                    <div class="row" style="border: 1px solid #ededf5; margin: 0px;">

                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3744/lcd_flex_cable_for_xiaomi_redmi_k20_pro_by_maxbhi_com_22408.jpg?t=1731769463">
                                <h6>LCD Flex Cable</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3755/charging_connector_flex_pcb_board_for_xiaomi_redmi_k20_pro_by_maxbhi_com_46292.jpg?t=1731769462">
                                <h6>Charging Connector Flex PCB Board</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/4596/power_button_flex_cable_for_xiaomi_redmi_k20_pro_on_off_flex_pcb_by_maxbhi_com_34403.jpg?t=1731769463">
                                <h6>Power Button Flex Cable</h6>
                            </a>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-4 col-4 text-center p-2">
                            <a href="search.php">
                                <img
                                    src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/3532/sim_card_holder_tray_for_xiaomi_redmi_k20_pro_blue_maxbhi_com_94982.jpg?t=1731769463">
                                <h6>Sim Tray Holder</h6>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="section-head text-center" style="padding-bottom: 30px;">
                <table class="w-100" style="border: 1px solid #edeff1;">
                    <tr>
                        <td colspan="2">
                            <h3 style="font-size: 16px; text-align: left; padding-left: 10px;">Others for Xiaomi Redmi
                                K20 Pro</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>
                                <a href="search.php">
                                    <img
                                        src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/7666/camera_motor_for_xiaomi_redmi_k20_pro_by_maxbhi_com_83886.jpg?t=1731769274">
                                    <h6>Camera Motor</h6>
                                </a>
                            </center>
                        </td>
                        <td>
                            <center>
                                <a href="search.php">
                                    <img
                                        src="https://d57avc95tvxyg.cloudfront.net/images/thumbnails/150/150/detailed/7666/camera_elevator_for_xiaomi_redmi_k20_pro_by_maxbhi_com_37293.jpg?t=1731771920">
                                    <h6>Camera Elevator</h6>
                                </a>
                            </center>
                        </td>
                    </tr>
                </table>
            </div>
        </div> -->

</div>
</section>

@include('spare-stream.include.footer')
<!-- Header End -->
</body>

</html>
