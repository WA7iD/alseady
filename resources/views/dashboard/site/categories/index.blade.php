@extends('dashboard.core.app')
@section('title', __('dashboard.categories'))
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.categories')</h1>
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
                            <h3 class="card-title">@lang('dashboard.categories')</h3>
                            @permission('categories-create')
                                <div class="card-tools">
                                    <a href="{{ route('categories.create') }}" class="btn  btn-dark">@lang('dashboard.Create')</a>
                                </div>
                            @endpermission
                        </div>
                        <div class="card-body">

                            {{-- <form action="{{ route('categories.index') }}">
                                <div class="row">
                                    <div class="form-group col-6">
                                        <input value="{{ request('search') ?? '' }}" name="search" type="search"
                                            class="form-control" placeholder="@lang('dashboard.search_with_phone_number_or_name_or_email')">
                                    </div>
                                    <div class="form-group col-3">
                                        <button type="submit" class="btn btn-dark">@lang('dashboard.filter')</button>
                                    </div>
                                </div>
                            </form> --}}
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th style="width: 50px;">@lang('dashboard.Image')</th>
                                        <th>@lang('dashboard.title')</th>
                                        <th>@lang('dashboard.active')</th>
                                        <th>@lang('dashboard.Operations')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ url($category->image) ?? '' }}" style="width: 50px;" /></td>
                                            <td>{{ $category->title }}</td>
                                            <td>{{ $category->is_active_title }}</td>
                                            <td>
                                                <div class="operations-btns" style="">
                                                    @permission('categories-update')
                                                        <a href="{{ route('categories.edit', $category->id) }}"
                                                            class="btn  btn-dark">@lang('dashboard.Edit')</a>
                                                    @endpermission
                                                    @permission('categories-delete')
                                                        <button class="btn btn-dark waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target="#delete-modal{{ $loop->iteration }}">@lang('dashboard.delete')</button>
                                                        <div id="delete-modal{{ $loop->iteration }}"
                                                            class="modal fade modal2 " tabindex="-1" role="dialog"
                                                            aria-labelledby="myModalLabel" aria-hidden="true"
                                                            style="display: none;">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content float-left">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">تأكيد الحذف</h5>
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
                                                                            action="{{ route('categories.destroy', $category->id) }}"
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
                                                    @endpermission
                                                    {{-- <a target="_blank" href="{{ route('categories.loginFromAdmin', $category->id) }}" class="btn  btn-success">@lang('dashboard.Login')</a> --}}

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        @include('dashboard.core.includes.no-entries', ['columns' => 6])
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            {{ $categories->appends(request()->all())->links('pagination::simple-bootstrap-5') }}
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
