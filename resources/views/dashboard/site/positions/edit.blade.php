@extends('dashboard.core.app')
@section('title', __('titles.Edit position'))

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
                    <h1>@lang('dashboard.positions')</h1>
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
                        <form action="{{ route('positions.update', $position) }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">@lang('titles.Edit') @lang('dashboard.positions')</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                @method('put')
                                {{-- <div class="row">
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
                                <br>
                                @if ($activtiy->image !== null)
                                    <div class="col-2">
                                        <img src="{{ url($activtiy->image) }}" style="width: 100%;">
                                    </div>
                                @endif --}}
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.Name')@lang('dashboard.ar')</label>
                                            <input name="name_ar" type="text" class="form-control"
                                                id="exampleInputName1" value="{{ $position->name_ar }}" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('dashboard.Name')@lang('dashboard.en')</label>
                                            <input name="name_en" type="text" class="form-control"
                                                id="exampleInputEmail1" value="{{ $position->name_en }}" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="form-group">
                                        <label for="">position </label>
                                        <select name="parent_id" class="form-control form-select">
                                            @foreach (App\models\Position::all() as $category)
                                            <option value="{{ $category->id }}"@selected(old('parent_id')==$category->id)>{{ $category->name_en }}</option>
                                            <option value="{{ $category->id }}"@selected(old('parent_id')==$category->id)>{{ $category->title_en }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                {{-- <div class="row">
                                    <div class="col-6">
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input name="is_active" type="checkbox" id="checkboxPrimary4"
                                                    {{ $category->is_active == 'on' ? 'checked' : ($category->is_active ? 'checked' : '') }}>
                                                <label for="checkboxPrimary4">@lang('dashboard.Activate')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <br>
                                <div class="row" id="package_inputs">

                                    {{-- Package Inputs Shows Here --}}

                                </div>
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
