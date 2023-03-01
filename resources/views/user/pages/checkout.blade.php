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
                            <span>Danh mục</span>
                        </div>
                        <ul>
                            @foreach ($categories as $category)
                                <li><a
                                        href="{{ route('user.books', ['category' => $category->id]) }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
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
            <div class="row">
                <div class="col-lg-12">
                    {{-- <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your
                        code
                    </h6> --}}
                </div>
            </div>
            <div class="checkout__form">
                <h4>Chi tiết thanh toán
                </h4>
                @if (!Auth::user())
                    <h3>Bạn đã có tài khoản chưa? </h3> <a href="{{ route('user.login.show') }}">Đăng Nhập</a>
                @endif
                <form action="#">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__input">
                                <p>Name<span>*</span></p>
                                <input type="text" name="name" value="{{ Auth::user() ? Auth::user()->name : '' }}">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address"
                                    value="{{ Auth::user() ? Auth::user()->address : '' }}">
                            </div>
                            <div class="checkout__input">
                                <p>Phone<span>*</span></p>
                                <input type="text" name="phone" value="{{ Auth::user() ? Auth::user()->phone : '' }}">
                            </div>
                            <div class="checkout__input">
                                <p>Facebook<span>*</span></p>
                                <input type="text" name="facebook"
                                    value="{{ Auth::user() ? Auth::user()->facebook : '' }}">
                            </div>
                            <div class="checkout__input">
                                <p>Order notes</p>
                                <input type="text" name="note">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul class="js-list-cart">

                                </ul>
                                <div class="checkout__order__subtotal">Subtotal <span class="js-orderTotal"></span></div>
                                <div class="checkout__order__total">Feeship <span>35000</span></div>
                                <div class="checkout__order__total">Total <span class="js-total"></span></div>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Thanh toán khi nhận hàng
                                        <input type="checkbox" id="payment" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button id="order-save" type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            printCart();

            $.ajaxSetup({
                headers: {
                    'X-CFRS-TOKEN': '{{ csrf_token() }}'
                }
            })

            //submit form
            $('#order-save').on('click', function(e) {
                e.preventDefault();

                let name = $('input[name=name]').val();
                let address = $('input[name=address]').val();
                let phone = $('input[name=phone]').val();
                let facebook = $('input[name=facebook]').val();
                let note = $('input[name=note]').val();
                let currentCart = JSON.parse(sessionStorage.getItem('cart'));

                console.log('name.length', name.length)

                if (name.length == 0 || address.length == 0 || phone.length == 0 || facebook.length == 0) {
                    $.toast({
                        heading: 'Đặt hàng không thành công!',
                        text: 'Vui lòng điều đầy đủ thông tin',
                        position: 'top-right',
                        stack: false,
                        icon: 'error'
                    })
                } else {
                    $.ajax({
                        url: "{{ route('user.order') }}",
                        type: "POST",
                        data: {
                            name: name,
                            address: address,
                            phone: phone,
                            facebook: facebook,
                            note: note,
                            currentCart: currentCart,
                            _token: '{{ csrf_token() }}'
                        },

                        success: function(response, textStatus, xhr) {
                            if (xhr.status === 200) {
                                sessionStorage.removeItem('cart');
                                window.location.href = `/thanks/${response.data.id}`;
                            }
                        },
                    });
                }
            });
        });

        function printCart() {
            let currentCart = JSON.parse(sessionStorage.getItem('cart'));
            let html = "";
            let subTotal = 0;
            let total = 0;

            $.each(currentCart, function(key, val) {
                html += `<li>${val.name} x${val.qty}<span>${val.price}</span></li>`;
                subTotal += val.price * val.qty;
            });

            $('.js-list-cart').html(html)

            //Subtotal
            $('.js-orderTotal').text(subTotal);

            //total
            total = subTotal + 35000;
            $('.js-total').text(total);
        }
    </script>
@endpush
