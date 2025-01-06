@include('admin.header')

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Top Level Category</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('categories') }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>


<section class="content">

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="{{ route('category.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Category Name <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ old('name') }}" class="form-control" name="name">
                            </div>
                            @error('name')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Slug <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" value="{{old('slug')}}" class="form-control" name="slug">
                            </div>
                            @error('slug')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
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
                                <input type="number" value="{{ old('menu_priority') }}" class="form-control"
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
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
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
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
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
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            @error('is_feature')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Meta Keyword <span>*</span></label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control" rows="5" name="meta_keywords">{{ old('meta_keywords') }}</textarea>
                            </div>
                            @error('meta_keywords')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Meta Description <span>*</span></label>
                            <div class="col-sm-4">
                                <textarea type="text" class="form-control" rows="5" name="meta_description">{{ old('meta_description') }}</textarea>
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

@include('admin.footer')
