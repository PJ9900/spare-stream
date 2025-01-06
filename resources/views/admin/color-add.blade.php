@include('admin.header')


<section class="content-header">
	<div class="content-header-left">
		<h1>Add Color</h1>
	</div>
	<div class="content-header-right">
		<a href="color.php" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>


<section class="content">

	<div class="row">
		<div class="col-md-12">

			<form class="form-horizontal" action="{{route('color.store')}}" method="post">
				@csrf
				<div class="box box-info">
					<div class="box-body">
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Color Name <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="color_name" required>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label">Color Code <span>*</span></label>
							<div class="col-sm-4">
								<input type="text" class="form-control" name="color_code" required>
							</div>
						</div>
						<div class="form-group">
							<label for="" class="col-sm-2 control-label"></label>
							<div class="col-sm-6">
								<button type="submit" class="btn btn-success pull-left" name="form1">Submit</button>
							</div>
						</div>
					</div>
				</div>

			</form>


		</div>
	</div>

</section>

@include('admin.footer')