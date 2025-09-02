<?php
include_once 'config/setting.php';
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

<body class="bg-gray">
  <?php
  include_once 'common/header-plain.php';
  ?>

  <section>
    <div class="continer-fluid">
      <div class="row g-0 m-0 row-eq-height">
        <div class="col-lg-8">
          <div class="checkout-left">
            <div class="cart-heading d-flex justify-content-between align-items-center">
              <h1 class="heading-h1">checkout</h1>
              <div><a href="cart.php" class="checkout-back"><i class="bi bi-arrow-left me-3"></i> Back to shopping</a></div>
            </div>
            <div class="checkout-body">
              <div class="address-box mb-3">
                <div class="address-box-header d-flex justify-content-between align-items-center">
                  <div class="title-header">Shipping Address</div>
                  <button type="button" class="btn-round" data-bs-toggle="modal" data-bs-target="#addressBook"><i class="bi bi-journal-text"></i></button>
                </div>
                <div class="address-box-body">
                  <div class="row">
                    <div class="col-lg-12 col-12 py-4">
                      <div class="text-center my-wish-msg address-book-img">
                        <img src="assets/img/address-book.png" alt="">
                        <h3 class="head-one">Oops! No Address</h3>
                        <p class="py-2">You don't have any address saved. Saving address helps you checkout faster.</p>
                        <button type="button" class="btn-normal">Add New Address</button>
                      </div>
                    </div>
                  </div>
                  <div class="row g-3">
                    <!-- item -->
                    <div class="col-lg-4 col-12">
                      <div class="address-in-box" data-bs-toggle="tooltip" data-bs-placement="top" title="Click to Select Address">
                        <h6>Amit sharma</h6>
                        <p>K-106, Aadarsh Mohalla, Krishna Gali No.8, bala ji mandir wali gali. Maujpur Delhi-110053</p>
                        <button type="button" class="btn-close-sm"><i class="bi bi-x-lg"></i></button>
                      </div>
                    </div>
                    <!-- end item -->
                    <!-- item -->
                    <div class="col-lg-4 col-12">
                      <div class="address-in-box selected-address">
                        <h6>Rahul Negi</h6>
                        <p>K-106, Aadarsh Mohalla, Krishna Gali No.8, bala ji mandir wali gali. Maujpur Delhi-110053</p>
                        <button type="button" class="btn-close-sm"><i class="bi bi-x-lg"></i></button>
                      </div>
                    </div>
                    <!-- end item -->
                  </div>
                </div>
              </div>
              <div class="address-box">
                <div class="address-box-header d-flex justify-content-between align-items-center">
                  <div class="title-header">Special Instruction</div>
                </div>
                <div class="address-box-body">
                  <div>
                    <label for="" class="form-label">Write Here</label>
                    <textarea name="" id="" class="form-control" rows="3"></textarea>
                  </div>
                  
                </div>
              </div>
            </div>

          </div>
        </div>
        <div class="col-lg-4">
          <div class="checkout-right">
            <div>
              <!-- Product 1 -->
              <div class="product-item d-flex align-items-center">
                <div class="product-img-final me-3 w-25">
                  <img src="assets/img/ganesha-rudraksha_400.webp" alt="Cosmetics set">
                  <div class="item-qty">1</div>
                </div>
                <div class="w-50 me-2">
                  <h6 class="mb-1">Ceylon Blue Sapphire</h6>
                  <div class="item-cart-text">Origin: Ceylon (Sri Lanka) | Weight: 3.38 Carat (3.73 Ratti )</div>
                </div>
                <div class="w-25">
                  <div class="item-amt">INR 1,148.00</div>
                </div>
              </div>
              <!-- product end -->
              <!-- Product 1 -->
              <div class="product-item d-flex align-items-center">
                <div class="product-img-final me-3 w-25">
                  <img src="assets/img/ganesha-rudraksha_400.webp" alt="Cosmetics set">
                  <div class="item-qty">1</div>
                </div>
                <div class="w-50 me-2">
                  <h6 class="mb-1">Ceylon Blue Sapphire</h6>
                  <div class="item-cart-text">Origin: Ceylon (Sri Lanka) | Weight: 3.38 Carat (3.73 Ratti )</div>
                </div>
                <div class="w-25">
                  <div class="item-amt">INR 1,148.00</div>
                </div>
              </div>
              <!-- product end -->
              <!-- Order Summary -->
              <div class="mt-4">
                <div class="order-value d-flex justify-content-between align-items-center">
                  <span>Order value</span>
                  <span>INR 1,148.00</span>
                </div>
                <div class="order-value d-flex justify-content-between align-items-center">
                  <span>Delivery</span>
                  <span>Free</pan>
                </div>
                <div class="total-amount d-flex justify-content-between align-items-center">
                  <div>TOTAL</div>
                  <div>INR 1,148.00</div>
                </div>
              </div>

              <!-- Note -->
              <div class="terma-con-item">
                Our returns are free and easy. If something isn't quite right, you have 14 days to send it back to us. Read more in our <a href="#" class="text-decoration-underline">return and refund policy</a>.
              </div>
              <div>
                <button type="button" class="btn-normal w-100">Cash On Delivery</button>
                <button type="button" class="btn-normal w-100 mt-2">Pay with Razorpay</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="addressBook" tabindex="-1" aria-labelledby="addressBookLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content modal-content-edit">
        <div class="modal-body modal-body-edit">
          <button type="button" class="btn-close-edit" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
          <div class="modal-header-in">
            <div class="text1">Add a new address</div>
            <div class="text2">Please provide your complete address details below. Make sure all information is accurate to ensure smooth delivery.</div>
          </div>
          <form action="">
            <div class="row">
              <div class="mb-3 col-lg-12 col-12">
              <label for="" class="form-label">Your Name</label>
              <input type="text" class="form-control">
              </div>
              <div class="mb-3 col-lg-12 col-12">
              <label for="" class="form-label">Your Address</label>
              <textarea class="form-control" rows="3"></textarea>
              </div>
              <div class="mb-3 col-lg-12 col-12">
              <label for="" class="form-label">Landmark</label>
              <input type="text" class="form-control">
              </div>
              <div class="mb-3 col-lg-6 col-12">
              <label for="" class="form-label">Country</label>
              <select class="form-control"></select>
              </div>
              <div class="mb-3 col-lg-6 col-12">
              <label for="" class="form-label">State</label>
              <select class="form-control"></select>
              </div>
              <div class="mb-3 col-lg-6 col-12">
              <label for="" class="form-label">City</label>
              <select class="form-control"></select>
              </div>
              <div class="mb-3 col-lg-6 col-12">
              <label for="" class="form-label">Pin / Zip Code</label>
              <input type="text" class="form-control">
              </div>
              <div class="mb-3 col-lg-12 col-12">
                <button type="submit" class="btn-normal w-100"><div class="spinner-border spinner-border-sm me-2" role="status">
  <span class="visually-hidden">Loading...</span>
</div>Save Address</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  include_once 'common/footer-plain.php';
  ?>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  <script src="assets/js/app.js"></script>
</body>

</html>