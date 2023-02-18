@extends('backend.layouts.admin')
@section('content')
    <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body" style="overflow-x: scroll">
                    @if($companies->count() == 0)
                    <div class="toolbar row mb-3">
                        <div class="col ml-auto">
                            <div class="dropdown">
                                <a href="{{ URL::to('admin/AddOrganisation') }}" class="btn btn-primary ml-3" type="button">Add more
                                    +</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    <!-- table -->
                    <table id="company" class="table table-responsive datatables" id="dataTable-1"
                        style="display: table; ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Action</th>
                                <th>Company_Name</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Email</th>
                                <th>Mobile_No.</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $data)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td> <a href="{{URL::to('admin/company/edit/'.$data->id)}}" class="text-primary"> <i class="fe fe-edit"></i> </a> </td>
                                    <td>{{ $data->company_name }}</td>
                                    <td>{{ $data->address }}</td>
                                    <td>{{ $data->city }}</td>
                                    <td>{{ $data->state }}</td>
                                    <td>{{ $data->country }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->mobile }}</td>
                                    <td>{{$data->status}}</td>
                                </tr>
                                @php $i++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- simple table -->
    </div> <!-- end section -->

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
        // var usid;
        // $(document).on('click', '.del', function() {

        //     usid = $(this).attr('id');
        //     $('#confirmModal').modal('show');
        // });
        // $('#ok_button1').click(function() {
        //     $.ajax({
        //         url: "product/destroy/" + usid,
        //         beforeSend: function() {
        //             var button = document.getElementById('ok_button1');
        //             button.classList.add('delete');
        //             setTimeout(() => button.classList.remove('delete'), 3200);
        //             //e.preventDefault();
        //             //$('#ok_button1').text('Deleting...');
        //         },
        //         success: function(data) {
        //             setTimeout(function() {
        //                 $('#confirmModal').modal('hide');
        //                 $('#btn-text').text(' Item Deleted');
        //                 location.reload();//$('#productShowcase').DataTable().ajax;
        //             }, 3200);
        //             // if(data.type == 'success')
        //             // {
        //             //     $('#confirmModal').modal('hide');
        //             //     $('#ok_button1').text('Ok');
        //             //     $('#school_rep').DataTable().ajax.reload();
        //             // }
        //         }
        //     })
        // });
    </script>
@endsection
