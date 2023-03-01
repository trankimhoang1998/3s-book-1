@extends('admin.layouts.master')
@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Order</h1>
            <div class="section-header-button">
                {{-- <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New</a> --}}
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">List Order</h2>
            <p class="section-lead">
                You can manage all Order
            </p>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-md">
                                    <tr>
                                        <th>#</th>
                                        <th>userID (Name)</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $order->user_id ? $order->user->name . ' id:' . $order->user_id : 'người dùng' }}
                                            </td>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>
                                                <a href="{{ route('orders.show', $order->id) }}"
                                                    class="btn btn-icon btn-primary"><i class="far fa-eye"></i></a>
                                                <a href="" class="btn btn-icon btn-primary"><i
                                                        class="far fa-edit"></i></a>
                                                <button class="btn btn-icon btn-danger js-delete-tag" data-id="">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
