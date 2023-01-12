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
                                <a href="{{ URL::to('AddBanner') }}" class="btn btn-primary ml-3" type="button">Add more
                                    +</a>
                            </div>
                        </div>
                    </div>
                    <!-- table -->
                    <table id="company" class="table table-responsive datatables" id="dataTable-1"
                        style="display: table; ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Banner</th>
                                <th>Heading</th>
                                <th>Subheading</th>
                                <th>Link</th>
                                <th>Button</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banners as $data)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <a href="{{URL::to('banner/edit/'.$data->id)}}" class="text-primary"> <i class="fe fe-edit"></i> </a>
                                        <a class="text-danger ml-3 del" id='{{ $data->id }}' href="#"> <i class="fe fe-trash"></i> </a>
                                    </td>
                                    <td> <img src="{{asset('back/images/banner_images/'.$data->image)}}" width="80" class="img-thumbnail"> </td>
                                    <td>{{ $data->heading }}</td>
                                    <td>{{ $data->subheading }}</td>
                                    <td>{{ $data->link }}</td>
                                    <td>{{ $data->button }}</td>
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
                    <h4 align="center" style="margin:0; text-align: justify">Are you sure you want to remove this Banner ?
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
        $('#company').DataTable({
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
                url: "banner/destroy/" + usid,
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
