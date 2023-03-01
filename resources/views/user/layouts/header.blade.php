    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                                <li>Free Shipping for all Order of $99</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="{{ asset('user/img/language.png') }}" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                @if (Auth::user())
                                    <div class="d-flex">
                                        <a
                                            href="{{ Auth::user()->role == 1 ? route('manages.index') : route('user.account') }}"><i
                                                class="fa fa-user"></i>Tài khoản</a>
                                        <a href="{{ route('user.logout.perform') }}" class="ml-2"><i
                                                class="fa fa-user"></i>Đăng xuất</a>
                                    </div>
                                @else
                                    <div class="d-flex">
                                        <a href="{{ route('user.login.show') }}"><i class="fa fa-user"></i>Đăng
                                            nhập</a>
                                        <a href="{{ route('user.register.show') }}" class="ml-2"><i
                                                class="fa fa-user"></i>Đăng ký</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="/"><img src="{{ asset('user/img/logo.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                            <li class="{{ Request::is('books') ? 'active' : '' }}"><a
                                    href="{{ route('user.books') }}">Shop</a></li>
                            {{-- <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href="./blog.html">Blog</a></li>
                            <li><a href="./contact.html">Contact</a></li> --}}
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            {{-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> --}}
                            <li><a href="{{ route('user.cart') }}"><i class="fa fa-shopping-bag js-total-card"></i></a>
                            </li>
                        </ul>
                        {{-- <div class="header__cart__price">item: <span>$150.00</span></div> --}}
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    @push('script')
        <script>
            $(document).ready(function() {
                getTotalCart()
            });

            //Save cart
            function getTotalCart() {
                let currentCart = JSON.parse(sessionStorage.getItem('cart'));
                currentCart = currentCart == null ? [] : currentCart;
                return $('.js-total-card').html(`<span>${currentCart.length}</span>`);
            }
        </script>
    @endpush
