@include('admin.header')

<section class="content-header">
    <div class="content-header-left">
        <h1>Add Model Accessories</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('submodels') }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>


<section class="content">

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="{{ route('submodel.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="box box-info">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label"> Brand Name <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="brand_id" class="form-control select2">
                                    <option value="">Select Brand</option>
                                    @foreach ($brands as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
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
                                </select>
                                {{-- <select name="model" class="form-control select2 mid-cat">
                                    <option value="">Choose Model</option>
                                    @foreach ($models as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select> --}}
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
                                    <option value="Display & Screens for">Display & Screens for</option>
                                    <option value="Body & Housings for">Body & Housings for</option>
                                    <option value="Battery for">Battery for</option>
                                </select>
                            </div>
                            @error('submodel')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Name<span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ old('name') }}" class="form-control" name="name">
                            </div>
                            @error('name')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
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
                        {{-- <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Slug <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" name="slug">
                            </div>
                            @error('slug')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div> --}}
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
