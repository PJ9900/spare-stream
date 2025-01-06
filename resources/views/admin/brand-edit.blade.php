@include('admin.header')

<section class="content-header">
	<div class="content-header-left">
		<h1>Edit Brand</h1>
	</div>
	<div class="content-header-right">
		<a href="{{route('brands')}}" class="btn btn-primary btn-sm">View All</a>
	</div>
</section>

<section class="content">

  <div class="row">
    <div class="col-md-12">

        <form class="form-horizontal" action="{{route('brand.update',['id' => $brand->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box box-info">
                <div class="box-body">
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Brand Name <span>*</span></label>
                        <div class="col-sm-4">
                            <input type="text" value="{{$brand->name}}" class="form-control" name="name">
                        </div>
                        @error('name')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Slug<span>*</span></label>
                        <div class="col-sm-4">
                            <input type="text" value="{{$brand->slug}}" class="form-control" name="slug">
                        </div>
                        @error('slug')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Existing Brand Photo<span>*</span></label>
                        <div class="col-sm-4">
                            <img src="{{ asset('storage/brand-images/' . $brand->photo) }}" width="100" alt="{{$brand->name}}" >
                            <input type="hidden" value="{{$brand->photo}}" class="form-control" name="old_photo">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Brand Photo<span>*</span></label>
                        <div class="col-sm-4">
                            <input type="file" value="{{old('photo')}}" class="form-control" name="photo">
                        </div>
                        @error('photo')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Status<span>*</span></label>
                        <div class="col-sm-4">
                            <select name="status" class="form-control" style="width:auto;">
                                <option @selected($brand->status == '1') value="1">Active</option>
                                <option @selected($brand->status == '0') value="0">Inactive</option>
                            </select>
                        </div>
                        @error('status')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Is_Popular <span>*</span></label>
                        <div class="col-sm-4">
                            <select name="is_popular" class="form-control" style="width:auto;">
                                <option @selected($brand->is_popular == '1') value="1">Yes</option>
                                <option @selected($brand->is_popular == '0') value="0">No</option>
                            </select>
                        </div>
                        @error('is_popular')
                        <div class="invalid-feedback text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 control-label"></label>
                        <div class="col-sm-6">
                            <button type="submit" class="btn btn-success pull-left">Submit</button>
                        </div>
                    </div>
                </div>
            </div>

        </form>



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