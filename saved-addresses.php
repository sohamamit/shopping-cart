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


    <section class="sec-pd-35">
        <div class="container">
            <div class="row">
                <?php
                include_once 'leftlink.php';
                ?>

                <div class="col-lg-9">
                    <div class="white-box-round shadow-sm white-box-round-height">
                        <div class="white-box-header d-flex justify-content-between align-items-center">
                            <div>
                                <h3>Addresses</h3>
                            </div>
                            <div>
                                <button class="btn-normal btn-cart-sm" data-bs-toggle="modal" data-bs-target="#addressBook"><i class="bi bi-plus-lg me-2"></i>Add New</button>
                            </div>
                        </div>
                        <div class="white-box-body">
                            <div class="row g-3">
                    <!-- item -->
                    <div class="col-lg-4 col-12">
                      <div class="address-in-box" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Click to Select Address">
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
                        <button type="button" class="btn-close-sm"><i class="bi bi-check2-all"></i></button>
                      </div>
                    </div>
                    <!-- end item -->
                  </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="addressBook" tabindex="-1" aria-labelledby="addressBookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body modal-body-cm">
                    <button type="button" class="btn-close-edit" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
                    <div class="modal-body-new">
                        <div class="modal-header-new d-flex justify-content-between align-items-center">
                            <h3 class="head-one">Add New Address</h3>
                        </div>
                        <form id="formsubmit">
                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" data-validation="required">
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">Mobile</label>
                                    <input type="text" class="form-control" name="phone" data-validation="required">
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" class="form-control" name="email" data-validation="required">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="" class="form-label">Address One</label>
                                    <input type="text" class="form-control" name="address_one" data-validation="required">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="" class="form-label">Address Two</label>
                                    <input type="text" class="form-control" name="address_two" data-validation="required">
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">State</label>
                                    <select class="form-control" name="state" id="state" onchange="GetCity(this.value);">
                                        <option value="">Select State</option>
                                        <?php
                                        $state = $mysqli->query("select * from my_states where country_id='101'");
                                        while ($state_row = $state->fetch_assoc()) {
                                            echo '<option value="' . $state_row['id'] . '">' . $state_row['name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">City</label>
                                    <select class="form-control" name="city" id="city">
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">Pin / Zip Code</label>
                                    <input type="text" class="form-control" name="pin_code" data-validation="required">
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">Property Type</label>
                                    <select class="form-control" data-validation="required" name="prop_type">
                                        <option value="0">Home</option>
                                        <option value="1">Office</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="" class="form-label">Mark Default Address</label>
                                    <select class="form-control" data-validation="required" name="default_address">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn-normal"><div class="spinner-border spinner-border-sm me-2" id="SpinnerBorder20" role="status">
  <span class="visually-hidden">Loading...</span>
</div>Save Address</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php
    include_once 'common/footer-plain.php';
    include_once 'common/extra-elements.php';
    include_once 'common/footer-script.php';
    ?>
    <script src="assets/js/home-page.js"></script>
    <?php
    include_once 'img-js.php';
    ?>
    <script>
        function GetCity(val) {
            $.ajax({
                url: 'get-city.php',
                type: 'POST',
                data: {
                    id: val
                },
                success: function(response) {
                    $("#city").html(response);
                }
            });
        };
    </script>
    <script>
        $("#SpinnerBorder20").hide();
        $("#formSubmit").on('submit', (function(e) {
            e.preventDefault();
            $("#SpinnerBorder20").show();
            $(':input[type="submit"]').prop('disabled', true);
            $.ajax({
                url: "saved-addresses-action.php",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult !== null) {
                        $("#SpinnerBorder20").hide();
                        $(':input[type="submit"]').prop('disabled', false);
                        if (dataResult.statusCode == 200) {
                            if (dataResult.reset == "yes") {
                                $("#formSubmit").trigger('reset');
                            }
                            Swal.fire({
                                title: dataResult.title,
                                text: dataResult.msg,
                                icon: dataResult.error,
                                confirmButtonText: 'Ok'
                            });

                        } else {
                            Swal.fire({
                                title: dataResult.title,
                                text: dataResult.msg,
                                icon: dataResult.error,
                                confirmButtonText: 'Ok'
                            });
                        }
                    }
                },
                error: function() {}
            });
        }));
    </script>
</body>

</html>