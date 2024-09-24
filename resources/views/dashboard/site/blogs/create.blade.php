@extends('dashboard.core.app')
@section('title', __('titles.Create blog'))

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
                    <h1>@lang('dashboard.blogs')</h1>
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
                        <form action="{{ route('blogs.store') }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">@lang('titles.Create') @lang('dashboard.blog')</h3>
                            </div>
                            <div class="card-body">
                                @csrf

                                <div class="form-group">
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
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.title')@lang('dashboard.ar')</label>
                                            <input name="title_ar" type="text" class="form-control"
                                                id="exampleInputName1" value="{{ old('title_ar') }}" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('dashboard.title')@lang('dashboard.en')</label>
                                            <input name="title_en" type="text" class="form-control"
                                                id="exampleInputEmail1" value="{{ old('title_en') }}" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.description')@lang('dashboard.ar')</label>
                                            <textarea name="description_ar" type="text" class="form-control" id="exampleInputName1"
                                                value="{{ old('description_ar') }}" placeholder="" required>{{ old('description_ar') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('dashboard.description')@lang('dashboard.en')</label>
                                            <textarea name="description_en" type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ old('description_en') }}" placeholder="" required>{{ old('description_en') }}</textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input name="is_active" type="checkbox" id="checkboxPrimary4"
                                                    {{ old('is_active') == 'on' ? 'checked' : '' }}>
                                                <label for="checkboxPrimary4">@lang('dashboard.Activate')</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

<script>
 // Corrected variable names and logic
const priceInput = document.getElementById('price');
const discountInput = document.getElementById('price_after_discount');

const form = document.querySelector('form');
form.addEventListener('submit', (event) => {
    const price = parseFloat(priceInput.value);
    const discount = parseFloat(discountInput.value);

    if (discount >= price) {
        // alert('Price after discount must be less than the original price.');
        alert('السعر بعد الخصم اكبر من السعر .');
        event.preventDefault(); // Prevent form submission
    }
});
</script>

@endsection
