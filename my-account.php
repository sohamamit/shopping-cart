<?php
session_start();
include_once 'config/setting.php';
include_once 'functions/global.php';
include_once 'config/check-session-inbox.php';
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
    include_once 'img-css.php';
    include_once 'common/main-style.php';
    ?>

</head>

<body class="body-bg-gray">
    <?php
    include_once 'common/header.php';
    ?>


    <section class="sec-pd-70">
        <div class="container">
            <div class="row">
                <?php
                include_once 'leftlink.php';
                ?>
                
                <div class="col-lg-9">
                    <div class="white-box-round shadow-sm">
                        <div class="white-box-header">
                            <h3>My Account</h3>
                        </div>
                        <div class="white-box-body">
                           sdfdsfsd
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <?php
    include_once 'common/footer-plain.php';
    include_once 'common/extra-elements.php';
    include_once 'common/footer-script.php';
    ?>
    <script src="assets/js/home-page.js"></script>
    <?php
    include_once 'img-js.php';
    ?>
</body>

</html>