@extends('dashboard.core.app')
@section('title', __('titles.Edit activtiy'))

@section('css_addons')
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endsection

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
                    <h1>@lang('dashboard.activties')</h1>
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
                        <form action="{{ route('activities.update', $activity) }}" method="post" autocomplete="off"
                            enctype="multipart/form-data">
                            <div class="card-header">
                                <h3 class="card-title">@lang('titles.Edit') @lang('dashboard.activtiy')</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-12">
                                        <label for="exampleInputFile">@lang('dashboard.images')</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input name="images[]" type="file" class="custom-file-input"
                                                    id="exampleInputFile" multiple>
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                @if ($activity->Images !== null)
                                    <div class="row">
                                        @foreach ($activity->Images as $image)
                                            <div class="col-2 image-container position-relative"
                                                id="image-container-{{ $image->id }}">
                                                <img src="{{ url($image->path) }}" style="width: 100%;">
                                                <button type="button"
                                                    class="btn btn-danger btn-xs delete-icon position-absolute"
                                                    onclick="deleteImageFunction({{ $image->id }});">X</button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                <br>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.title')@lang('dashboard.ar')</label>
                                            <input name="title_ar" type="text" class="form-control"
                                                id="exampleInputName1" value="{{ $activity->title_ar }}" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('dashboard.title')@lang('dashboard.en')</label>
                                            <input name="title_en" type="text" class="form-control"
                                                id="exampleInputEmail1" value="{{ $activity->title_en }}" placeholder=""
                                                required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputName1">@lang('dashboard.description')@lang('dashboard.ar')</label>
                                            <textarea name="description_ar" type="text" class="form-control" id="exampleInputName1"
                                                value="{{ $activity->description_ar }}" placeholder="" required>{{ $activity->description_ar }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">@lang('dashboard.description')@lang('dashboard.en')</label>
                                            <textarea name="description_en" type="text" class="form-control" id="exampleInputEmail1"
                                                value="{{ $activity->description_en }}" placeholder="" required>{{ $activity->description_en }}</textarea>
                                        </div>
                                    </div>
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

    <script>
        function deleteImageFunction(imageId) {
            if (confirm('Are you sure you want to delete this image?')) {
                $.ajax({
                    url: "{{ route('activity_image.destroy', ['id' => ':imageId']) }}".replace(':imageId', imageId),
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
    </script>


@endsection
