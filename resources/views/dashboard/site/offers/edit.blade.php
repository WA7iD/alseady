@extends('dashboard.core.app')
@section('title', __('titles.Edit offer'))

@section('css_addons')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <style>
        .image-container {
            position: relative;
            display: inline-block;
            /* Or 'block' depending on your layout */
        }

        .image-container img {
            display: block;
            width: 100%;
            /* Adjust as needed */
            height: auto;
            /* Adjust as needed */
        }

        .delete-icon {
            position: absolute;
            top: 0;
            left: 0;
            background-color: red;
            /* Or any color */
            color: white;
            /* Or any color */
            border: none;
            cursor: pointer;
            padding: 5px;
            border-radius: 50%;
            /* Optional for rounded icon */
        }
    </style>
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.offers')</h1>
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
                        <form action="{{ route('offers.update', $offer) }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">@lang('titles.Edit') @lang('dashboard.offer')</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-12">
                                        <label for="exampleInputFile">@lang('dashboard.images')</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="image" type="file" class="custom-file-input"
                                                    id="exampleInputFile" >
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @if ($offer->image !== null)
                                    <div class="row">
                                            <div class="col-2 image-container position-relative"
                                                id="image-container-{{ $image->id }}">
                                                <img src="{{ url($image->path) }}" style="width: 100%;">
  
                                            </div>
                                    </div>
                                @endif
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.title')@lang('dashboard.ar')</label>
                                            <input name="title_ar" type="text" class="form-control"
                                                id="exampleInputName1" value="{{ $offer->title_ar }}" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('dashboard.title')@lang('dashboard.en')</label>
                                            <input name="title_en" type="text" class="form-control"
                                                id="exampleInputEmail1" value="{{ $offer->title_en }}" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.description')@lang('dashboard.ar')</label>
                                            <textarea name="description_ar" type="text" class="form-control" id="exampleInputName1"
                                                value="{{ $offer->description_ar }}" placeholder="" required>{{ $offer->description_ar }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('dashboard.description')@lang('dashboard.en')</label>
                                            <textarea name="description_en" type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $offer->description_en }}" placeholder="" required>{{ $offer->description_en }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.price')</label>
                                            <input name="price" type="number" class="form-control" id="price"
                                                value="{{ $offer->price }}" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('dashboard.price_after_discount')</label>
                                            <input name="price_after_discount" type="number" class="form-control"
                                                id="price_after_discount" value="{{ $offer->price_after_discount }}"
                                                placeholder="{{ __('dashboard.optional') }}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    {{-- <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('dashboard.stock')</label>
                                            <input name="stock" type="number" class="form-control" id="stock"
                                                value="{{ $offer->stock }}"
                                                placeholder="{{ __('dashboard.optional') }}" required>
                                        </div>
                                    </div> --}}
                                    <div class="col-6">
                                        <div class="form-group clearfix">
                                            <div class="icheck-primary d-inline">
                                                <input name="is_active" type="checkbox" id="checkboxPrimary4"
                                                    {{ $offer->is_active == 'on' ? 'checked' : ($offer->is_active ? 'checked' : '') }}>
                                                <label for="checkboxPrimary4">@lang('dashboard.Activate')</label>
                                            </div>
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
    {{-- <script>
        function deleteImageFunction(imageId) {
            if (confirm('Are you sure you want to delete this image?')) {
                $.ajax({
                    url: "{{ route('offer_image.destroy', ['id' => ':imageId']) }}".replace(':imageId', imageId),
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        // Handle successful deletion
                        // E.g., remove the image element from the DOM
                        $('#image-container-' + imageId).remove();
                    },
                    error: function(response) {
                        // Handle errors
                        alert('Error: Image could not be deleted.');
                    }
                });
            }
        }
    </script> --}}



@endsection
