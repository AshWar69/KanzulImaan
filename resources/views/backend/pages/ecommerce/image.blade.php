@extends('backend.layouts.admin')
@section('content')
    <div class="col-12">
        <a href="{{ url()->previous() }}" type="button" class="btn mb-2 btn-outline-danger"><span
                class="fe fe-arrow-left-circle fe-16 mr-2"></span>Back</a>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Add Product Image</strong>
            </div>
            <div class="card-body">
                <form action="{{route('admin.uploadProductImage')}}" method="POST" class="dropzone bg-light rounded-lg" id="tinydash-dropzone" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="dz-message needsclick">
                        <div class="circle circle-lg bg-primary">
                            <i class="fe fe-upload fe-24 text-white"></i>
                        </div>
                        <h5 class="text-muted mt-4">Drop files here or click to upload</h5>
                    </div>
                </form>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endsection
