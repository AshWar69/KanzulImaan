@extends('backend.layouts.admin')
@section('content')
    <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body" style="overflow-x: scroll">
                    <!-- table -->
                    <table id="orderShowcase" class="table table-responsive datatables" id="dataTable-1"
                        style="display: table; ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order_Date</th>
                                <th>Order_No.</th>
                                <th>Total_Price</th>
                                <th>Payment_Method</th>
                                <th>Payment_ID</th>
                                <th>Tracking_ID</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $data)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ date("d/m/Y",strtotime($data->order_date)) }}</td>
                                    <td>{{ $data->order_no }}</td>
                                    <td>{{ $data->total }}</td>
                                    <td class="text-uppercase">{{ $data->payment_mode }}</td>
                                    <td>{{ $data->payment_id }}</td>
                                    <td>{{ $data->tracking_id }}</td>
                                    <td class="text-uppercase">{{ $data->status }}</td>
                                    <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="viewDetail/order_no={{ Crypt::encrypt($data->id) }}">View Details</a>
                                            <a class="dropdown-item" href="trackingId/order_no={{ Crypt::encrypt($data->id) }}">Update Tracking ID</a>
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

@endsection

@section('scripts')
    <script>
        $('#orderShowcase').DataTable({
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
