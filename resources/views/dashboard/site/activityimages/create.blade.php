@extends('dashboard.core.app')
@section('title', __('titles.Create activityimage'))

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
                    <h1>@lang('dashboard.activityimage')</h1>
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
                        <form action="{{ route('activityimages.store') }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">@lang('titles.Create') @lang('dashboard.activityimage')</h3>
                            </div>
                            <div class="card-body">
                                @csrf

                                {{-- <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <label for="exampleInputFile">@lang('dashboard.Image')</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input name="image" type="file" class="custom-file-input"
                                                        id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.path')@lang('dashboard.ar')</label>
                                            <input name="path" type="text" class="form-control" id="exampleInputName1"
                                                value="{{ old('path') }}" placeholder="" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Category </label>
                                        <select name="activity_id" class="form-control form-select">
                                            <option value=""> category</option>
                                            @foreach (App\models\Activity::all() as $category)
                                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('dashboard.Name')@lang('dashboard.en')</label>
                                            <input name="name_en" type="text" class="form-control"
                                                id="exampleInputEmail1" value="{{ old('name_en') }}" placeholder=""
                                                required>
                                        </div>
                                    </div> --}}
                                </div>
                                {{-- <div class="row">
                                    <div class="form-group">
                                        <label for="">Position </label>
                                        <select name="parent_id" class="form-control form-select">
                                            <option value="">position</option>
                                            @foreach (App\models\Position::all() as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}


                                <br>
                                <div class="row" id="package_inputs">

                                    {{-- Package Inputs Shows Here --}}

                                </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark">@lang('dashboard.Create')</button>
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
