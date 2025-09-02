<?php
session_start();
include_once 'config/setting.php';
include_once 'functions/global.php';

if (isset($_POST['row'])) {
  $start = $_POST['row'];
  $limit = 16;
  $query = "SELECT * FROM my_products where d_status='0' and dl_status='0' ORDER BY id desc LIMIT " . $start . ",".$limit;
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
            <div class="product-name"><a href=""><?php echo $row['product_name'] ?></a></div>
            <div class="product-info">
              &#8377;<?php echo $row['price'] ?> <s>&#8377;<?php echo $row['m_price'] ?></s></div>
            <div class="product-add-cart">
              <?php
              if ($row['qty'] > 0) {
              ?>
                <button type="button" class="btn-cart productURL" data-url="<?php echo BASE_URL?>buy/<?php echo $row['slug']?>"><i class="bi bi-basket me-2"></i>Add To Cart</button>
              <?php
              } else {
              ?>
                <button type="button" class="btn-cart alertForStock" data-id="<?php echo $relatied_pro_row['token']?>"><i class="bi bi-envelope me-2"></i>Alert Me</button>
              <?php
              }
              ?>
            </div>
          </div>
          <button type="button" class="btn-wishlist"><i class="bi bi-heart"></i></button>
          <?php
          if ($row['qty'] > 0) {
          ?>
            <button type="button" class="btn-sold-out"><?php echo $row['percentage'] ?>% off</button>
          <?php
          } else {
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
}
?>