@include('admin.header')

<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Model Accessories</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('submodels') }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="{{ route('submodel.update', ['id' => $submodel->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label"> Brand Name <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="brand_id" class="form-control select2">
                                    @foreach ($brands as $item)
                                        <option value="{{ $item->id }}" @selected($item->id == $submodel->brand_id)>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('brand_id')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Model Name <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="model" class="form-control select2 mid-cat">
                                    @foreach ($models as $item)
                                        <option value="{{ $item->id }}" @selected($item->id == $submodel->model_id)>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('model')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Submodel Name<span>*</span></label>
                            <div class="col-sm-4">
                                <select name="submodel" class="form-control select2 mid-cat">
                                    <option value="">Choose SubModel</option>
                                    <option @selected($submodel->spare_name == 'Display & Screens for') value="Display & Screens for">Display & Screens
                                        for</option>
                                    <option @selected($submodel->spare_name == 'Body & Housings for') value="Body & Housings for">Body & Housings for
                                    </option>
                                    <option @selected($submodel->spare_name == 'Battery for') value="Battery for">Battery for</option>
                                </select>
                            </div>
                            @error('submodel')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Name<span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ $submodel->name }}" class="form-control" name="name">
                            </div>
                            @error('name')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Slug <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ $submodel->slug }}" class="form-control"
                                    name="slug">
                            </div>
                            @error('slug')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Existing Photo <span>*</span></label>
                            <div class="col-sm-4">
                                <img src="{{ asset('storage/submodel-images/' . $submodel->photo) }}" width="100"
                                    alt="{{ $submodel->name }}" srcset="">
                                <input type="hidden" value="{{ $submodel->photo }}" class="form-control"
                                    name="existing_photo">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Photo <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control" name="photo">
                            </div>
                            @error('photo')
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

<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
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
