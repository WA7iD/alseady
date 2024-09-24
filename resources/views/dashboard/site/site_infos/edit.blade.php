@extends('dashboard.core.app')
@section('title', __('titles.Edit site_info'))

@section('css_addons')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.site_info')</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('site_info.update', $site_info) }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">@lang('titles.Edit') @lang('dashboard.site_info')</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <label for="exampleInputFile">@lang('dashboard.logo')</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="logo" type="file" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                        @if ($site_info->logo !== null)
                                            <div class="col-2">
                                                <img src="{{ url($site_info->logo) }}" style="width: 100%;">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label for="exampleInputFile">@lang('dashboard.logo_footer')</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="logo_footer" type="file" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                        @if ($site_info->logo_footer !== null)
                                            <div class="col-2">
                                                <img src="{{ url($site_info->logo_footer) }}" style="width: 100%;">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <label for="exampleInputFile">@lang('dashboard.fav_icon')</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="fav_icon" type="file" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                        @if ($site_info->fav_icon !== null)
                                            <div class="col-2">
                                                <img src="{{ url($site_info->fav_icon) }}" style="width: 100%;">
                                            </div>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.name')@lang('dashboard.ar')</label>
                                            <input name="name_ar" type="text" class="form-control" id="exampleInputName1"
                                                value="{{ $site_info->name_ar }}" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('dashboard.name')@lang('dashboard.en')</label>
                                            <input name="name_en" type="text" class="form-control"
                                                id="exampleInputEmail1" value="{{ $site_info->name_en }}" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.google_play_link')</label>
                                            <textarea name="google_play_link" type="text" class="form-control" id="exampleInputName1"
                                                value="{{ $site_info->google_play_link }}" placeholder="" required>{{ $site_info->google_play_link }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.app_store_link')</label>
                                            <textarea name="app_store_link" type="text" class="form-control" id="exampleInputName1"
                                                value="{{ $site_info->app_store_link }}" placeholder="" required>{{ $site_info->google_play_link }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark">@lang('dashboard.Edit')</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('js_addons')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
            $('.select2').select2({
                language: {
                    searching: function() {}
                },
            });
        });
    </script>

@endsection
