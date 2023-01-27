@extends('backend.layouts.admin')
@section('content')
    <div class="col-12">
        <a href="{{ url()->previous() }}" type="button" class="btn mb-2 btn-outline-danger"><span
                class="fe fe-arrow-left-circle fe-16 mr-2"></span>Back</a>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Add Book Language & File</strong>
            </div>
            <div class="card-body">
                <form id="bookSave" class="needs-validation" novalidate enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$book->id}}">
                    <input type="hidden" name="type" value="{{$book->type}}">
                    @if ($book->type == 'book')
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="exampleInputEmail1">Language</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="lang" required>
                                <div class="invalid-feedback"> Please Fill Up This Field </div>
                                <div class="valid-feedback"> Looks good! </div>
                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustomUsername">File</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" accept="application/pdf" name="file" required>
                                <div class="invalid-feedback"> Please Fill Up This Field </div>
                                <div class="valid-feedback"> Looks good! </div>
                            </div>
                        </div>
                    @elseif($book->type == 'audio')
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="exampleInputEmail1">Language</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="lang" required>
                                <div class="invalid-feedback"> Please Fill Up This Field </div>
                                <div class="valid-feedback"> Looks good! </div>
                                {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustomUsername">File</label>
                                <input type="file" class="form-control" id="exampleInputEmail1" accept=".mp3,audio/*" name="file" required>
                                <div class="invalid-feedback"> Please Fill Up This Field </div>
                                <div class="valid-feedback"> Looks good! </div>
                            </div>
                        </div>
                    @endif
                    <button class="btn btn-primary" type="submit">Save</button>
                </form>
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
    </div>
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bookSave').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('admin.saveLanguage') }}",
                    data: formData,
                    cache: false,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.type == 'success') {
                            Swal.fire({
                                title: "Success",
                                text: response.msg,
                                icon: response.type,
                                confirmButtonText: 'Done'
                            });
                            $('#bookSave')[0].reset();
                        } else if (response.type == 'error') {
                            Swal.fire({
                                title: "Error",
                                text: response.msg,
                                icon: response.type,
                                confirmButtonText: 'Done'
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
