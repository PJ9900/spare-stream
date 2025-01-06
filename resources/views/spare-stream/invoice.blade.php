<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="container-fluid">
    <div class="col-md-12">
        <a href="javascript:;" id="printpagebutton" onclick="printpage()" class="btn btn-sm btn-white m-b-10 p-l-5">
            <i class="fa fa-print t-plus-1 fa-fw fa-lg"></i> Print Invoice
        </a>
        <div class="invoice">
            @if (Session::has('message'))
                <div class="alert alert-success">{{ Session::get('message') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <td style="width: 25%">
                        <h6><b>BILLED TO</b></h6>
                        <p style="margin-bottom: 8px; font-size: 15px;">
                            <b>Name: </b>{{ $user->first_name }} {{ $user->last_name }}</br>
                            Address: {{ $user->ship_address1 }}</br>
                            Phone: {{ $user->phone }}</br>
                        </p>
                    </td>
                    <td style="width: 25%">
                        <h6><b>SHIPPED TO</b></h6>
                        <p style="margin-bottom: 8px; font-size: 15px;">
                            <b>City : </b> {{ $order->city }}</br>
                            <b>State : </b> {{ $order->state }}</br>
                            <b>Country : </b> {{ $order->country }}</br>
                            <b>ZipCode : </b> {{ $order->ship_zip }}</br>
                            <b>Address : </b> {{ $order->shipping_address }}</br>
                        </p>
                    </td>
                    <td style="width: 25%">
                        <h6><b>SHIPPED FROM</b></h6>
                        {{-- <h6><b>Angel's Bakeree </b></h6>
                        <p style="margin-bottom: 3px; font-size: 15px;">Shop No. UGF 10, Angels Bakeree, Saviour
                            Greenarch Complex, opposite Cherry County Street, Techzone 4, Amrapali Dream Valley, Greater
                            Noida, Uttar Pradesh 201306</p>
                        <span>Email : angelbakeree@gmail.com</span> --}}
                    </td>
                    <td style="width: 25%">
                        <p style="margin-bottom: 8px; font-size: 15px;">
                            <b>Invoice No : {{ $order->invoice_number }} </b>
                        </p>
                        <p style="margin-bottom: 8px; font-size: 15px;">
                            <b>Order Date: {{ $order->created_at }}</b>
                        </p>
                        <p style="margin-bottom: 8px; font-size: 15px;">
                            <b>Invoice Date: {{ $order->created_at }}</b>
                        </p>
                    </td>
                </tr>
            </table>

            <div class="invoice-content">
                <div class="table-responsive">
                    <table class="table table-invoice table-bordered">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>SKU</th>
                                <th>Gross Amount (₹)</th>
                                <th>SGST %</th>
                                <th>SGST Amount</th>
                                <th>CGST %</th>
                                <th>CGST Amount</th>
                                <th>IGST %</th>
                                <th>IGST Amount</th>
                                <th>Total (₹)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total_invoice_amount = 0;
                            @endphp
                            @foreach ($orderItems as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->product_sku }}</td>
                                    <td>{{ $item->total_price }}</td>

                                    {{-- Check if the shipping state matches the GST state in the .env file --}}
                                    @if ($gstCalculator == $order->state)
                                        <td>9%</td>
                                        <td>{{ number_format($item->total_price * 0.09, 2) }}</td>
                                        <td>9%</td>
                                        <td>{{ number_format($item->total_price * 0.09, 2) }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ number_format($item->total_price + $item->total_price * 0.18, 2) }}
                                        </td>
                                    @else
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>18%</td>
                                        <td>{{ number_format($item->total_price * 0.18, 2) }}</td>
                                        <td>{{ number_format($item->total_price + $item->total_price * 0.18, 2) }}
                                        </td>
                                        @php
                                            $total_invoice_amount += $item->total_price + $item->total_price * 0.18;
                                        @endphp
                                        {{ number_format($total_invoice_amount, 2) }}
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <hr>

                <div class="row">
                    <div class="col-md-6 col-6"></div>
                    <div class="col-md-3 text-right col-3">
                        <h6>Total</h6>
                    </div>
                    <div class="col-md-3 text-center col-3">
                        <p style="margin-bottom: 3px;"><b>₹ {{ $total_invoice_amount }}</b></p>
                    </div>
                    <div class="col-md-6 col-6"></div>
                    <div class="col-md-3 text-right col-3">
                        <h6>Discount</h6>
                    </div>
                    <div class="col-md-3 text-center col-3">
                        <p style="margin-bottom: 3px;"><b>- ₹ </b></p>
                    </div>
                    <div class="col-md-6 col-6"></div>
                    <div class="col-md-3 text-right col-3">
                        <h6>Grand Total</h6>
                    </div>
                    <div class="col-md-3 text-center col-3">
                        <p style="margin-bottom: 3px;"><b>₹ {{ $total_invoice_amount }}</b></p>
                    </div>
                </div>
            </div>
            <p><b>Amount Chargeable (in words): </b></p>
        </div>
    </div>
</div>


<style>
    body {
        margin-top: 20px;
        background: #eee;
    }

    .invoice {
        background: #fff;
        padding: 20px
    }

    .invoice-company {
        font-size: 20px
    }

    .invoice-header {
        margin: 0 -20px;
        background: #f0f3f4;
        padding: 20px
    }

    .invoice-date,
    .invoice-from,
    .invoice-to {
        display: table-cell;
        width: 1%
    }

    .invoice-from,
    .invoice-to {
        padding-right: 20px
    }

    .invoice-date .date,
    .invoice-from strong,
    .invoice-to strong {
        font-size: 16px;
        font-weight: 600
    }

    .invoice-date {
        text-align: right;
        padding-left: 20px
    }

    .invoice-price {
        background: #f0f3f4;
        display: table;
        width: 100%
    }

    .invoice-price .invoice-price-left,
    .invoice-price .invoice-price-right {
        display: table-cell;
        padding: 20px;
        font-size: 20px;
        font-weight: 600;
        width: 75%;
        position: relative;
        vertical-align: middle
    }

    .invoice-price .invoice-price-left .sub-price {
        display: table-cell;
        vertical-align: middle;
        padding: 0 20px
    }

    .invoice-price small {
        font-size: 12px;
        font-weight: 400;
        display: block
    }

    .invoice-price .invoice-price-row {
        display: table;
        float: left
    }

    .invoice-price .invoice-price-right {
        width: 25%;
        background: #C0652E;
        color: #fff;
        font-size: 28px;
        text-align: right;
        vertical-align: bottom;
        font-weight: 500
    }

    .invoice-price .invoice-price-right small {
        display: block;
        opacity: .6;
        position: absolute;
        top: 10px;
        left: 10px;
        font-size: 12px
    }

    .invoice-footer {
        border-top: 1px solid #ddd;
        padding-top: 10px;
        font-size: 10px
    }

    .invoice-note {
        color: #999;
        margin-top: 80px;
        font-size: 85%
    }

    .invoice>div:not(.invoice-footer) {
        margin-bottom: 20px
    }

    .btn.btn-white,
    .btn.btn-white.disabled,
    .btn.btn-white.disabled:focus,
    .btn.btn-white.disabled:hover,
    .btn.btn-white[disabled],
    .btn.btn-white[disabled]:focus,
    .btn.btn-white[disabled]:hover {
        color: #2d353c;
        background: #fff;
        border-color: #d9dfe3;
    }
</style>

<script>
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        printButton.style.visibility = 'visible';
    }
</script>
