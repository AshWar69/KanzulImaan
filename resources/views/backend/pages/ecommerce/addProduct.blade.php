@extends('backend.layouts.admin')
@section('content')
    <div class="col-12">
        <a href="{{ url()->previous() }}" type="button" class="btn mb-2 btn-outline-danger"><span
                class="fe fe-arrow-left-circle fe-16 mr-2"></span>Back</a>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Add Product</strong>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate action="{{route('saveProduct')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Product Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername">Language</label>
                            <select name="lang" class="form-control select2" id="validationCustom04" required>
                                <option selected value="">Choose...</option>
                                <option value="English">English</option>
                                <option value="Urdu">Urdu</option>
                                <option value="Arabic">Arabic</option>
                                <option value="Roman">Roman</option>
                            </select>
                                <div class="invalid-feedback"> Please select a language. </div>
                                <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Price</label>
                            <input type="number" class="form-control" step="0.01" min="1" name="price" id="validationCustom01" required>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please Fill Up Price. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Format</label>
                            <input type="text" class="form-control" id="validationCustom02" name="format" required>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please Fill Up This Field. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Author</label>
                            <input type="text" class="form-control" name="author" id="validationCustom01" required>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please Fill Up This Field. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Pages</label>
                            <input type="text" class="form-control" id="validationCustom02" name="pages" required>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please Fill Up This Field. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">Size</label>
                            <input type="text" class="form-control" name="size" id="validationCustom01" required>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please Fill Up This Field. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Publication</label>
                            <input type="text" class="form-control" id="validationCustom02" name="publication" required>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please Fill Up This Field. </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationTextarea">Description</label>
                        <textarea name="description" class="form-control" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                        <div class="invalid-feedback"> Please enter a Description About This Product in the textarea. </div>
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="form-control" name="images[]" multiple id="validatedCustomFile" required>
                        <div class="invalid-feedback">Please Upload Image</div>
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
@endsection
