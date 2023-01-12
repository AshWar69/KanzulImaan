@extends('backend.layouts.admin')
@section('content')
    <div class="col-12">
        <a href="{{ URL::to('ManageOrganisation') }}" type="button" class="btn mb-2 btn-outline-danger"><span
                class="fe fe-arrow-left-circle fe-16 mr-2"></span>Back</a>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Add Company Details</strong>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate action="{{route('saveCompany')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Company Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="email" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="mobile" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="address" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">City</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="city" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">State</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="state" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Country</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="country" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="form-control" name="image" id="validatedCustomFile" required>
                        <div class="invalid-feedback">Please Upload Logo</div>
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
@endsection
