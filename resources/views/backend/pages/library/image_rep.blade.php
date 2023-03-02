@extends('backend.layouts.admin')
@section('content')
    <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body" style="overflow-x: scroll">
                    <div class="toolbar row mb-3">
                        <div class="col ml-auto">
                            <div class="dropdown">
                                <a href="{{ URL::to('admin/LibraryShowcase') }}" type="button" class="btn mb-2 btn-outline-danger"><span
                                    class="fe fe-arrow-left-circle fe-16 mr-2"></span>Back</a>
                                <a href="{{ URL::to('admin/AddBookImage/'.$id) }}" class="btn btn-primary ml-3" type="button">Add more
                                    +</a>
                                {{-- <button class="btn btn-secondary dropdown-toggle" type="button" id="actionMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Action </button>
                          <div class="dropdown-menu" aria-labelledby="actionMenuButton">
                            <a class="dropdown-item" href="#">Export</a>
                            <a class="dropdown-item" href="#">Delete</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                          </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- table -->
                    <table id="productShowcase" class="table table-responsive datatables" id="dataTable-1"
                        style="display: table;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $data)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td><img style="height: 100px; width: 65px" src="{{ asset('back/images/library_images/'.$data->image) }}" class="img" ></td>
                                    <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item del" id='{{ $data->id }}' href="#">Remove</a>
                                        </div>
                                    </td>
                                </tr>
                                @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- simple table -->
    </div> <!-- end section -->


    <!--====================Delete Modal for Product================-->
    <div id="confirmModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" align="left">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <h4 align="center" style="margin:0; text-align: justify">Are you sure you want to remove this Book Images ?
                    </h4>
                </div>
                <div class="modal-footer">
                    <button class="button" name="ok_button" id="ok_button1">
                        <div class="trash">
                            <div class="top">
                                <div class="paper"></div>
                            </div>
                            <div class="box"></div>
                            <div class="check">
                                <svg viewBox="0 0 8 6">
                                    <polyline points="1 3.4 2.71428571 5 7 1"></polyline>
                                </svg>
                            </div>
                        </div>
                        <span id="btn-text">Delete Item</span>
                    </button>
                    {{-- <button type="button" name="ok_button" id="ok_button1" class="btn btn-danger">OK</button> --}}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('#productShowcase').DataTable({
            autoWidth: true,
            "lengthMenu": [
                [16, 32, 64, -1],
                [16, 32, 64, "All"]
            ]
        });



        //Deleting Part for table=========================================
        var usid;
        $(document).on('click', '.del', function() {

            usid = $(this).attr('id');
            $('#confirmModal').modal('show');
        });
        $('#ok_button1').click(function() {
            $.ajax({
                url: "../book_image/destroy/" + usid,
                beforeSend: function() {
                    var button = document.getElementById('ok_button1');
                    button.classList.add('delete');
                    setTimeout(() => button.classList.remove('delete'), 3200);
                    //e.preventDefault();
                    //$('#ok_button1').text('Deleting...');
                },
                success: function(data) {
                    setTimeout(function() {
                        $('#confirmModal').modal('hide');
                        $('#btn-text').text(' Item Deleted');
                        location.reload();//$('#productShowcase').DataTable().ajax;
                    }, 3200);
                    // if(data.type == 'success')
                    // {
                    //     $('#confirmModal').modal('hide');
                    //     $('#ok_button1').text('Ok');
                    //     $('#school_rep').DataTable().ajax.reload();
                    // }
                }
            })
        });
    </script>
@endsection
