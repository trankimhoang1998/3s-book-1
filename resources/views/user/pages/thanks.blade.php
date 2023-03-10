@extends('user.layouts.master')
@push('css')
    <style>
        .shoping__cart__table table tbody tr td.shoping__cart__item img {
            width: 100px;
            margin-bottom: 25px
        }
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
                        <h2>Thank you</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Thank you</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
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
    <!-- Checkout Section End -->
@endsection

@push('script')
    <script></script>
@endpush
