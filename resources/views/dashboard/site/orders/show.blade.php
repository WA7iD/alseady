@extends('dashboard.core.app')
@section('title', __('dashboard.order') . __('dashboard.details'))

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>@lang('dashboard.orders')</h1>
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
                            <h3 class="card-title">@lang('dashboard.order') @lang('dashboard.details')</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mt-3 row">
                                    <div class="card card-dark col-12">
                                        <div class="card-header">
                                            <h3 class="card-title">@lang('dashboard.details')</h3>
                                        </div>
                                        <div class="card-body row">
                                            <div class="col-10 row mt-3">
                                                <div class="col-6">
                                                    <strong><i
                                                            class="fas fa-user ml-1 mr-1"></i>{{ $order->name }}</strong>
                                                </div>
                                                <div class="col-6">
                                                    <strong><i
                                                            class="fas fa-address-card ml-1 mr-1"></i>{{ $order->address }}</strong>
                                                </div>
                                                <div class="col-6">
                                                    <strong><i
                                                            class="fas fa-phone ml-1 mr-1"></i>{{ $order->phone }}</strong>
                                                </div>
                                                <div class="col-6">
                                                    <strong><i
                                                            class="fas fa-phone ml-1 mr-1"></i>{{ $order->another_phone }}</strong>
                                                </div>
                                                <div class="col-6">

                                                    <form method="post"
                                                        action="{{ route('orders.update', ['order' => $order->id]) }}"
                                                        id="orderStatusForm">
                                                        @csrf
                                                        @method('put')
                                                        <input type="radio" name="status" value="0"
                                                            {{ $order->getRawOriginal('status') == 0 ? 'checked' : '' }}
                                                            onchange="document.getElementById('orderStatusForm').submit();">@lang('dashboard.checking')

                                                        <input type="radio" name="status" value="1"
                                                            {{ $order->getRawOriginal('status') == 1 ? 'checked' : '' }}
                                                            onchange="document.getElementById('orderStatusForm').submit();">@lang('dashboard.on_his_way')

                                                        <input type="radio" name="status" value="2"
                                                            {{ $order->getRawOriginal('status') == 2 ? 'checked' : '' }}
                                                            onchange="document.getElementById('orderStatusForm').submit();">@lang('dashboard.delivered')
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-5">
                                    <table class="table table-bordered">
                                        <thead class="table-dark">
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>@lang('dashboard.product')</th>
                                                <th>@lang('dashboard.count')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($order->products as $key => $product)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $product->title }}</td>
                                                    <td>{{ $product->pivot->amount }}
                                                    </td>

                                                </tr>
                                            @empty
                                                @include('dashboard.core.includes.no-entries', [
                                                    'columns' => 6,
                                                ])
                                            @endforelse
                                        </tbody>
                                    </table>

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
