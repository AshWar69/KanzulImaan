@extends('backend.layouts.admin')
@section('content')
    <div class="col-12">
        <a href="{{ URL::to('ManageOrganisation') }}" type="button" class="btn mb-2 btn-outline-danger"><span
                class="fe fe-arrow-left-circle fe-16 mr-2"></span>Back</a>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Edit Company Details</strong>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate action="{{route('editCompany')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Company Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$data->company_name}}" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="email" value="{{$data->email}}" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="mobile" value="{{$data->mobile}}" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="address" value="{{$data->address}}" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">City</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="city" value="{{$data->city}}" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">State</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="state" value="{{$data->state}}" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Country</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="country" value="{{$data->country}}" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Want To Change Uploaded Image ? </label><br>
                        <input type="radio" class="form-check-input ml-5" id="formradioRight1" name="img" value="Yes"><label class="form-check-label ml-1">Yes</label><br>
                        <input type="radio" class="form-check-input ml-5" id="formradioRight2" name="img" value="No"><label class="form-check-label ml-1">No</label>
                    </div>
                    <div class="col-md-6">
                        <label>Uploaded Image</label>
                        <img src="{{asset('back/images/company_images/'.$data->image)}}" class="img-thumbnail bg-dark mt-2" style="width: 200px; height: auto"/>
                    </div>
                    <div class="custom-file mb-3" id="upimg">

                        <div class="invalid-feedback">Please Upload Logo</div>
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
@endsection

@section('scripts')
    <script>
        $("input:radio[name='img']").on("change",function(){
            if(this.value == 'Yes')
            {
                $('#upimg').empty();
                $('#upimg').append(`
                        <label class="form-label">Upload Image</label>
                        <input type="file" class="form-control mb-2" name="image" id="validatedCustomFile" required>`
                        );
            }
            else if(this.value == 'No')
                $('#upimg').empty();
        });
    </script>
@endsection
