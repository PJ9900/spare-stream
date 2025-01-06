@include('admin.header')

<section class="content-header">
    <div class="content-header-left">
        <h1>Edit Mid Level Category</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('subcategories') }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="{{ route('subcategory.update', ['id' => $subcategory->id]) }}"
                method="post" enctype="multipart/form-data">
                @csrf
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label"> Category Name <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="category_id" class="form-control select2">
                                    <option value="">Select Category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}" @selected($item->id == $subcategory->category_id)>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('category_id')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Sub-Category Name
                                <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ $subcategory->name }}" class="form-control"
                                    name="name">
                            </div>
                            @error('name')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Existing Photo <span>*</span></label>
                            <div class="col-sm-4">
                                <img src="{{ asset('storage/subcategory-images/' . $subcategory->image) }}"
                                    width="100" alt="{{ $subcategory->name }}" srcset="">
                                <input type="hidden" value="{{ $subcategory->image }}" class="form-control"
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
                            <label for="" class="col-sm-3 control-label">Slug <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ $subcategory->slug }}" class="form-control"
                                    name="slug">
                            </div>
                            @error('slug')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Menu Priority <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="number" value="{{ $subcategory->menu_priority }}" class="form-control"
                                    name="menu_priority">
                            </div>
                            @error('menu_priority')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Show on menu <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="show_menu" class="form-control" style="width:auto;">
                                    <option @selected($subcategory->show_menu == '0') value="0">No</option>
                                    <option @selected($subcategory->show_menu == '1') value="1">Yes</option>
                                </select>
                            </div>
                            @error('show_menu')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Status <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="status" class="form-control" style="width:auto;">
                                    <option @selected($subcategory->status == '0') value="0">No</option>
                                    <option @selected($subcategory->status == '1') value="1">Yes</option>
                                </select>
                            </div>
                            @error('status')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Meta Keyword <span>*</span></label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control" rows="5" name="meta_keywords">{{ $subcategory->meta_keywords }}</textarea>
                            </div>
                            @error('meta_keywords')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Meta Description
                                <span>*</span></label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control" rows="5" name="meta_description">{{ $subcategory->meta_description }}</textarea>
                            </div>
                            @error('meta_description')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left"
                                    name="form1">Submit</button>
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
