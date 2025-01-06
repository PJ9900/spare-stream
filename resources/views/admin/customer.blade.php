@include('admin.header')

<section class="content-header">
	<div class="content-header-left">
		<h1>View Customers</h1>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="10">#</th>
								<th width="180">Name</th>
								<th width="150">Email Address</th>
								<th width="60">Phone</th>
								<th width="60">City, State</th>
								<th width="60">Country, Pin</th>
								<th width="100">Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $item)
							<tr>
								<td>{{$loop->iteration}}</td>
								<td>{{$item->first_name}} {{$item->last_name}}</td>
								<td>{{$item->email}}</td>
								<td>{{$item->phone}}</td>
								<td>{{$item->ship_city}} </td>
								<td>{{$item->ship_country}} {{$item->zip}}</td>
								<td>
									<a href="#" disabled  class="btn btn-danger btn-xs" data-href="customer-delete.php?id=" data-toggle="modal" data-target="#confirm-delete">Delete</a>
								</td>
							</tr>		
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


@include('admin.footer')