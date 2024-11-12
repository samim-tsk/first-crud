@extends('layouts.admin')

@section('content')

<x-page-header title="Brands" />
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="py-2 d-flex align-items-center justify-content-between">
                        <h4 class="card-title">@lang('All Brands')</h4>
                        <button class="btn btn-primary add-btn">@lang('Add Brand')</button>
                    </div>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>@lang('#')</th>
                                    <th>@lang('Title')</th>
                                    <th>@lang('Description')</th>
                                    <th>@lang('Category')</th>
                                    <th>@lang('Logo')</th>
                                    <th>@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody class="brand-table-body">
                                @include('brands.list')
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="brandModalLabel">@lang('Add Brand')</h5>
                <button type="button" class="close close-modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="errorContainer"></div>
                <form id="brandForm" enctype="multipart/form-data" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" name="brandId" id="brandId">
                            <label for="title" class="form-label">@lang('Title :')</label>
                            <input type="text" class="form-control" name="title" id="title"
                                placeholder="Category title">
                        </div>
                        <div class="form-group">
                            <label for="category" class="form-label">@lang('Category :')</label>
                            <select name="category_id" class="form-control" id="category_id">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ __($category->id) }}">{{ __($category->title) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">@lang('Description :')</label>
                            <textarea name="description" class="form-control" placeholder="Category description" id="description" cols="30"
                                rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image" class="form-label">@lang('Logo :')</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div id="imgContainer">

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="brandModalBtn">@lang('Save')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            var $modal = $('.modal');
            var $form = $modal.find('form');

            $('body').on('click', '.add-btn', function(e) {
                $modal.find('.modal-title').text("@lang('Add Brand')");
                $form.attr('action', "{{ route('brands.store') }} ");
                $form.trigger('reset');
                $modal.modal('show');
            });

            $('body').on('click', '.edit-btn', function(e) {
                var brand = $(this).data('brand');
                var action = "{{ route('brands.update', ':id') }}";

                $form.find(`input[name=title]`).val(brand.title);
                $form.find(`textarea[name=description]`).val(brand.description);
                $form.find(`select[name=category_id]`).val(brand.category_id);

                $modal.find('.modal-title').text("@lang('Edit  Brand')");
                $form.attr('action', action.replace(':id', brand.id));
                $modal.modal('show');
            });

            $('#image').on('change', function(event) {
                var file = event.target.files[0];
                $('#imgContainer img').remove();
                if (file && file.type.startsWith('image/')) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $("<img />", {
                            src: e.target.result,
                            alt: "Image description",
                            width: 80,
                            height: 60
                        }).appendTo("#imgContainer");
                    };

                    reader.readAsDataURL(file);
                } else {
                    $('#imgContainer img').remove();
                }

            });

            $form.on('submit', function(e) {
                e.preventDefault();
                var data = new FormData(this);
                var brandId = $('#brandId').val();
                var url = $(this).attr('action');
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    processData: false,
                    contentType: false,
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            getBrnadList();
                            $modal.modal('hide');
                        }
                        alert(response.message);
                    }
                });
            });

            $('body').on('click','.delete-btn', function() {
                var id = $(this).data('id');
                var action = "{{ route('brands.destroy', ':id') }}";

                if (confirm('Are you sure want to delete this brand?')) {
                    $.ajax({
                        type: 'get',
                        url: action.replace(":id", id),
                        success: function(response) {
                            if (response.success) {
                                getBrnadList();
                                $modal.modal('hide');
                            }
                            alert(response.message);
                        },
                    })
                }
            });

            function getBrnadList() {
                $.ajax({
                    type: 'get',
                    url: "{{ route('brands.list') }}",
                    success: function(response) {
                        if (response.success) {
                            $(".brand-table-body").html(response.html);
                        }
                    },
                })
            }
        });
    </script>
@endpush
