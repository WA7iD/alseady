@extends('dashboard.core.app')
@section('title', __('titles.Employment_Application Details'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.employment_application')</h1>
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
                        <div class="card-header">
                            <h3 class="card-title">@lang('titles.employment_application Details')</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-dark">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center">@lang('dashboard.Name')</span>
                                            <span class="info-box-number text-center mb-0">{{$employment_application->name}}</span>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-dark">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center">@lang('dashboard.created_at')</span>
                                            <span class="info-box-number text-center mb-0">{{$employment_application->created_at->diffForHumans()}}</span>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-dark">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center">@lang('dashboard.Phone')</span>
                                            <span class="info-box-number text-center mb-0">{{$employment_application->phone}}</span>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-dark">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center">@lang('dashboard.Email')</span>
                                            <span class="info-box-number text-center mb-0">{{$employment_application->email}}</span>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-dark">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center">@lang('dashboard.cv')</span>
                                            <span class="info-box-number text-center mb-0">{{$employment_application->cv}}</span>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-12 col-sm-4">
                                    <div class="info-box bg-dark">
                                        <div class="info-box-content">
                                            <span class="info-box-text text-center">@lang('dashboard.position')</span>
                                            <span class="info-box-number text-center mb-0">{{$employment_application->position->name_en}}</span>

                                        </div>
                                    </div>
                                </div>


                            </div>



                        </div>
                        <!-- /.card-body -->
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
