<?php
session_start();
include_once 'config/setting.php';
include_once 'functions/global.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <?php
    include_once 'common/bootstrap.php';
    include_once 'common/main-style.php';
    ?>

</head>

<body>
    <?php
    include_once 'common/header.php';
    ?>

    <section class="bg-light-body section-cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-heading">
                        <h1 class="heading-h1">Shopping Bag</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="text-center my-wish-msg">
                        <img src="assets/img/empty-cart-new.png" alt="">
                        <h3 class="head-one">Your Cart is Empty</h3>
                        <p class="py-2">Discover products you’ll love. Start exploring now and fill your cart with happiness!</p>
                        <button type="button" class="btn-normal">Continue Shopping</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="cart-row">
                        <div class="row row-eq-height">

                            <div class="col-lg-2 my-auto"><img src="assets/img/TM0033_NECK_c7488fd6-6499-428d-8a9e-bb777534b9f3.jpg" class="w-100" alt=""></div>
                            <div class="col-lg-6 my-auto">
                                <div class="cart-item-details">
                                    <div class="cart-item-name"><a href="">Ceylon Blue Sapphire</a></div>
                                    <div class="cart-item-detail">
                                        <p>Origin: Ceylon (Sri Lanka) | Weight: 3.38 Carat (3.73 Ratti )</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 my-auto">
                                <div class="d-flex justify-content-start cart-qty">
                                    <button type="button" class="cart-plus">-</button>
                                    <input type="text" value="1">
                                    <button type="button" class="cart-minus">+</button>
                                </div>
                            </div>
                            <div class="col-lg-1 my-auto cart-row-amt">INR 2500</div>
                            <div class="col-lg-1 my-auto text-end"><button type="button" class="btn-round"><i class="bi bi-trash"></i></button></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12 col-12">
                    <div class="row row-eq-height">
                        <div class="col-lg-9 col-12 my-auto">
                            <div class="discount-coupon">
                                <input type="text" placeholder="Enter Code Here" name="" value="">
                                <button type="button" class="btn-normal position-discoup">Discount Coupon</button>
                            </div>
                        </div>
                        <div class="col-lg-3 col-12">
                            <button type="button" class="btn-normal w-100 mt-2">Continue Shopping</button>
                            <button type="button" class="btn-normal w-100 mt-2" onclick="window.open('checkout.php','_self');">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
  include_once 'common/chat-call-support.php';
  include_once 'common/heighlight.php';
  include_once 'common/category-bottom.php';
  include_once 'common/footer.php';
  include_once 'common/extra-elements.php';
  include_once 'common/footer-script.php';
  ?>
</body>

</html>