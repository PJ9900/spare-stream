@include('admin.header')

<section class="content-header">
    <div class="content-header-left">
        <h1>View Mid Level Categories</h1>
    </div>
    <div class="content-header-right">
        <a href="{{ route('subcategory.add') }}" class="btn btn-primary btn-sm">Add New</a>
    </div>
</section>

<section class="content">

    <div class="row">
        <div class="col-md-12">


            <div class="box box-info">

                <div class="box-body table-responsive">
                    <table id="example1" class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>SubCategory Name</th>
                                <th>image Name</th>
                                <th>Show on menu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($subcategories->isEmpty())
                                <tr>
                                    <td class="text-center">No subcategories</td>
                                </tr>
                            @else
                                @foreach ($subcategories as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->show_menu ? 'Yes' : 'No' }}</td>
                                        <td></td>
                                        <td>
                                            <a href="{{ route('subcategory.edit', ['id' => $item->id]) }}"
                                                class="btn btn-primary btn-xs">Edit</a>
                                            <a href="{{ route('subcategory.delete', ['id' => $item->id]) }}"
                                                class="btn btn-danger btn-xs"
                                                data-href="{{ route('subcategory.delete', ['id' => $item->id]) }}">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
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
                <p style="color:red;">Be careful! All products and end level categories under this mid level category
                    will be deleted from all the tables like order table, payment table, size table, color table, rating
                    table etc.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


@include('admin.footer')
