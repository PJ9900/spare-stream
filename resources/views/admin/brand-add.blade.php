@include('admin.header')

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Brand</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('brands') }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" action="{{ route('brand.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Brand Name <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ old('name') }}" class="form-control" name="name">
                            </div>
                            @error('name')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
							<label for="" class="col-sm-3 control-label">Slug<span>*</span></label>
							<div class="col-sm-4">
								<input type="text" value="{{old('slug')}}" class="form-control" name="slug">
							</div>
							@error('slug')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
						</div> --}}
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Brand Photo<span>*</span></label>
                            <div class="col-sm-4">
                                <input type="file" value="{{ old('photo') }}" class="form-control" name="photo">
                            </div>
                            @error('photo')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Status<span>*</span></label>
                            <div class="col-sm-4">
                                <select name="status" class="form-control" style="width:auto;">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
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
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
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

@include('admin.footer')
