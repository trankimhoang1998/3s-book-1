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
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="js-list-cart">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ route('user.books') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        {{-- <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            {{-- <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span class="js-orderTotal"></span></li>
                            <li>Feeship <span>35000</span></li>
                            <li>Total <span class="js-total">$454.98</span></li>
                        </ul>
                        <a href="{{ route('user.checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            printCart();

            /*-------------------
            		Quantity change
            	--------------------- */
            // var proQty = $('.pro-qty');
            // proQty.prepend('<span class="dec qtybtn">-</span>');
            // proQty.append('<span class="inc qtybtn">+</span>');
            // proQty.on('click', '.qtybtn', function() {
            //     var $button = $(this);
            //     var oldValue = $button.parent().find('input').val();
            //     if ($button.hasClass('inc')) {
            //         var newVal = parseFloat(oldValue) + 1;
            //     } else {
            //         // Don't allow decrementing below zero
            //         if (oldValue > 0) {
            //             var newVal = parseFloat(oldValue) - 1;
            //         } else {
            //             newVal = 0;
            //         }
            //     }
            //     $button.parent().find('input').val(newVal);
            // });

            /*-------------------
            		End quantity change
            	--------------------- */
        });

        function changeQty(productId, qty) {
            let currentCart = JSON.parse(sessionStorage.getItem('cart'));
            for (let i = 0; i < currentCart.length; i++) {
                if (currentCart[i].id === productId) {
                    currentCart[i].qty = qty;
                    saveCart(currentCart);
                    printCart();
                }
            }
        }

        function removeItem(productId) {
            let currentCart = JSON.parse(sessionStorage.getItem('cart'));
            for (let i = 0; i < currentCart.length; i++) {
                if (currentCart[i].id === productId) {
                    currentCart.splice(i, 1);
                    saveCart(currentCart);
                    printCart($('.js-table-content'));
                }
            }
        }

        //Save cart
        function saveCart(cart) {
            cart = JSON.stringify(cart);
            return sessionStorage.setItem('cart', cart);
        }

        function printCart() {
            let currentCart = JSON.parse(sessionStorage.getItem('cart'));
            let html = "";
            let subTotal = 0;
            let total = 0;

            $.each(currentCart, function(key, val) {
                html += `<tr data-id="${val.id}">
                            <td class="shoping__cart__item">
                                <img src="${val.image}" alt="">
                                <h5>${val.name}</h5>
                            </td>
                            <td class="shoping__cart__price">
                                ${val.price}
                            </td>
                            <td class="shoping__cart__quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text"  value="${val.qty}" name="itemQty" class="js-qty">
                                    </div>
                                </div>
                            </td>
                            <td class="shoping__cart__total">
                                ${val.price * val.qty}
                            </td>
                            <td class="shoping__cart__item__close">
                                <span class="icon_close js-removeItem"></span>
                            </td>
                        </tr>`;
                subTotal += val.price * val.qty;
            });

            $('.js-list-cart').html(html)

            //Subtotal
            $('.js-orderTotal').text(subTotal);

            //total
            total = subTotal + 35000;
            $('.js-total').text(total);

            //Add event remove item
            $('.js-removeItem').click(function(e) {
                removeItem($(this).closest('tr').data('id'));
            })

            //Add event change qty
            $('input[name=itemQty]').change(function() {
                console.log('123123');
                changeQty($(this).closest('tr').data('id'), $(this).val());
            });
        }
    </script>
@endpush
