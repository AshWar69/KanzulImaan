@extends('backend.layouts.admin')

@section('content')
    <style>
        .tree {
            --spacing: 1.5rem;
            --radius: 10px;
        }

        .tree li {
            display: block;
            position: relative;
            padding-left: calc(2 * var(--spacing) - var(--radius) - 2px);
            margin-top: 5px;
        }

        .tree ul {
            margin-left: calc(var(--radius) - var(--spacing));
            padding-left: 0;
        }

        .tree ul li {
            border-left: 2px solid #ddd;
        }

        .tree ul li:last-child {
            border-color: transparent;
        }

        .tree ul li::before {
            content: '';
            display: block;
            position: absolute;
            top: calc(var(--spacing) / -2);
            left: -2px;
            width: calc(var(--spacing) + 2px);
            height: calc(var(--spacing) + 1px);
            border: solid #ddd;
            border-width: 0 0 2px 2px;
        }

        .tree summary {
            display: block;
            cursor: pointer;
            padding-top: 1.5px;
        }

        .tree summary::marker,
        .tree summary::-webkit-details-marker {
            display: none;
        }

        .tree summary:focus {
            outline: none;
        }

        .tree summary:focus-visible {
            outline: 1px dotted #000;
        }

        .tree li::after,
        .tree summary::before {
            content: '';
            display: block;
            position: absolute;
            top: calc(var(--spacing) / 2 - var(--radius));
            left: calc(var(--spacing) - var(--radius) - 1px);
            width: calc(2 * var(--radius));
            height: calc(2 * var(--radius));
            border-radius: 50%;
            background: #ddd;
        }

        .tree summary::before {
            content: '+';
            z-index: 1;
            background: #696;
            color: #fff;
            line-height: calc(2 * var(--radius) - 2px);
            text-align: center;
            padding-top: 2px;
        }

        .tree details[open]>summary::before {
            content: '−';
        }
    </style>
    <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body ">
                    <div class="toolbar row mb-3">
                        <div class="col ml-auto">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn mb-2 btn-outline-primary" data-toggle="modal"
                                    data-target="#categoryModal"> Add Parent Category </button>
                                <button type="button" class="btn mb-2 btn-outline-warning" data-toggle="modal"
                                    data-target="#subModal"> Add Sub Category </button>
                                <button type="button" class="btn mb-2 btn-outline-danger" data-toggle="modal"
                                    data-target="#deleteModal"> Delete Category </button>
                            </div>
                        </div>
                    </div>
                    <ul class="tree">
                        @foreach ($categories as $category)
                            <li>
                                @if ($category->childrenRecursive->isEmpty())
                                    {{ $category->category_name }}
                                @else
                                    <details @if ($category->childrenRecursive->isEmpty()) @else open @endif>
                                        <summary>{{ $category->category_name }}</summary>
                                        @if ($category->childrenRecursive)
                                            <ul>
                                                @foreach ($category->childrenRecursive as $child)
                                                    @include('backend.pages.library.child', [
                                                        'childs' => $child,
                                                    ])
                                                @endforeach
                                            </ul>
                                        @endif
                                    </details>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div> <!-- simple table -->
    </div> <!-- end section -->

    {{-- Parent Category Modal --}}
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Add Parent Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="html"></span>
                    <form id="parentCategory" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="category" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required>
                                <div class="invalid-feedback"> Please fill this field </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn mb-2 btn-primary">Save category</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Parent Category Modal --}}

    {{-- Sub Category Modal --}}
    <div class="modal fade" id="subModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Add Sub Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="shtml"></span>
                    <form id="subCategory" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Parent Category</label>
                                <select name="category_id" class="form-control" id="exampleInputEmail2" required>
                                    <option value="">Choose Parent Category</option>
                                    @foreach ($opt_category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"> Please Choose An Option </div>
                            </div>
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Category Name</label>
                                <input type="text" name="category" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" required>
                                <div class="invalid-feedback"> Please fill this field </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn mb-2 btn-primary">Save Sub Category</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Sub Category Modal --}}

    {{-- Delete Category Modal --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="verticalModalTitle">Delete Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span id="dhtml"></span>
                    <form id="deleteCategory" class="needs-validation" novalidate>
                        @csrf
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="exampleInputEmail1">Choose Category</label>
                                <select name="id" class="form-control" id="exampleInputEmail2" required>
                                    <option value="">Choose Category</option>
                                    @foreach ($opt_category as $cats)
                                        <option value="{{ $cats->id }}">{{ $cats->category_name }}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback"> Please Choose An Option </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn mb-2 btn-danger">Delete Category</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Delete Category Modal --}}
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            var scode = `<div class="alert alert-success" role="alert"> Data Saved Successfully </div>`;
            var dcode = `<div class="alert alert-success" role="alert"> Data Deleted Successfully </div>`;
            var ecode = `<div class="alert alert-danger" role="alert"> Some Error Occured </div>`;

            $('#parentCategory').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.saveCategory') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#html').empty();
                        if (response.type == 'success')
                            $('#html').append(scode);
                        else if (response.type == 'error')
                            $('#html').append(ecode);

                        $('#parentCategory')[0].reset();
                    }
                });
            });

            $('#subCategory').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.saveSubCategory') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#shtml').empty();
                        if (response.type == 'success')
                            $('#shtml').append(scode);
                        else if (response.type == 'error')
                            $('#shtml').append(ecode);
                    }
                });
            });

            $('#deleteCategory').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "{{ route('admin.delCategory') }}",
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#dhtml').empty();
                        if (response.type == 'success') {
                            $('#dhtml').append(dcode);
                            location.reload();
                        } else if (response.type == 'error')
                            $('#dhtml').append(ecode);
                    }
                });
            });
        });
    </script>
@endsection
