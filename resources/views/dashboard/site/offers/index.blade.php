@extends('dashboard.core.app')
@section('title', __('dashboard.offers'))
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
                        <div class="card-header">
                            <h3 class="card-title">@lang('dashboard.offers')</h3>
                            @permission('offers-create')
                                <div class="card-tools">
                                    <a href="{{ route('offers.create') }}" class="btn  btn-dark">@lang('dashboard.Create')</a>
                                </div>
                            @endpermission
                        </div>
                        <div class="card-body">


                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th style="width: 50px;">@lang('dashboard.Image')</th>
                                        <th>@lang('dashboard.title')</th>
                                        <th>@lang('dashboard.description')</th>
                                        <th>@lang('dashboard.active')</th>
                                        <th>@lang('dashboard.Operations')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($offers as $offer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            {{-- <td><img src="{{ url($offer->images->first()->path) ?? '' }}"
                                                    style="width: 50px;" /></td> --}}
                                            <td>
                                                @if ($offer->image)
                                                    <img src="{{ url($offer->image) }}" style="width: 50px;"
                                                        alt="Offer Image" />
                                                @else
                                                    <span>No image available</span>
                                                @endif
                                            </td>
                                            <td>{{ $offer->title }}</td>
                                            <td>{{ $offer->description }}</td>
                                            <td>{{ $offer->is_active_title }}</td>
                                            <td>
                                                <div class="operations-btns" style="">
                                                    @permission('offers-update')
                                                        <a href="{{ route('offers.edit', $offer->id) }}"
                                                            class="btn  btn-dark">@lang('dashboard.Edit')</a>
                                                    @endpermission
                                                    @permission('offers-delete')
                                                        <button class="btn btn-dark waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target="#delete-modal{{ $loop->iteration }}">@lang('dashboard.delete')</button>
                                                        <div id="delete-modal{{ $loop->iteration }}" class="modal fade modal2 "
                                                            tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                                            aria-hidden="true" style="display: none;">
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
                                                                        <form action="{{ route('offers.destroy', $offer->id) }}"
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
                            {{ $offers->appends(request()->all())->links('pagination::simple-bootstrap-5') }}
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
