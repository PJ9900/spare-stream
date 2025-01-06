@include('spare-stream.include.header')
	<!-- Header End -->
	
	<style>
	    .order_status{
	        margin: 0 6px;
	    }
	</style>
	
	<div class="page-content bg-grey">
		<section class="content-inner-1 border-bottom">
			<div class="container-fluid breadcrum mb-0">
				<div >
					<ol class="d-flex ">
					    <li>
					        <a href="" style="color: #000;">Home &nbsp; / </a>
					    </li>
					    <li>
					        <a href="" style="color: #000;">&nbsp; Replacement Requests </a>
					    </li>
					</ol>
				</div>

			</div>
			
			<div class="container-fluid">
			    <div class="section-head text-center">
					<h2 class="title mb-4" style="font-size: 20px; text-transform: none; padding-top: 0px;">Replacement Requests</h2>
				</div>
				
				<div class="accordion mb-5" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="panelsStayOpen-headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        Search Option
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingOne">
      <div class="accordion-body">
         <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Quantity</label><br>
    <input type="number" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 42px; height: 32px;"> - <input type="number" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 42px; height: 32px;">
  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Replace request</label><br>
    <input type="text" style="width: 300px;" id="exampleInputPassword1">
  </div>
  
   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Return Status</label><br>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1">Completed</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
  <label class="form-check-label" for="inlineCheckbox2">Awaiting Shipment</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="option2">
  <label class="form-check-label" for="inlineCheckbox3">Declined</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="option2">
  <label class="form-check-label" for="inlineCheckbox4">Approved</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox5" value="option2">
  <label class="form-check-label" for="inlineCheckbox5">Requested</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox6" value="option2">
  <label class="form-check-label" for="inlineCheckbox6">Product Received</label>
</div>
  </div>
  
   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Period</label><br>
    <select>
        <option value="A" selected="selected">All</option>
            <optgroup label="=============">
                <option value="D" >This day</option>
                <option value="W" >This week</option>
                <option value="M" >This month</option>
                <option value="Y" >This year</option>
            </optgroup>
            <optgroup label="=============">
                <option value="LD" >Yesterday</option>
                <option value="LW" >Previous week</option>
                <option value="LM" >Previous month</option>
                <option value="LY" >Previous year</option>
            </optgroup>
            <optgroup label="=============">
                <option value="HH" >Last 24 hours</option>
                <option value="HW" >Last 7 days</option>
                <option value="HM" >Last 30 days</option>
            </optgroup>
            <optgroup label="=============">
                <option value="C" >Custom</option>
            </optgroup>
    </select>
  </div>
  
   <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Select dates</label><br>
    <input type="date" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 150px; height: 32px;"> - <input type="date" id="exampleInputEmail1" aria-describedby="emailHelp" style="width: 150px; height: 32px;">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Order ID</label><br>
    <input type="text" style="width: 300px;" id="exampleInputPassword1">
  </div>
  
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Order status</label><br>
   <div class="ty-status-info"><label><input type="checkbox" name="order_status[]" value="K" columns="4" class="order_status" />Partially Shipped</label>
<label><input type="checkbox" name="order_status[]" value="Z" columns="4" class="order_status" />TMP</label>
<label><input type="checkbox" name="order_status[]" value="Y" columns="4" class="order_status" />In Transit</label>
<label><input type="checkbox" name="order_status[]" value="X" columns="4" class="order_status" />RTO</label>
<label><input type="checkbox" name="order_status[]" value="W" columns="4" class="order_status" />Product Received Back</label>
<label><input type="checkbox" name="order_status[]" value="V" columns="4" class="order_status" />PSD</label>
<label><input type="checkbox" name="order_status[]" value="U" columns="4" class="order_status" />In Process #2</label>
<label><input type="checkbox" name="order_status[]" value="S" columns="4" class="order_status" />In Process</label>
<label><input type="checkbox" name="order_status[]" value="R" columns="4" class="order_status" />Refund to bank</label>
<label><input type="checkbox" name="order_status[]" value="Q" columns="4" class="order_status" />Completely Shipped</label>
<label><input type="checkbox" name="order_status[]" value="M" columns="4" class="order_status" />Completely Packed</label>
<label><input type="checkbox" name="order_status[]" value="L" columns="4" class="order_status" />Partially Refund iPoints</label>
<label><input type="checkbox" name="order_status[]" value="P" columns="4" class="order_status" />Approved</label>
<label><input type="checkbox" name="order_status[]" value="J" columns="4" class="order_status" />Refunded to eWallet</label>
<label><input type="checkbox" name="order_status[]" value="H" columns="4" class="order_status" />Partially Packed</label>
<label><input type="checkbox" name="order_status[]" value="G" columns="4" class="order_status" />Available</label>
<label><input type="checkbox" name="order_status[]" value="E" columns="4" class="order_status" />Procurement Delay</label>
<label><input type="checkbox" name="order_status[]" value="A" columns="4" class="order_status" />Partially Available</label>
<label><input type="checkbox" name="order_status[]" value="I" columns="4" class="order_status" />Cancelled</label>
<label><input type="checkbox" name="order_status[]" value="B" columns="4" class="order_status" />Backordered</label>
<label><input type="checkbox" name="order_status[]" value="D" columns="4" class="order_status" />Declined</label>
<label><input type="checkbox" name="order_status[]" value="F" columns="4" class="order_status" />UnPaid</label>
<label><input type="checkbox" name="order_status[]" value="O" columns="4" class="order_status" />Open</label>
<label><input type="checkbox" name="order_status[]" value="C" columns="4" class="order_status" />Completed</label></div>
  </div>
 
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
      </div>
    </div>
  </div>
</div>

				<table class="table table-bordered mb-5">
				    <tr>
				        <td>ID</td>
				        <td>Status</td>
				        <td>Customer</td>
				        <td>Date</td>
				        <td>Order ID</td>
				        <td>Quantity</td>
				    </tr>
				    <tr>
				        <td colspan="6" style="height: 100px;"><p class="text-center">No Return Requests Found</p></td>
				    </tr>
				</table>
			</div>
			
			</div>
		</section>
	
    @include('spare-stream.include.footer')
	<!-- Header End -->
</body>
</html>