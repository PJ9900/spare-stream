@include('admin.header')

<section class="content-header">
    <div class="content-header-left">
        <h1>View Products</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('product.add') }}" class="btn btn-primary btn-sm">Add Product</a>
    </div>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-body table-responsive">
                    @if (Session::has('fail'))
                        <div class="callout callout-danger">
                            <p>
                                {{ Session::get('fail') }}
                            </p>
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="callout callout-success">
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th width="10">#</th>
                                <th>Product Name</th>
                                <th width="60">Price</th>
                                <th width="60">Brand</th>
                                <th>SKU </th>
                                <th>Quantity</th>
                                <th>Active?</th>
                                <!--<th>Category</th>-->
                                <th width="130">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($products->isEmpty())
                                <tr>
                                    <td>No products</td>
                                </tr>
                            @else
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->bname }}</td>
                                        <td>{{ $item->sku }}</td>
                                        <td>
                                            @if ($item->quantity < 2)
                                                <span class="badge badge-danger" style="background-color:red;"><abbr
                                                        title="Quantity Shortage !">{{ $item->quantity }}</abbr></span>
                                            @else
                                                <span class="badge badge-success"
                                                    style="background-color:green;">{{ $item->quantity }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status == 1)
                                                <span class="badge badge-success"
                                                    style="background-color:green;">Yes</span>
                                            @else
                                                <span class="badge badge-danger" style="background-color:red;">No</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (empty($item->variant_of))
                                                <a href="{{ route('product.variant', ['id' => $item->id]) }}"
                                                    class="btn btn-primary btn-xs">Variant</a>
                                            @endif
                                            <a href="{{ route('product.edit', ['id' => $item->id]) }}"
                                                class="btn btn-primary btn-xs">Edit</a>
                                            <a href="{{ route('product.delete', ['id' => $item->id]) }}"
                                                class="btn btn-danger btn-xs">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
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
                <p>Are you sure want to delete this item?</p>
                <p style="color:red;">Be careful! This product will be deleted from the order table, payment table, size
                    table, color table and rating table also.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')
