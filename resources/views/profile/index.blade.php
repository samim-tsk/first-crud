@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-xlg-3 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <center class="m-t-30"> <img src="{{ __(auth()->user()->getImage()) }}" class="rounded-circle"
                                width="250" height="250" />
                            <h4 class="card-title m-t-10">{{ __(auth()->user()->name) }}</h4>
                        </center>
                    </div>
                    <div>
                        <hr>
                    </div>
                    <div class="card-body"> <small class="text-muted"> @lang('Email address') </small>
                        <h6>{{ __(auth()->user()->email) }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xlg-9 col-md-7">
                <div class="card">
                    <div class="">
                        <div class="">
                            <div class="card-body">
                                <form class="form-horizontal form-material" action="{{ route('profile.update') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label class="col-md-12">@lang('Name :')</label>
                                        <div class="col-md-12">
                                            <input type="text" name="name" class="form-control form-control-line"
                                                id="name" value="{{ __(auth()->user()->name) }}">
                                        </div>
                                        @error('name')
                                            <div class="text-danger">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="example-email" class="col-md-12">@lang('Email :')</label>
                                        <div class="col-md-12">
                                            <input type="email" class="form-control form-control-line" name="email"
                                                id="email" value="{{ __(auth()->user()->email) }}">
                                        </div>
                                        @error('email')
                                            <div class="text-danger">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12">@lang('Image')</label>
                                        <div class="col-md-12">
                                            <input type="file" name="image" class="form-control form-control-line">
                                        </div>
                                        @error('image')
                                            <div class="text-danger">{{ __($message) }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-12">
                                            <button type="submit" class="btn btn-success">@lang('Update Profile')</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
