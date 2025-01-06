@include('admin.header')

<section class="content-header">
	<div class="content-header-left">
		<h1>View Colors</h1>
	</div>
	<div class="content-header-right">
		<a href="{{route('color.add')}}" class="btn btn-primary btn-sm">Add New</a>
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
			        <th>#</th>
			        <th>Color Name</th>
			        <th>Color Code</th>
			        <th>Action</th>
			    </tr>
			</thead>
            <tbody>
				@if (empty($colors))
				<tr>
					<td>No colors found
					</td>
				</tr>
				@else
				@foreach ($colors as $item)
				<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{$item->color_name}}</td>
					<td style="background:">{{$item->color_code}}</td>
					<td>
						<a href="{{route('color.edit',['id' => $item->id])}}" class="btn btn-primary btn-xs">Edit</a>
						<a href="{{route('color.delete',['id' => $item->id])}}" class="btn btn-danger btn-xs"  onclick="return confirm('Are you sure you want to delete?')">Delete</a>
					</td>
				</tr>
				@endforeach
				@endif
            </tbody>
          </table>
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
                Are you sure want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


@include('admin.footer')