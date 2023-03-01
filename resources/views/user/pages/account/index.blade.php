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
    {{-- <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Thông tin tài khoản: Xin chào {{ Auth::user()->name }}</h4>

            </div>
        </div>
    </section> --}}

    <!-- Shoping Cart Section Begin -->
    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>sub Total</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="shoping__cart__price">
                                            <a href="{{ route('user.account.show', $order->id) }}">
                                                {{ $order->id }}
                                            </a>
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $order->total }}
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $order->sub_total }}
                                        </td>
                                        <td class="shoping__cart__price">
                                            {{ $order->total }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="col-lg-4">
                    <h4>Tài khoản của tôi:</h4>
                    <div>
                        @if (Auth::user())
                            <img width="50" src="{{ Auth::user()->avatar }}" alt="">
                            <br>
                            Hi: {{ Auth::user()->name }} <br>

                            số điện thoại: {{ Auth::user()->phone ? Auth::user()->phone : 'đang cập nhật' }} <br>
                            địa chỉ: {{ Auth::user()->address ? Auth::user()->address : 'đang cập nhật' }} <br>
                            facebook: {{ Auth::user()->facebook ? Auth::user()->facebook : 'đang cập nhật' }} <br>
                        @endif
                    </div>

                    <a href="{{ route('user.account.show.info') }}" type="submit" class="site-btn">Cập nhật thông tin</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
