@extends('layouts.admin')

@section('content')
    <x-page-header title="Categories" />
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="py-2 d-flex align-items-center justify-content-between">
                            <h4 class="card-title">@lang('All Categories')</h4>
                            <button class="btn btn-primary add-btn">@lang('Add Category')</button>
                        </div>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>@lang('#')</th>
                                        <th>@lang('Title')</th>
                                        <th>@lang('Description')</th>
                                        <th>@lang('Action')</th>
                                    </tr>
                                </thead>
                                <tbody class="category-table-body">
                                    @include('categories.list')
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
                    <h5 class="modal-title" id="categoryModalLabel">@lang('Add Category')</h5>
                    <button type="button" class="close close-modal">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="errorContainer" style="color: red;"></div>
                    <form id="categoryForm" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="categoryId" id="categoryId">
                                <label for="title" class="form-label">@lang('Title :')</label>
                                <input type="text" class="form-control" name="title" id="title"
                                    placeholder="Category title">
                            </div>
                            <div class="form-group">
                                <label for="description" class="form-label">@lang('Description :')</label>
                                <textarea name="description" class="form-control" placeholder="Category description" id="description" cols="30"
                                    rows="4"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" id="saveCategoryBtn" class="btn btn-primary">@lang('Save')</button>
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
                $modal.find('.modal-title').text("@lang('Add Category')");
                $form.attr('action', "{{ route('categories.store') }} ");
                $form.trigger('reset');
                $modal.modal('show');
            });

            $('body').on('click', '.edit-btn', function(e) {
                var category = $(this).data('category');
                var action = "{{ route('categories.update', ':id') }}";

                $form.find(`input[name=title]`).val(category.title);
                $form.find(`textarea[name=description]`).val(category.description);

                $modal.find('.modal-title').text("@lang('Edit Category')");
                $form.attr('action', action.replace(':id', category.id));
                $modal.modal('show');
            });

            $form.on('submit', function(e) {
                e.preventDefault();
                var data = new FormData(this);
                var id = $('#categoryId').val();
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
                            getCategoryList();
                            $modal.modal('hide');
                        }
                        alert(response.message);
                    }
                });
            });

            $('body').on('click', '.delete-btn', function() {
                var id = $(this).data('id');
                var action = "{{ route('categories.destroy', ':id') }}";

                if (confirm('Are you sure want to delete this category?')) {
                    $.ajax({
                        type: 'get',
                        url: action.replace(":id", id),
                        success: function(response) {
                            if (response.success) {
                                getCategoryList();
                                $modal.modal('hide');
                            }
                            alert(response.message);
                        },
                    })
                }
            });

            function getCategoryList() {
                $.ajax({
                    type: 'get',
                    url: "{{ route('categories.list') }}",
                    success: function(response) {
                        if (response.success) {
                            $(".category-table-body").html(response.html);
                        }
                    },
                })
            }

        });
    </script>
@endpush
