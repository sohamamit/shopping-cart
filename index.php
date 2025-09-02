<?php
session_start();
include_once 'config/setting.php';
include_once 'functions/global.php';
include_once 'config/check-session.php';
$style = 'H';
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  include_once 'common/bootstrap.php';
  ?>
  <link rel="stylesheet" href="assets/vendor/OwlCarousel2-develop/dist/assets/owl.carousel.min.css" />
  <?php
  include_once 'common/main-style.php';
  ?>

</head>

<body>
  <?php
  include_once 'common/header.php';
  include_once 'common/slider.php';
  ?>

  <?php
  $page_section = $mysqli->query("select * from my_page_section where pre_fix='".$style."' and d_status='0' and dl_status='0' order by position ASC");
  if($page_section_count = $page_section->num_rows>0){
    while($page_section_row = $page_section->fetch_assoc()){
        echo $page_section_row['html_content'];
    }
  }else{
    echo 'No Page Section Available';
  }
  ?>


  
  <section class="section-2 sec-pd-70">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header">
            <div class="sub-head">Gems</div>
            <div class="main-head">Elevate Energy with Our Gems</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-carousel owl-theme slider-one nex-pre-btn">
            <!-- item -->
            <div class="item-product-slider">
              <div class="product-card">
                <div class="product-img">
                  <img src="assets/img/TM0033_GRAPHIC_045acf80-10ca-40ed-8331-c1033d784dd7.jpg" alt="">
                  <img src="assets/img/TM0033_NECK_c7488fd6-6499-428d-8a9e-bb777534b9f3.jpg" class="rear-img" alt="">
                  <div class="new-arrival pulse2">New arrival</div>
                </div>
                <div class="product-body">
                  <div class="product-name"><a href="">Rsw Tulsi Mala Silver</a></div>
                  <div class="product-info">
                    Rs. 2,499.00 <s>Rs. 3,123.75</s></div>
                  <div class="product-add-cart"><button type="button" class="btn-cart" onclick="window.open('product-view.php','_self')"><i class="bi bi-basket me-2"></i>Add To Cart</button></div>
                </div>
                <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
                <button type="button" class="btn-sold-out">40% off</button>
              </div>
            </div>
            <!-- item end -->
            <!-- item -->
            <div class="item-product-slider">
              <div class="product-card">
                <div class="product-img">
                  <img src="assets/img/TM0033_GRAPHIC_045acf80-10ca-40ed-8331-c1033d784dd7.jpg" alt="">
                  <img src="assets/img/TM0033_NECK_c7488fd6-6499-428d-8a9e-bb777534b9f3.jpg" class="rear-img" alt="">
                  <div class="new-arrival pulse2">New arrival</div>
                </div>
                <div class="product-body">
                  <div class="product-name"><a href="">Rsw Tulsi Mala Silver</a></div>
                  <div class="product-info">
                    Rs. 2,499.00 <s>Rs. 3,123.75</s></div>
                  <div class="product-add-cart"><button type="button" class="btn-cart" onclick="window.open('product-view.php','_self')"><i class="bi bi-basket me-2"></i>Add To Cart</button></div>
                </div>
                <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
                <button type="button" class="btn-sold-out">40% off</button>
              </div>
            </div>
            <!-- item end -->
            <!-- item -->
            <div class="item-product-slider">
              <div class="product-card">
                <div class="product-img">
                  <img src="assets/img/TM0033_GRAPHIC_045acf80-10ca-40ed-8331-c1033d784dd7.jpg" alt="">
                  <img src="assets/img/TM0033_NECK_c7488fd6-6499-428d-8a9e-bb777534b9f3.jpg" class="rear-img" alt="">
                  <div class="new-arrival pulse2">New arrival</div>
                </div>
                <div class="product-body">
                  <div class="product-name"><a href="">Rsw Tulsi Mala Silver</a></div>
                  <div class="product-info">
                    Rs. 2,499.00 <s>Rs. 3,123.75</s></div>
                  <div class="product-add-cart"><button type="button" class="btn-cart" onclick="window.open('product-view.php','_self')"><i class="bi bi-basket me-2"></i>Add To Cart</button></div>
                </div>
                <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
                <button type="button" class="btn-sold-out">40% off</button>
              </div>
            </div>
            <!-- item end -->
            <!-- item -->
            <div class="item-product-slider">
              <div class="product-card">
                <div class="product-img">
                  <img src="assets/img/TM0033_GRAPHIC_045acf80-10ca-40ed-8331-c1033d784dd7.jpg" alt="">
                  <img src="assets/img/TM0033_NECK_c7488fd6-6499-428d-8a9e-bb777534b9f3.jpg" class="rear-img" alt="">
                  <div class="new-arrival pulse2">New arrival</div>
                </div>
                <div class="product-body">
                  <div class="product-name"><a href="">Rsw Tulsi Mala Silver</a></div>
                  <div class="product-info">
                    Rs. 2,499.00 <s>Rs. 3,123.75</s></div>
                  <div class="product-add-cart"><button type="button" class="btn-cart" onclick="window.open('product-view.php','_self')"><i class="bi bi-basket me-2"></i>Add To Cart</button></div>
                </div>
                <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
                <button type="button" class="btn-sold-out">40% off</button>
              </div>
            </div>
            <!-- item end -->
            <!-- item -->
            <div class="item-product-slider">
              <div class="product-card">
                <div class="product-img">
                  <img src="assets/img/TM0033_GRAPHIC_045acf80-10ca-40ed-8331-c1033d784dd7.jpg" alt="">
                  <img src="assets/img/TM0033_NECK_c7488fd6-6499-428d-8a9e-bb777534b9f3.jpg" class="rear-img" alt="">
                  <div class="new-arrival pulse2">New arrival</div>
                </div>
                <div class="product-body">
                  <div class="product-name"><a href="">Rsw Tulsi Mala Silver</a></div>
                  <div class="product-info">
                    Rs. 2,499.00 <s>Rs. 3,123.75</s></div>
                  <div class="product-add-cart"><button type="button" class="btn-cart" onclick="window.open('product-view.php','_self')"><i class="bi bi-basket me-2"></i>Add To Cart</button></div>
                </div>
                <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
                <button type="button" class="btn-sold-out">40% off</button>
              </div>
            </div>
            <!-- item end -->
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-3">
          <div class="footer-sec-btn">
            <button class="btn-normal w-100"><i class="bi bi-basket me-2"></i>Explore All</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-3 sec-pd-70 ">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-lg-8">
          <div class="row justify-content-center">
            <div class="col-lg-12">
              <div class="section-header">
                <div class="sub-head">Best sellers</div>
                <div class="main-head">Find what’s meant to be yours</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="owl-carousel owl-theme slider-two nex-pre-btn">
                <!-- item -->
                <div class="item-product-slider">
                  <div class="product-card">
                    <div class="product-img">
                      <img src="assets/img/TM0033_GRAPHIC_045acf80-10ca-40ed-8331-c1033d784dd7.jpg" alt="">
                      <img src="assets/img/TM0033_NECK_c7488fd6-6499-428d-8a9e-bb777534b9f3.jpg" class="rear-img" alt="">
                      <div class="new-arrival pulse2">New arrival</div>
                    </div>
                    <div class="product-body">
                      <div class="product-name"><a href="">Rsw Tulsi Mala Silver</a></div>
                      <div class="product-info">
                        Rs. 2,499.00 <s>Rs. 3,123.75</s></div>
                    </div>
                    <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
                    <button type="button" class="btn-sold-out">40% off</button>
                  </div>
                </div>
                <!-- item end -->
                <!-- item -->
                <div class="item-product-slider">
                  <div class="product-card">
                    <div class="product-img">
                      <img src="assets/img/TM0033_GRAPHIC_045acf80-10ca-40ed-8331-c1033d784dd7.jpg" alt="">
                      <img src="assets/img/TM0033_NECK_c7488fd6-6499-428d-8a9e-bb777534b9f3.jpg" class="rear-img" alt="">
                      <div class="new-arrival pulse2">New arrival</div>
                    </div>
                    <div class="product-body">
                      <div class="product-name"><a href="">Rsw Tulsi Mala Silver</a></div>
                      <div class="product-info">
                        Rs. 2,499.00 <s>Rs. 3,123.75</s></div>
                    </div>
                    <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
                    <button type="button" class="btn-sold-out">40% off</button>
                  </div>
                </div>
                <!-- item end -->
                <!-- item -->
                <div class="item-product-slider">
                  <div class="product-card">
                    <div class="product-img">
                      <img src="assets/img/TM0033_GRAPHIC_045acf80-10ca-40ed-8331-c1033d784dd7.jpg" alt="">
                      <img src="assets/img/TM0033_NECK_c7488fd6-6499-428d-8a9e-bb777534b9f3.jpg" class="rear-img" alt="">
                      <div class="new-arrival pulse2">New arrival</div>
                    </div>
                    <div class="product-body">
                      <div class="product-name"><a href="">Rsw Tulsi Mala Silver</a></div>
                      <div class="product-info">
                        Rs. 2,499.00 <s>Rs. 3,123.75</s></div>

                    </div>
                    <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
                    <button type="button" class="btn-sold-out">40% off</button>
                  </div>
                </div>
                <!-- item end -->
                <!-- item -->
                <div class="item-product-slider">
                  <div class="product-card">
                    <div class="product-img">
                      <img src="assets/img/TM0033_GRAPHIC_045acf80-10ca-40ed-8331-c1033d784dd7.jpg" alt="">
                      <img src="assets/img/TM0033_NECK_c7488fd6-6499-428d-8a9e-bb777534b9f3.jpg" class="rear-img" alt="">
                      <div class="new-arrival pulse2">New arrival</div>
                    </div>
                    <div class="product-body">
                      <div class="product-name"><a href="">Rsw Tulsi Mala Silver</a></div>
                      <div class="product-info">
                        Rs. 2,499.00 <s>Rs. 3,123.75</s></div>

                    </div>
                    <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
                    <button type="button" class="btn-sold-out">40% off</button>
                  </div>
                </div>
                <!-- item end -->
                <!-- item -->
                <div class="item-product-slider">
                  <div class="product-card">
                    <div class="product-img">
                      <img src="assets/img/TM0033_GRAPHIC_045acf80-10ca-40ed-8331-c1033d784dd7.jpg" alt="">
                      <img src="assets/img/TM0033_NECK_c7488fd6-6499-428d-8a9e-bb777534b9f3.jpg" class="rear-img" alt="">
                      <div class="new-arrival pulse2">New arrival</div>
                    </div>
                    <div class="product-body">
                      <div class="product-name"><a href="">Rsw Tulsi Mala Silver</a></div>
                      <div class="product-info">
                        Rs. 2,499.00 <s>Rs. 3,123.75</s></div>

                    </div>
                    <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
                    <button type="button" class="btn-sold-out">40% off</button>
                  </div>
                </div>
                <!-- item end -->
              </div>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col-lg-4">
              <div class="footer-sec-btn">
                <button class="btn-normal w-100"><i class="bi bi-basket me-2"></i>Explore All</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-4 sec-pd-70">
    <div class="container">
      <div class="row row-eq-height">
        <div class="col-lg-4 my-auto">
          <img src="assets/img/view-buddha-statuette-peace-relaxation.png" class="w-100" alt="">
        </div>
        <div class="col-lg-8 my-auto">
          <div class="row justify-content-center">
            <div class="col-lg-12">
              <div class="section-header">
                <div class="sub-head">Rudraksha</div>
                <div class="main-head">Natural Himalaya Rudraksha</div>
                <div class="sub-script">Rudraksha are not merely beads or dried seeds but they carry with them the Himalayan sublimity that does away with anxiety, depression and mental weaknesses and awakens wearer's spiritual consciousness.</div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 text-center">
              <div class="pro-list-pro">
                <ul>
                  <li>
                    <div class="list-pro">
                      <img src="assets/img/1-to-14-mukhi-rudraksha_400.webp" alt="">
                      <h6>1 To 14 Mukhi Rudraksha</h6>
                      <h5>Starting from INR 800</h5>
                    </div>
                  </li>
                  <li>
                    <div class="list-pro">
                      <img src="assets/img/1-to-14-mukhi-rudraksha_400.webp" alt="">
                      <h6>1 To 14 Mukhi Rudraksha</h6>
                      <h5>Starting from INR 800</h5>
                    </div>
                  </li>
                  <li>
                    <div class="list-pro">
                      <img src="assets/img/1-to-14-mukhi-rudraksha_400.webp" alt="">
                      <h6>1 To 14 Mukhi Rudraksha</h6>
                      <h5>Starting from INR 800</h5>
                    </div>
                  </li>
                  <li>
                    <div class="list-pro">
                      <img src="assets/img/1-to-14-mukhi-rudraksha_400.webp" alt="">
                      <h6>1 To 14 Mukhi Rudraksha</h6>
                      <h5>Starting from INR 800</h5>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-5 sec-pd-70">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header">
            <div class="sub-head">Gemstones</div>
            <div class="main-head">Every gem has a purpose, every purpose has a gem</div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="row g-3">
            <div class="col-lg-3">
              <div class="gem-hover-box">
                <img src="assets/img/image_87.png" alt="">
                <div class="gem-overlayer"></div>
                <div class="gem-hover-txt">Emerald (Panna)</div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="gem-hover-box">
                <img src="assets/img/pikaso_edit_21.webp" alt="">
                <div class="gem-overlayer"></div>
                <div class="gem-hover-txt">Ruby (Manik)</div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="gem-hover-box">
                <img src="assets/img/image_90.webp" alt="">
                <div class="gem-overlayer"></div>
                <div class="gem-hover-txt">Blue Sapphire (Neelam)</div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="gem-hover-box">
                <img src="assets/img/image_89.webp" alt="">
                <div class="gem-overlayer"></div>
                <div class="gem-hover-txt">Yellow Sapphire (Pukhraj)</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="section-6 sec-pd-70">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header">
            <div class="sub-head">Gemstones</div>
            <div class="main-head">Hottest Selling</div>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- item -->
        <div class="col-lg-2">
          <div class="perl-box">
            <img src="assets/img/emerald_400.webp" alt="">
            <h6>EMERALD</h6>
            <p>Helps Students Concentrate and Career Growth</p>
          </div>
        </div>
        <!-- end item -->
         <!-- item -->
        <div class="col-lg-2">
          <div class="perl-box">
            <img src="assets/img/Blue-Sapphire_400.webp" alt="">
            <h6>BLUE SAPPHIRE</h6>
            <p>Increases Wisdom and Intellect</p>
          </div>
        </div>
        <!-- end item -->
         <!-- item -->
        <div class="col-lg-2">
          <div class="perl-box">
            <img src="assets/img/yellow-sapphire_400.webp" alt="">
            <h6>YELLOW SAPPHIRE</h6>
            <p>Increase Financial Status, Destroys Evil & Protects</p>
          </div>
        </div>
        <!-- end item -->
         <!-- item -->
        <div class="col-lg-2">
          <div class="perl-box">
            <img src="assets/img/ruby_400.webp" alt="">
            <h6>RUBY</h6>
            <p>Awakens Leadership Quality in You</p>
          </div>
        </div>
        <!-- end item -->
         <!-- item -->
        <div class="col-lg-2">
          <div class="perl-box">
            <img src="assets/img/pearl_400.webp" alt="">
            <h6>PEARL</h6>
            <p>Reduces Anger, Increasing Memory and Brain Power</p>
          </div>
        </div>
        <!-- end item -->
         <!-- item -->
        <div class="col-lg-2">
          <div class="perl-box">
            <img src="assets/img/opal_400.webp" alt="">
            <h6>Opal</h6>
            <p>Improves Relations Makes Them Stronger</p>
          </div>
        </div>
        <!-- end item -->
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="section-header mt-4">
            <div class="main-head">Other Bestsellers</div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 text-center">
          <button class="btn-cart-sm">Red Coral</button>
          <button class="btn-cart-sm">Cat'S Eye</button>
          <button class="btn-cart-sm">Diamond</button>
          <button class="btn-cart-sm">Pearl</button>
          <button class="btn-cart-sm">Rudraksha</button>
          <button class="btn-cart-sm">Hessonite Garnet</button>
        </div> 
      </div>
      <div class="row justify-content-center">
        <div class="col-lg-3"><button class="btn-normal w-100 mt-3">Explore All<i class="bi bi-arrow-right ms-2"></i></button></div>
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
  <script src="assets/js/home-page.js"></script>
</body>

</html>