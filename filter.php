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

<body>
    <?php
    // include_once 'common/header.php';
    ?>

    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#ProductFilter" aria-controls="ProductFilter">
        filter
    </button>

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
                        $array = array("Price", "By carat", "by origin", "By ratti", "by shape", "by certification", "Type");
                        foreach($array as $key=>$value){
                        ?>
                        <li>
                            <button class="btn-list-nav w-100" type="button" data-bs-toggle="collapse" data-bs-target="#Nav<?php echo $key?>" aria-expanded="false" aria-controls="Nav<?php echo $key?>">
                                <?php echo $value?> <span><i class="bi bi-chevron-down"></i></span>
                            </button>
                            <div class="collapse filter-box" id="Nav<?php echo $key?>">
                                Some placeholder content for the collapse component. This panel is hidden by default but revealed when the user activates the relevant trigger.
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
    // include_once 'common/footer.php';
    // include_once 'common/extra-elements.php';
    ?>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>