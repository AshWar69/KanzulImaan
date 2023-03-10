@extends('backend.layouts.admin')
@section('content')
    <div class="col-12">
        <a href="{{ URL::to('admin/ManageBanner') }}" type="button" class="btn mb-2 btn-outline-danger"><span
                class="fe fe-arrow-left-circle fe-16 mr-2"></span>Back</a>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Add Banner</strong>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate action="{{ route('admin.saveBanner') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Heading</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="heading" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Sub Heading</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="subheading" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Banner Image</label>
                            <input type="file" class="form-control" name="image" id="validatedCustomFile" required>
                            <div class="invalid-feedback">Please Upload Banner Image</div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Want Button ?</label>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="button" value="Yes"
                                    class="custom-control-input" required onclick="document.getElementById('link').style.display = 'block' ">
                                <label class="custom-control-label" for="customRadio1">Yes</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="button" value="No"
                                    class="custom-control-input" required onclick="document.getElementById('link').style.display = 'none' ">
                                <label class="custom-control-label" for="customRadio2">No</label>
                            </div>
                            <div class="invalid-feedback"> Please Select One Option </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div id="link" style="display: none;" class="col-md-6 mb-3">
                            <label for="validationCustomUsername">Link</label>
                            <select name="link" class="form-control select2" id="validationCustom04" required>
                                <option selected value="">Choose...</option>
                                <option value="AboutUs">About Us</option>
                                <option value="ContactUs">Contact Us</option>
                                <option value="QuranStore">Shop Now</option>
                                <option value="Bookslibrary">Explore Library</option>
                            </select>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
@endsection
@section('scripts')
    <script>
        // $("input:radio[name='button']").on("change",function(){
        //     if(this.value == 'Yes')
        //     {
        //         $('#link').style.display = "block";
        //     }
        //     else if(this.value == 'No')
        //         $('#link').style.display = "none";
        // });
    </script>
@endsection
