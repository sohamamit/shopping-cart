<div class="col-lg-3">
<div class="white-box-round shadow-sm">
<div class="user-profile">
    <div class="d-flex align-items-center">
        <div class="profile-img">
            <div class="profile-img-box">
                <div class="profile-image">
                    <div class="profile-footer-action">
                        <div class="profile-thum-image">
                            <?php
                            include('assets/vendor/file-uploader/src/php/class.fileuploader.php');
                            $enabled = true;
                            $default_avatar = ADMIN_URL.'uploads/user-face/' . $profile_row['image'];
                            ?>
                            <input type="file" name="files" id="thumbnil_image" data-fileuploader-default="<?php echo $default_avatar; ?>" data-fileuploader-files='<?php echo isset($avatar) ? json_encode(array($avatar)) : ''; ?>' <?php echo !$enabled ? ' disabled' : '' ?>>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-txt">
            <span>Welcome</span>
            <H6><?php echo $profile_row['name'];?></H6>
            <span><i class="bi bi-clock me-1"></i> <?php echo date("dS M Y",strtotime($profile_row['ddate']));?></span>
            <a href="profile.php"><i class="bi bi-pen"></i></a>
        </div>
    </div>
</div>
<div class="white-box-body-left">
    <div class="main-left-nav">
        <ul>
            <li><a href="<?php echo BASE_URL;?>my-account.php"><i class="bi bi-house me-2"></i>Dashboard</a></li>
            <li><a href="#"><i class="bi bi-box2 me-2"></i>Orders<span class="badge rounded-pill bg-warning text-dark">0</span></a></li>
            <li><a href="#"><i class="bi bi bi-heart me-2"></i>Wishlist</a></li>
            <li><a href="#"><i class="bi bi-postcard-heart me-2"></i>Gift Cards</a></li>
            <li><a href="#"><i class="bi bi-tags me-2"></i>Coupons</a></li>
            <li><a href="<?php echo BASE_URL;?>saved-addresses.php"><i class="bi bi-geo-alt me-2"></i>Saved Addresses</a></li>
            <li><a href="<?php echo BASE_URL;?>logout.php"><i class="bi bi-power me-2"></i>Logout</a></li>
        </ul>
    </div>
</div>
</div>
</div>