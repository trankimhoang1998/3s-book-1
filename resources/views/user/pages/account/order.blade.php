@extends('user.layouts.master')
@push('css')
    <style>
    </style>
@endpush
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
                            <li><a href="#">Butter & Eggs</a></li>
                            <li><a href="#">Fastfood</a></li>
                            <li><a href="#">Fresh Onion</a></li>
                            <li><a href="#">Papayaya & Crisps</a></li>
                            <li><a href="#">Oatmeal</a></li>
                            <li><a href="#">Fresh Bananas</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('user/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Account</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Account</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Chi tiết order:</h4>

            </div>


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
                                        <th>Ảnh</th>
                                        <th>Tên</th>
                                        <th>Mã</th>
                                        <th class="text-right">Số lượng</th>
                                        <th class="text-right">Giá - VNĐ</th>
                                        <th class="text-right">Thành tiền - VNĐ</th>
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
                                            <b>Tiền hàng</b>
                                        </td>
                                        <td class="text-right">
                                            {{ $order->sub_total }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td colspan="6" class="text-right">
                                            <b>Tổng tiền</b>
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
    </section>

    <!-- Shoping Cart Section Begin -->

    <!-- Checkout Section End -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
