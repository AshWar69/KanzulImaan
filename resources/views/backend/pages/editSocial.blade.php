@extends('backend.layouts.admin')
@section('content')
    <div class="col-12">
        <a href="{{ URL::to('ManageSocialPlatform') }}" type="button" class="btn mb-2 btn-outline-danger"><span
                class="fe fe-arrow-left-circle fe-16 mr-2"></span>Back</a>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Edit Social Platform</strong>
            </div>
            <div class="card-body">
                <form class="needs-validation" novalidate action="{{ route('editSocial') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername">Social Platform</label>
                            <select name="platform" class="form-control select2" id="validationCustom04" required>
                                <option @if($data->platform == "Facebook") selected @endif value="Facebook">Facebook</option>
                                <option @if($data->platform == "Instagram") selected @endif value="Instagram">Instagram</option>
                                <option @if($data->platform == "LinkedIn") selected @endif value="LinkedIn">LinkedIn</option>
                                <option @if($data->platform == "Youtube") selected @endif value="Youtube">Youtube</option>
                                <option @if($data->platform == "Twitter") selected @endif value="Twitter">Twitter</option>
                            </select>
                            <div class="invalid-feedback"> Please Select One Option At Least </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Social Platform Link</label>
                            <input type="url" class="form-control" id="exampleInputEmail1" value="{{$data->link}}" name="link" required>
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
