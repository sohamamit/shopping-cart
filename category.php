<?php
session_start();
include_once 'config/setting.php';
include_once 'functions/global.php';
include_once 'config/check-session.php';
$style = 'C';

$category = $mysqli->query("select * from my_category where slug='".$_REQUEST['url']."'");
$category_row = $category->fetch_assoc();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <?php
  include_once 'common/bootstrap.php';
  ?>
  <link rel="stylesheet" href="<?php echo BASE_URL?>assets/vendor/OwlCarousel2-develop/dist/assets/owl.carousel.min.css" />
  <?php
  include_once 'common/main-style.php';
  ?>

</head>

<body>
  <?php
  include_once 'common/header.php';
  ?>
  <div class="in-page-header" data-img="<?php echo ADMIN_URL?>uploads/category-img/<?php echo $category_row['image']?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-12 bred-box">
                <div class="w-100">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item text-white"><a href="<?php echo BASE_URL;?>" class="text-white">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page"><?php echo $category_row['name']?></li>
                        </ol>
                    </nav>
                </div>
                <h1 class="inpage-cat-h1 text-white"><?php echo ucwords($category_row['cat_title'])?></h1>
                <p class="pb-3 text-white"><?php echo $category_row['cat_description']?></p>
            </div>
        </div>
    </div>
</div>

<?php
if($category_row['product_page']==0){
  $page_section = $mysqli->query("select * from my_page_section where pre_fix='".$style."' and d_status='0' and dl_status='0' order by position ASC");
  if($page_section_count = $page_section->num_rows>0){
    while($page_section_row = $page_section->fetch_assoc()){
        echo $page_section_row['html_content'];
    }
  }else{
    echo 'No Page Section Available';
  }
}else{
  ?>
<!-- product start -->
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
        $count_query = "SELECT count(*) as allcount FROM my_products where cat_id='".$category_row['id']."'";
        $count_result = mysqli_query($mysqli, $count_query);
        $count_fetch = mysqli_fetch_array($count_result);
        $postCount = $count_fetch['allcount'];
        $limit = 16;
        $n = 1;
        $query = "SELECT * FROM my_products where d_status='0' and dl_status='0' and cat_id='".$category_row['id']."' ORDER BY id desc LIMIT 0," . $limit;
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
 <!-- end product -->
  <?php
}
  ?>

  

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