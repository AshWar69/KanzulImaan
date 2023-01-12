@extends('backend.layouts.admin')
@section('content')
<main id="content">
    <a href="{{ url()->previous() }}" type="button" class="btn mb-2 btn-outline-danger"><span
        class="fe fe-arrow-left-circle fe-16 mr-2"></span>Back</a>
    <div class="bg-gray-200 space-bottom-3">
        <div class="container card">
            <div class="card-header">
                <h2 class="font-weight-medium font-size-7 text-center mt-lg-1">Order Details</h2>
            </div>
            <div class="card-body">
                <div class="bg-white pt-6 border">
                    <div class="border-bottom mb-5 pb-6">
                        <div class="px-3 px-md-4">
                            <div class="ml-md-2">
                                @php $sub=0; @endphp
                                @foreach ($orders->orderItems as $order)
                                    <div class="d-flex justify-content-between mb-4 mt-2">
                                        <div class="d-flex align-items-baseline">
                                            <div>
                                                <h6 class="font-size-2 font-weight-normal mb-1">
                                                    {{ $order->products->product_name }}</h6>
                                                <span class="font-size-2 text-gray-600">({{ $order->products->format }},
                                                    {{ $order->products->language }})</span>
                                            </div>
                                            <span
                                                class="font-size-2 ml-4 ml-md-8 text-black">x{{ $order->quantity }}</span>
                                        </div>
                                        <span class="font-weight-medium font-size-2">₹
                                            {{ $order->products->price }}</span>
                                    </div>
                                    @php $sub += $order->quantity*$order->price; @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="border-bottom mb-5 pb-5">
                        <ul class="list-unstyled px-3 pl-md-5 pr-md-4 mb-0">
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium font-size-2">Subtotal:</span>
                                <span class="font-weight-medium font-size-2">₹{{ $sub }}</span>
                            </li>
                            <li class="d-flex justify-content-between py-2">
                                <span class="font-weight-medium font-size-2">Shipping:</span>
                                <span class="font-weight-medium font-size-2">Free Shipping</span>
                            </li>
                            <li class="d-flex justify-content-between pt-2">
                                <span class="font-weight-medium font-size-2">Payment Method:</span>
                                <span
                                    class="font-weight-medium font-size-2 text-uppercase">{{ $orders->payment_mode }}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="border-bottom mb-5 pb-4">
                        <div class="px-3 pl-md-5 pr-md-4">
                            <div class="d-flex justify-content-between">
                                <span class="font-size-2 font-weight-medium">Total</span>
                                <span class="font-weight-medium fon-size-2">₹{{ $orders->total }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="px-3 pl-md-5 pr-md-4 mb-6 pb-xl-1">
                        <div class="row row-cols-1 row-cols-md-2">
                            <div class="col">
                                <div class="mb-6 mb-md-0">
                                    <h6 class="font-weight-medium font-size-22 mb-3">Billing Address
                                    </h6>
                                    <address class="d-flex flex-column mb-0">
                                        <span class="text-gray-600 font-size-2">{{ $user_details->first_name }}
                                            {{ $user_details->last_name }}</span>
                                        <span class="text-gray-600 font-size-2">{{ $user_details->add1 }},</span>
                                        @if ($user_details->add2 > '')
                                            <span class="text-gray-600 font-size-2">{{ $user_details->add2 }},</span>
                                        @endif
                                        <span class="text-gray-600 font-size-2">{{ $user_details->city }}
                                            {{ $user_details->postal }}</span>
                                        <span class="text-gray-600 font-size-2">India</span>
                                    </address>
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="font-weight-medium font-size-22 mb-3">Shipping Address
                                </h6>
                                <address class="d-flex flex-column mb-0">
                                    <span class="text-gray-600 font-size-2">{{ $user_details->first_name }}
                                        {{ $user_details->last_name }}</span>
                                    <span class="text-gray-600 font-size-2">{{ $user_details->add1 }},</span>
                                    @if ($user_details->add2 > '')
                                        <span class="text-gray-600 font-size-2">{{ $user_details->add2 }},</span>
                                    @endif
                                    <span class="text-gray-600 font-size-2">{{ $user_details->city }}
                                        {{ $user_details->postal }}</span>
                                    <span class="text-gray-600 font-size-2">India</span>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

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
