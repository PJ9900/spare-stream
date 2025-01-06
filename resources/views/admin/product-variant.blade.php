@include('admin.header')

<section class="content-header">
    <div class="content-header-left">
        <h1>Product Variant</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('products') }}" class="btn btn-primary btn-sm">View All</a>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">

            <form class="form-horizontal" action="{{ route('product.variant', ['id' => $product->id]) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="box box-info">
                    <div class="box-body">
                        <input type="hidden" name="p_id" value="{{ $product->id }}">
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Category Name <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="cat_id" class="form-control select2 top-cat">
                                    <option value="">Category</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}" @selected($product->category_id == $item->id)>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('cat_id')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">SubCategory Name <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="mcat_id" class="form-control select2 mid-cat">
                                    @foreach ($subcategories as $item)
                                        <option value="{{ $item->id }}" @selected($product->subcategory_id == $item->id)>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('mcat_id')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Brand Name <span>*</span></label>
                            <div class="col-sm-4">
                                <select name="brand_id" class="form-control select2 mid-cat">
                                    @foreach ($brands as $item)
                                        <option value="{{ $item->id }}" @selected($product->brand_id == $item->id)>
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
                                        <option value="{{ $item->id }}" @selected($item->id == $product->model_id)>
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('model')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Product Name <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ $product->name }}" name="name" id="name"
                                    class="form-control">
                            </div>
                            @error('name')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Color</label>
                            <div class="col-sm-4">
                                <select name="color" class="form-control select2">
                                    <option value="">Select Color</option>
                                    @foreach ($colors as $item)
                                        <option value="{{ $item->id }}" @selected($product->color == $item->id)>
                                            {{ $item->color_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('color')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- <div class="form-group">
							<label for="" class="col-sm-3 control-label"> Discount Price <br><span style="font-size:10px;font-weight:normal;">(In Rs.)</span></label>
							<div class="col-sm-4">
								<input type="number"  value="{{$product->discounted_price}}" name="discount_price" class="form-control">
							</div>
							@error('discount_price')
                            <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
						</div> --}}
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Price <span>*</span><br><span
                                    style="font-size:10px;font-weight:normal;">(In Rs.)</span></label>
                            <div class="col-sm-4">
                                <input type="number" value="{{ $product->price }}" name="price"
                                    class="form-control">
                            </div>
                            @error('price')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">SKU <span>*</span></label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ $product->sku }}" name="sku" class="form-control">
                            </div>
                            @error('sku')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Quantity </label>
                            <div class="col-sm-4">
                                <input type="number" value="{{ $product->quantity }}" name="quantity"
                                    class="form-control">
                            </div>
                            @error('quantity')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Video Link</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ $product->video }}" name="video"
                                    class="form-control">
                            </div>
                            @error('video')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Product Images</label>
                            <div class="col-sm-4" style="padding-top:4px;">
                                <table id="ProductTable" style="width:100%;">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="upload-btn">
                                                    <input type="file" multiple name="photo[]"
                                                        style="margin-bottom:5px;">
                                                </div>
                                            </td>
                                            <td style="width:28px;"><a href="javascript:void()"
                                                    class="Delete btn btn-danger btn-xs">X</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-sm-2">
                                <input type="button" id="btnAddNew" value="Add Item"
                                    style="margin-top: 5px;margin-bottom:10px;border:0;color: #fff;font-size: 14px;border-radius:3px;"
                                    class="btn btn-warning btn-xs">
                            </div>
                            @error('photo')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Slug</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ $product->slug }}" name="slug"
                                    class="form-control">
                            </div>
                            @error('slug')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div id="dynamic-form">
                                <div class="section" id="section-1">
                                    <input type="text" name="heading1" placeholder="Section Heading">
                                    <div class="key-value" id="key-value-1">
                                        <input type="text" placeholder="Key" name="key-1[]">
                                        <input type="text" placeholder="Value" name="value-1[]">
                                        <button type="button" class="add-key-value"
                                            onclick="addKeyValue('key-value-1')">Add Key-Value</button>
                                    </div>
                                    <button type="button" onclick="addSection()">Add Section</button>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Details</label>
                            <div class="col-sm-8">
                                <textarea name="details" class="form-control" cols="30" rows="10" id="editor1">{{ $product->details }}</textarea>
                            </div>
                            @error('details')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Warrenty Policy</label>
                            <div class="col-sm-8">
                                <textarea name="warrenty_policy" class="form-control" cols="30" rows="10" id="editor2">{{ $product->warranty_policy }}</textarea>
                            </div>
                            @error('warrenty_policy')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Meta Keywords</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ $product->meta_keywords }}" name="meta_keywords"
                                    class="form-control">
                            </div>
                            @error('meta_keywords')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">Meta Description</label>
                            <div class="col-sm-4">
                                <input type="text" value="{{ $product->meta_description }}"
                                    name="meta_description" class="form-control">
                            </div>
                            @error('meta_description')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label">status</label>
                            <div class="col-sm-8">
                                <select name="status" class="form-control" style="width:auto;">
                                    <option value="1" @selected($product->status == 1)>Active</option>
                                    <option value="0" @selected($product->status == 0)>Inactive</option>
                                </select>
                            </div>
                            @error('status')
                                <div class="invalid-feedback text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-3 control-label"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-success pull-left">Add Product</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


        </div>
    </div>

</section>

@include('admin.footer')
