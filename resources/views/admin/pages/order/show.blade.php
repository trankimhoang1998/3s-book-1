@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Order detail</h1>
            <div class="section-header-button">
                {{-- <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New</a> --}}
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Order detail</h2>
            <p class="section-lead">
                You can manage Order detail
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Name: <code>{{ $order->name }}</code></h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Address: <code>{{ $order->address }}</code></h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Phone: <code>{{ $order->phone }}</code></h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Facebook: <code>{{ $order->facebook }}</code></h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Note: <code>{{ $order->note }}</code></h4>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Detail:</h4>
                        </div>
                        <div class="card-body table-responsive p-0" style="">
                            <table class="table table-hover text-nowrap table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th style="width: 35px;">No</th>
                                        <th>???nh</th>
                                        <th>T??n</th>
                                        <th>M??</th>
                                        <th class="text-right">S??? l?????ng</th>
                                        <th class="text-right">Gi?? - VN??</th>
                                        <th class="text-right">Th??nh ti???n - VN??</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->books as $order_detail)
                                        <tr>
                                            <td>1</td>
                                            <td>
                                                <img src="{{ $order_detail->image }}" alt="Book Image" class="thumbnail"
                                                    style="width: 45px; height: 60px;">
                                            </td>
                                            <td>{{ $order_detail->name }}</td>
                                            <td>{{ $order_detail->code }}</td>
                                            <td class="text-right">
                                                {{ $order_detail->pivot->qty }}</td>
                                            <td class="text-right">
                                                {{ $order_detail->pivot->price }}</td>
                                            <td class="text-right">
                                                {{ $order_detail->pivot->qty * $order_detail->pivot->price }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="6" class="text-right">
                                            <b>Ti???n h??ng</b>
                                        </td>
                                        <td class="text-right">
                                            {{ $order->sub_total }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6" class="text-right">
                                            <b>T???ng ti???n</b>
                                        </td>
                                        <td class="text-right">
                                            {{ $order->total }}
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
