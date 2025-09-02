<?php
session_start();
include_once 'config/setting.php';
include_once 'functions/global.php';
include_once 'config/check-session.php';
$style = 'CS';

$product = $mysqli->query("select * from my_sub_sub_category where slug='" . $_REQUEST['url'] . "'");
$product_row = $product->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php
  include_once 'common/bootstrap.php';
  include_once 'common/main-style.php';
  ?>

</head>

<body>
  <?php
  include_once 'common/header.php';
  include_once 'common/product-page-header.php';
  ?>

  <section class="bg-light-body">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-12">
          <div class="filter-or-other d-flex justify-content-between align-items-center">
            <div>
              <button class="btn-normal" type="button" data-bs-toggle="offcanvas" data-bs-target="#ProductFilter" aria-controls="ProductFilter">
                Filter: <i class="bi bi-funnel"></i>
              </button>
            </div>
            <div>
              <!-- Example single danger button -->
              <div class="btn-group">
                <button type="button" class="btn-normal dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                  Short By <i class="bi bi-chevron-down"></i>
                </button>
                <ul class="dropdown-menu dropdown-edit dropdown-menu-lg-end shadow">
                  <li><a class="dropdown-item" href="#">Featured</a></li>
                  <li><a class="dropdown-item" href="#">Best selling</a></li>
                  <li><a class="dropdown-item" href="#">Alphabetically, A-Z</a></li>
                  <li><a class="dropdown-item" href="#">Alphabetically, Z-A</a></li>
                  <li><a class="dropdown-item" href="#">Price, low to high</a></li>
                  <li><a class="dropdown-item" href="#">Price, high to low</a></li>
                  <li><a class="dropdown-item" href="#">Date, old to new</a></li>
                  <li><a class="dropdown-item" href="#">Date, new to old</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row g-lg-4 g-3 justify-content-center" id="postList">
        <?php
        $count_query = "SELECT count(*) as allcount FROM my_products";
        $count_result = mysqli_query($mysqli, $count_query);
        $count_fetch = mysqli_fetch_array($count_result);
        $postCount = $count_fetch['allcount'];
        $limit = 16;
        $n = 1;
        $query = "SELECT * FROM my_products where d_status='0' and dl_status='0' ORDER BY id desc LIMIT 0," . $limit;
        $result = mysqli_query($mysqli, $query);
        if ($result->num_rows > 0) {
          while ($row = mysqli_fetch_assoc($result)) {

            $image_array = $global->ProductImage($row['token'], 500);
        ?>
            <!-- item -->
            <div class="col-lg-3 col-6">
              <div class="product-card">
                <div class="product-img">
                  <img src="<?php echo ADMIN_URL ?>uploads/product-image/thumb/<?php echo $image_array[0] ?>" alt="">
                  <img src="<?php echo ADMIN_URL ?>uploads/product-image/thumb/<?php echo $image_array[1] ?>" class="rear-img" alt="">
                  <?php
                  if (!empty($row['p_label'])) {
                    echo '<div class="new-arrival pulse2">' . $row['p_label'] . '</div>';
                  }
                  ?>

                </div>
                <div class="product-body">
                  <div class="product-name"><a target="_blank" href="<?php echo BASE_URL?>buy/<?php echo $row['slug']?>"><?php echo $row['product_name']?></a></div>
                  <div class="product-info">
                    &#8377;<?php echo $row['price'] ?> <s>&#8377;<?php echo $row['m_price'] ?></s></div>
                  <div class="product-add-cart">
                    <?php
                if($row['qty']>0){
                ?>
                    <button type="button" class="btn-cart productURL" data-url="<?php echo BASE_URL?>buy/<?php echo $row['slug']?>"><i class="bi bi-basket me-2"></i>Add To Cart</button>
                    <?php
                }else{
                    ?>
                    <button type="button" class="btn-cart alertForStock" data-id="<?php echo $row['token']?>"><i class="bi bi-envelope me-2"></i>Alert Me</button>
                    <?php
                }
                    ?>
                  </div>
                </div>
                <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
                <?php
                if($row['qty']>0){
                ?>
                <button type="button" class="btn-sold-out"><?php echo $row['percentage'] ?>% off</button>
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
            $n++;
          }
        } ?>


      </div>

      <div class="row justify-content-center mt-4">
        <div class="col-lg-3">
          <div class="loadmore">
            <button type="button" class="btn-normal w-100" id="loadBtn">
              <div class="spinner-border spinner-border-sm me-2" id="spinnerWheel" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>Load More
            </button>
            <input type="hidden" id="row" value="0">
            <input type="hidden" id="postCount" value="<?php echo $postCount; ?>">
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="offcanvas offcanvas-start" tabindex="-1" id="ProductFilter" aria-labelledby="ProductFilterLabel">
    <div class="offcanvas-header shadow-sm">
      <h5 class="offcanvas-title" id="ProductFilterLabel">Sort & Filter</h5>
      <button type="button" class="btn-close-cart" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-lg"></i></button>
    </div>
    <div class="offcanvas-body position-relative">
      <div class="cart-filter-list">
        <div class="filter-list-with-scroll">
          <ul>
            <?php
            $array = json_decode($product_row['filter_id'], true);
            foreach ($array as $key => $value) {
              $filter_name = $mysqli->query("select * from my_filters where id='" . $value . "'");
              $filter_name_row = $filter_name->fetch_assoc();
            ?>
              <li>
                <button class="btn-list-nav w-100" type="button" data-bs-toggle="collapse" data-bs-target="#Nav<?php echo $key ?>" aria-expanded="false" aria-controls="Nav<?php echo $key ?>">
                  <?php echo $filter_name_row['filter_name']; ?> <span><i class="bi bi-chevron-down"></i></span>
                </button>
                <div class="collapse filter-box" id="Nav<?php echo $key ?>">
                  <ul>
                    <?php
                    $filter_item = $mysqli->query("select * from my_filters_items where filter_id='" . $value . "' and dl_status='0'");
                    if ($filter_item_count = $filter_item->num_rows > 0) {
                      while ($filter_item_row = $filter_item->fetch_assoc()) {
                    ?>
                        <li>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label form-check-label-edit" for="defaultCheck1">
                              <?php echo $filter_item_row['name']; ?> <span>(0)</span></label>
                          </div>
                        </li>
                      <?php
                      }
                    } else {
                      ?>
                      <li>
                        No Filter Available
                      </li>
                    <?php
                    }
                    ?>
                  </ul>
                </div>
              </li>
            <?php
            }
            ?>
          </ul>
        </div>
      </div>
      <div class="cart-product-button">
        <button type="button" class="btn-normal w-100">View Result</button>
      </div>
    </div>
  </div>

  <?php
  include_once 'common/heighlight.php';
  include_once 'common/category-bottom.php';
  include_once 'common/footer.php';
  include_once 'common/extra-elements.php';
  include_once 'common/footer-script.php';
  ?>
  <script>
    $("#spinnerWheel").hide();
    $(document).ready(function() {
      $(document).on('click', '#loadBtn', function() {
        var baseUrl = "<?php echo BASE_URL; ?>";
        var row = Number($('#row').val());
        var count = Number($('#postCount').val());
        var limit = 16;
        row = row + limit;
        $('#row').val(row);
        $("#spinnerWheel").show();
        $.ajax({
          type: 'POST',
          url: baseUrl+'load-more-product.php',
          data: 'row=' + row,
          success: function(data) {
            $("#spinnerWheel").hide();
            var rowCount = row + limit;
            $('#postList').append(data);
            if (rowCount >= count) {
              //$('#loadBtn').css("display", "none");
              $("#loadBtn").val('No More Result');
            } else {
              $("#loadBtn").val('Load More');
            }
          }
        });
      });
    });
  </script>
</body>

</html>