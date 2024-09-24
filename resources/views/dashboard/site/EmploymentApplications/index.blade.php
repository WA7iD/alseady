@extends('dashboard.core.app')
@section('title', __('titles.Employment_Application'))
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.employment_applications')</h1>
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
                            <h3 class="card-title">@lang('dashboard.employment_applications')</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>@lang('dashboard.Name')</th>
                                        <th>@lang('dashboard.Email')</th>
                                        <th>@lang('dashboard.Phone')</th>
                                        <th>@lang('dashboard.cv')</th>
                                        <th>@lang('dashboard.position')</th>
                                        <th>@lang('dashboard.created_at')</th>
                                        <th>@lang('dashboard.Operations')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($employment_applications as $key => $employment_application)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $employment_application['name'] }}</td>
                                            <td>{{ $employment_application['email'] }}</td>
                                            <td>{{ $employment_application['phone'] }}</td>
                                            <td>{{ $employment_application['cv'] }}</td>
                                            <td>{{ $employment_application->position->name_en ?? 'N/A' }}</td>
                                            <td>{{ $employment_application->created_at->diffForHumans() }}</td>
                                            <td>
                                                <div class="operations-btns" style="">
                                                    <a href="{{ route('employment_applications.show', $employment_application['id']) }}"
                                                        class="btn  btn-dark">@lang('dashboard.Show')</a>
                                                    @if (auth()->user()->hasPermission('employment_applications-delete'))
                                                        <button class="btn btn-dark waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target="#delete-modal{{ $key }}">@lang('dashboard.Delete')</button>
                                                        <div id="delete-modal{{ $key }}" class="modal fade modal2 "
                                                            tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                            aria-hidden="true" style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content float-left">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">@lang('dashboard.confirm_delete')</h5>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <p>@lang('dashboard.sure_delete')</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" data-dismiss="modal"
                                                                            class="btn btn-dark waves-effect waves-light m-l-5 mr-1 ml-1">
                                                                            @lang('dashboard.close')
                                                                        </button>
                                                                        <form
                                                                            action="{{ route('employment_applications.destroy', ['employment_application' => $employment_application->id]) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            {{ method_field('delete') }}
                                                                            <button type="submit"
                                                                                class="btn btn-danger">@lang('dashboard.Delete')</button>
                                                                        </form>
                                                                       

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        @include('dashboard.core.includes.no-entries', ['columns' => 7])
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            {{ $employment_applications->links() }}
                        </div>
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
