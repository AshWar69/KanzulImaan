@extends('backend.layouts.admin')
@section('content')
    <div class="col-12">
        <a href="{{ url()->previous() }}" type="button" class="btn mb-2 btn-outline-danger"><span
                class="fe fe-arrow-left-circle fe-16 mr-2"></span>Back</a>
        <div class="card shadow mb-4">
            <div class="card-header">
                <strong class="card-title">Add Library Book</strong>
            </div>
            <div class="card-body">
                <form id="bookSave" class="needs-validation" novalidate >
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Category</label>
                            <select class="form-control select2 select2-container--focus" name="category" required>
                                <option value="">Choose Category</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @if ($cat->childrenRecursive)
                                        @foreach ($cat->childrenRecursive as $child)
                                            @include('backend.layouts.select_child', [
                                                'childs' => $child,
                                                'cat' => $cat->category_name,
                                            ])
                                        @endforeach
                                    @endif
                                @endforeach
                            </select>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Book Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="name" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername">Author</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="author" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustomUsername">Publisher</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="publisher" required>
                            <div class="invalid-feedback"> Please Fill Up This Field </div>
                            <div class="valid-feedback"> Looks good! </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom02">Pages</label>
                            <input type="text" class="form-control" id="validationCustom02" name="pages" required>
                            <div class="valid-feedback"> Looks good! </div>
                            <div class="invalid-feedback"> Please Fill Up This Field. </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="exampleInputEmail1">Book Type</label>
                            <select class="form-control select2 select2-container--focus" name="type" required>
                                <option value="">Choose Book Type</option>
                                <option value="book">Book</option>
                                <option value="audio">Audio Book</option>
                            </select>
                            <div class="invalid-feedback"> Please select type of book </div>
                            <div class="valid-feedback"> Looks good! </div>
                            {{-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> --}}
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="validationTextarea">Description</label>
                        <input type="hidden" id="quill_html" name="description">
                        <div id="editor" style="min-height:100px;">
                        </div>
                        <div class="invalid-feedback"> Please enter a Description About This Product in the textarea.
                        </div>
                        <div class="valid-feedback"> Looks good! </div>
                    </div>
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
            // editor
            var editor = document.getElementById('editor');
            if (editor) {
                var toolbarOptions = [
                    [{
                        'font': []
                    }],
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{
                            'header': 1
                        },
                        {
                            'header': 2
                        }
                    ],
                    [{
                            'list': 'ordered'
                        },
                        {
                            'list': 'bullet'
                        }
                    ],
                    [{
                            'script': 'sub'
                        },
                        {
                            'script': 'super'
                        }
                    ],
                    [{
                            'indent': '-1'
                        },
                        {
                            'indent': '+1'
                        }
                    ], // outdent/indent
                    [{
                        'direction': 'rtl'
                    }], // text direction
                    [{
                            'color': []
                        },
                        {
                            'background': []
                        }
                    ], // dropdown with defaults from theme
                    [{
                        'align': []
                    }],
                    ['clean'] // remove formatting button
                ];
                var quill = new Quill(editor, {
                    modules: {
                        toolbar: toolbarOptions
                    },
                    theme: 'snow'
                });
            }
            quill.on('text-change', function(delta, oldDelta, source) {
                document.getElementById("quill_html").value = quill.root.innerHTML;
                //console.log(quill.root.innerHTML);
            });

            $('#bookSave').submit(function(e){
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: "{{route('admin.saveBook')}}",
                    data : $(this).serialize(),
                    success: function(response)
                    {
                        if (response.type == 'success') {
                            Swal.fire({
                                title: "Success",
                                text: response.msg,
                                icon: response.type,
                                confirmButtonText: 'Done'
                            });
                            $('#bookSave')[0].reset();
                            $("option").prop("selected", false).trigger( "change" );
                            quill.root.innerHTML = '';
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
