<?php
session_start();
include_once 'config/setting.php';
include_once 'functions/global.php';
include_once 'config/check-session.php';

$product = $mysqli->query("select * from my_products where slug='".$_REQUEST['url']."'");
$product_row = $product->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  include_once 'common/bootstrap.php';
  ?>
  <link rel="stylesheet"  href="https://sachinchoolur.github.io/lightslider/dist/css/lightslider.css"/>
    <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css"/>
  <link href="<?php echo BASE_URL?>assets/vendor/OwlCarousel2-develop/dist/assets/owl.carousel.min.css" rel="stylesheet" />
  <?php
  include_once 'common/main-style.php';
  ?>
</head>

<body>
  <?php
  include_once 'common/header.php';
  ?>
  <section class="bred-section">
    <div class="container">
      <div class="text-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb justify-content-center">
            <li class="breadcrumb-item"><a href="<?php echo BASE_URL?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo BASE_URL?>en/<?php echo $global->CategoryIDSlug($product_row['cat_id']);?>"><?php echo $global->CategoryID($product_row['cat_id']);?></a></li>
            <li class="breadcrumb-item"><a href="<?php echo BASE_URL?>product/<?php echo $global->SubSubCategoryIDSlug($product_row['sub_sub_cat_id'])?>"><?php echo $global->SubSubCategoryID($product_row['sub_sub_cat_id']);?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $product_row['product_name'];?></li>
          </ol>
        </nav>
      </div>
    </div>
  </section>

  <section class="bg-light-body sec-product-display">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="main-wrapper">
		    <div class="demo">
		    <ul id="lightSlider">
          <?php
              $n=1;
              $image = $mysqli->query("select * from my_product_image where token='".$product_row['token']."' and image_size='1500'");
              while($image_row = $image->fetch_assoc()){
                $new_image = explode("/",$image_row['image']);
                $new_image = end($new_image);
              ?>

		        <li data-thumb="<?php echo ADMIN_URL?>uploads/product-image/thumb/150-<?php echo $new_image;?>">
		        	<a href="<?php echo ADMIN_URL?>uploads/product-image/<?php echo $new_image;?>" data-fancybox="gallery">
		            	<img src="<?php echo ADMIN_URL?>uploads/product-image/thumb/700-<?php echo $new_image;?>" />
		        	</a>
		        </li>
		         <?php
              $n++;
              }
              ?>

		    </ul>
		</div>
	</div>
          
        </div>
        <div class="col-lg-7">
          <div class="product-display">
            <h1 class="view-heading"><?php echo $product_row['product_name'];?></h1>
            <?php
            if($product_row['qty']>0){
              $stock = 'In Stock';
            }else{
$stock = 'Out Of Stock';
            }
            ?>
            <div class="in-stock"><?php echo $stock;?></div>
            <div class="view-price">&#8377;<?php echo $product_row['price'];?> <s>&#8377;<?php echo $product_row['m_price'];?></s> <span>(<?php echo $product_row['percentage'];?>% off)</span></div>
            <div class="skunumber"><span>SKU:</span> SKU<?php echo $product_row['sku'];?></div>
            <div class="filter-product-box">
              <?php
              $filter = $mysqli->query("select * from my_product_filter where token='".$product_row['token']."'");
              while($filter_row = $filter->fetch_assoc()){
              ?>
              <h4><?php echo $global->FilterNameByID($filter_row['filter_id']);?></h4>
              <ul>
                <li class="active">Nepali</li>
              </ul>
              <?php
              }
              ?>
            </div>
            <div class="addtocart-btn mb-3">
              <button class="btn-normal w-100"><i class="bi bi-basket me-2"></i>Add To Cart</button>
            </div>
            <div class="offer-box">
              <div class="offer-box-head">Available offers</div>
              <div class="offer-box-body">
                <span>Use Code- SAVE20</span> to get Flat 20% Off on shopping of Rs. 3,100 and above.
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="sec-pd-60 bg-light-new">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header">
            <div class="section-h1">You may also like</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-theme pre-next-middle" id="relativeProduct">
            <?php
            $relatied_pro = $mysqli->query("select * from my_products where d_status='0' and dl_status='0' and sub_sub_cat_id='".$product_row['sub_sub_cat_id']."' LIMIT 20");
            if($relatied_pro_count = $relatied_pro->num_rows>0){
              while($relatied_pro_row = $relatied_pro->fetch_assoc()){

                $image_array = $global->ProductImage($relatied_pro_row['token'], 500);
            ?>
            <!-- item -->
              <div class="product-owl-item">
                <div class="product-card">
                <div class="product-img">
                  <img src="<?php echo ADMIN_URL ?>uploads/product-image/thumb/<?php echo $image_array[0] ?>" alt="">
                  <img src="<?php echo ADMIN_URL ?>uploads/product-image/thumb/<?php echo $image_array[1] ?>" class="rear-img" alt="">
                  <?php
                  if (!empty($relatied_pro_row['p_label'])) {
                    echo '<div class="new-arrival pulse2">' . $relatied_pro_row['p_label'] . '</div>';
                  }
                  ?>

                </div>
                <div class="product-body">
                  <div class="product-name"><a target="_blank" href="<?php echo BASE_URL?>buy/<?php echo $relatied_pro_row['slug'] ?>"><?php echo $relatied_pro_row['product_name'] ?></a></div>
                  <div class="product-info">
                    &#8377;<?php echo $relatied_pro_row['price'] ?> <s>&#8377;<?php echo $relatied_pro_row['m_price'] ?></s></div>
                  <div class="product-add-cart">
                    <?php
                if($relatied_pro_row['qty']>0){
                ?>
                    <button type="button" class="btn-cart productURL" data-url="<?php echo BASE_URL?>buy/<?php echo $relatied_pro_row['slug']?>"><i class="bi bi-basket me-2"></i>Add To Cart</button>
                    <?php
                }else{
                    ?>
                    <button type="button" class="btn-cart alertForStock" data-id="<?php echo $relatied_pro_row['token']?>"><i class="bi bi-envelope me-2"></i>Alert Me</button>
                    <?php
                }
                    ?>
                  </div>
                </div>
                <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
                <?php
                if($relatied_pro_row['qty']>0){
                ?>
                <button type="button" class="btn-sold-out"><?php echo $relatied_pro_row['percentage'] ?>% off</button>
                <?php
                }else{
                ?>
                <button type="button" class="btn-sold-out">SOLD OUT</button>
                <?php
                }
                ?>
              </div>
              </div>
              <!-- item end -->
            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="sec-pd-60">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <button class="btn-normal active mx-2" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true"><i class="bi bi-justify-left me-2"></i>Product Specifications</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="btn-normal mx-2" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false"><i class="bi bi-chat-dots me-2"></i>Customer Reviews</button>
            </li>
            <li class="nav-item" role="presentation">
              <button class="btn-normal mx-2" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false"><i class="bi bi-pen me-2"></i>Write a Review</button>
            </li>

          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
              <div class="tab-content-modal">
                <h3>Product Description</h3>
                <?php echo $product_row['description'];?>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
              <div class="tab-content-modal">
                <div class="row">
                  <div class="col-lg-12 col-12 py-4">
                    <div class="text-center my-wish-msg address-book-img">
                      <h3 class="head-one m-0">Oops! No Review Available</h3>
                      <p class="py-2">The stage is empty, and the spotlight is on you. Write the first review!</p>
                      <button type="button" class="btn-normal">Write a Review</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab" tabindex="0">
              <div class="row">
                <div class="col-lg-12 col-12 py-4">
                  <div class="text-center my-wish-msg address-book-img">
                    <h3 class="head-one">Please Signin Your Account</h3>
                    <p class="py-2">You must be logged-in to add review. Already have an account?</p>
                    <button type="button" class="btn-normal">Sign In</button>
                  </div>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-lg-8 col-12 py-4">
                  <form action="">
                    <div class="row">
                      <div class="mb-3">
                        <label for="" class="form-label">Write Your Review</label>
                        <textarea name="" id="" class="form-control" rows="4"></textarea>
                      </div>
                      <div class="mb-3">
                        <button type="submit" class="btn-normal">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="sec-pd-60 bg-light-new bg-support">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-7">
          <div class="need-help">
            <h3>Need Help in Selecting the Right Product for You?</h3>
            <p>We're here to make your shopping experience easier and more personalized. If you're unsure which product suits your needs best, don’t worry — our experts are just a call or message away. Feel free to call us directly for instant assistance, drop us an email with your queries, or simply request a callback at your convenience. We're always happy to guide you toward the perfect choice!</p>
            <h6>Connect with our Experts Now.</h6>
            <button class="btn-round-big" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Chat Now"><i class="bi bi-chat-dots"></i></button>
            <button class="btn-round-big" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Call Now"><i class="bi bi-telephone"></i></button>
            <button class="btn-round-big" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Request for call now"><i class="bi bi-telephone-inbound"></i></button>
          </div>
        </div>
      </div>
    </div>
  </section>



  <?php
  include_once 'common/heighlight.php';
  include_once 'common/category-bottom.php';
  include_once 'common/footer.php';
  include_once 'common/extra-elements.php';
  include_once 'common/footer-script.php';
  ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <script src="<?php echo BASE_URL?>assets/vendor/OwlCarousel2-develop/dist/owl.carousel.min.js"></script>
  <script>
   $ = jQuery;
$(document).ready(function () {
  $h_slider_options = {
    gallery: true,
    item: 1,
    loop: true,
    slideMargin: 0,
    thumbItem: 4,
    galleryMargin: 10,
    thumbMargin: 10
  };

  h_slider = $("#lightSlider").lightSlider($h_slider_options);
  
  /* Fancybox & lightSlider Sync - Bug Fix */
  $selector = '#lightSlider li:not(".clone") a';
  $selector += ',#lightSliderVertical li:not(".clone") a';
  $().fancybox({
    selector: $selector,
    backFocus: false, //The most important options for sync bug fix
    buttons: ["slideShow","zoom","fullScreen","close"]
  });
});

// #RESIZE BUG FIXING
// # if slider have height in % or vh,
// # on resize rebuild
$(window).resize(function () {
  slider.destroy();
  h_slider = $("#ocassions-slider").lightSlider(h_slider_options);
});
  </script>
  
  <script>
    $('#relativeProduct').owlCarousel({
      loop: true,
      margin: 0,
      responsiveClass: true,
      nav: true,
      autoplay: false,
      navText: ['<i class="bi bi-chevron-left" aria-hidden="true"></i>', '<i class="bi bi-chevron-right" aria-hidden="true"></i>'],
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        600: {
          items: 2,
          nav: false
        },
        1000: {
          items: 4,
          nav: true,
          loop: true
        }
      }
    })
  </script>
</body>

</html>