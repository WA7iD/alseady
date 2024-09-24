{{-- @extends('dashboard.core.app')
@section('title', __('titles.Create subscription'))

@section('css_addons')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection --}}

{{-- @section('content') --}}
    <!-- Content Header (Page header) -->
    {{-- <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.subscriptions')</h1>
                </div>
            </div>
        </div><!-- /.container-fluid --> --}}
    {{-- </section> --}}

    <!-- Main content -->
    {{-- <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="{{ route('subscriptions.store') }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">@lang('titles.Create') @lang('subscription')</h3>
                            </div>
                            <div class="card-body">
                                @csrf --}}

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
                                {{-- <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('name')</label>
                                            <input name="name" type="text" class="form-control" id="exampleInputName1"
                                                value="{{ old('name') }}" placeholder="" required>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('dashboard.title')@lang('dashboard.en')</label>
                                            <input name="title_en" type="text" class="form-control"
                                                id="exampleInputEmail1" value="{{ old('title_en') }}" placeholder=""
                                                required>
                                        </div>
                                    </div> --}}
                                {{-- </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('email')</label>
                                            <textarea name="email" type="text" class="form-control" id="exampleInputName1"
                                                value="{{ old('email') }}" placeholder="" required>{{ old('email') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('phone')</label>
                                            <textarea name="phone" type="text" class="form-control"
                                                id="exampleInputEmail1" value="{{ old('phone') }}" placeholder=""
                                                required>{{ old('phone') }}</textarea>
                                        </div>
                                    </div> --}}


                                    {{-- <div class="form-group">
                                        <label for="">offer </label>
                                        <select name="offer_id" class="form-control form-select">
                                            <option value=""> offer</option>
                                            @foreach (App\models\Offer::all() as $offer)
                                                <option value="{{ $offer->id }}">{{ $offer->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>


                                <br>
                                <div class="row" id="package_inputs"> --}}

                                    {{-- Package Inputs Shows Here --}}

                                {{-- </div>


                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-dark">@lang('dashboard.Create')</button>
                            </div>
                        </form>
                    </div> --}}
                    <!-- /.card -->
{{--
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection --}}

{{-- @section('js_addons')
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

@endsection --}}
