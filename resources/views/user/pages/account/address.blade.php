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
                        <h2>Address</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Address</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Address</h4>
                <form method="post" action="{{ route('user.account.update.info') }}">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__input">
                                <p>name<span>*</span></p>
                                <input type="text" name="name" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="checkout__input">
                                <p>phone<span>*</span></p>
                                <input type="text" name="phone" value="{{ Auth::user()->phone }}">
                            </div>
                            <div class="checkout__input">
                                <p>address<span>*</span></p>
                                <input type="text" name="address" value="{{ Auth::user()->address }}">
                            </div>
                            <div class="checkout__input">
                                <p>facebook<span>*</span></p>
                                <input type="text" name="facebook" value="{{ Auth::user()->facebook }}">
                            </div>
                            <button type="submit" class="site-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

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
