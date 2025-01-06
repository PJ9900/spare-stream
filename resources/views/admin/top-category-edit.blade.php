@include('admin.header')

<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Top Level Category</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('categories') }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="{{ route('category.update', ['id' => $category->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Category Name <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" value="{{ $category->name }}" name="name">
                            </div>
                            @error('name')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Slug <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ $category->slug }}" class="form-control" name="slug">
                            </div>
                            @error('slug')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Existing Photo <span>*</span></label>
                            <div class="col-sm-4">
                                <img src="{{ asset('storage/category-images/' . $category->photo) }}" width="100"
                                    alt="{{ $category->name }}" srcset="">
                                <input type="hidden" value="{{ $category->photo }}" class="form-control"
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
                            <label for="" class="col-sm-3 control-label">Menu Priority <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="number" value="{{ $category->menu_priority }}" class="form-control"
                                    name="menu_priority">
                            </div>
                            @error('menu_priority')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Status <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="status" class="form-control" style="width:auto;">
                                    <option value="1" @php echo $category->status == 1 ? 'selected' : ''; @endphp>
                                        Yes</option>
                                    <option value="0" @php echo $category->status == 0 ? 'selected' : ''; @endphp>
                                        No</option>
                                </select>
                            </div>
                            @error('status')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Show Menu? <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="show_menu" class="form-control" style="width:auto;">
                                    <option value="1"
                                        @php echo $category->show_menu == 1 ? 'selected' : ''; @endphp>Yes</option>
                                    <option value="0"
                                        @php echo $category->show_menu == 0 ? 'selected' : ''; @endphp>No</option>
                                </select>
                            </div>
                            @error('show_menu')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">is_featured <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="is_feature" class="form-control" style="width:auto;">
                                    <option value="1"
                                        @php echo $category->is_feature == 1 ? 'selected' : ''; @endphp>Yes</option>
                                    <option value="0"
                                        @php echo $category->is_feature == 0 ? 'selected' : ''; @endphp>No</option>
                                </select>
                            </div>
                            @error('is_feature')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Meta Keyword <span>*</span></label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control" rows="5" name="meta_keywords">{{ $category->meta_keywords }}</textarea>
                            </div>
                            @error('meta_keywords')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Meta Description
                                <span>*</span></label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control" rows="5" name="meta_description">{{ $category->meta_description }}</textarea>
                            </div>
                            @error('meta_description')
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
