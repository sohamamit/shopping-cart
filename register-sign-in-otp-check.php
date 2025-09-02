<?php
session_start();
include_once 'config/setting.php';
include_once 'functions/global.php';
include_once 'functions/function-email-sms.php';

$temp_mobile = $_SESSION['temp_mobile'];
$pro_otp = $_SESSION['otp_verification'];
$otp = $_POST['otp'];

if($pro_otp==$otp){

    $query = $mysqli->query("select * from my_users where mobile='".$temp_mobile."'");
    $row = $query->fetch_assoc();
    if($count = $query->num_rows==0){

        $token = md5($temp_mobile.$pro_otp.rand(100000,999999));
        $mobile_verify = 1;

        $query = "INSERT INTO my_users SET mobile=?,mobile_verify=?,token=?";
        $statement = $mysqli->prepare($query);
        $statement->bind_param('sis', $temp_mobile, $mobile_verify, $token);

        if ($statement->execute()) {
           
           unset($_SESSION['temp_mobile']);
           unset($_SESSION['otp_verification']);

           $_SESSION['token'] = $token;

           echo json_encode(array("statusCode" => 200, "msg" => 'OTP Verified.'));
            
        } else {
            echo json_encode(array("statusCode" => 201, "msg" => 'Sorry! something went wrong.'));
        }
        $statement->close();

    }else{
           unset($_SESSION['temp_mobile']);
           unset($_SESSION['otp_verification']);

           $_SESSION['token'] = $row['token'];

           echo json_encode(array("statusCode" => 200, "msg" => 'OTP Verified.'));
    }

}else{
    echo json_encode(array("statusCode" => 201, "msg" => 'Sorry! Wrong OTP Please enter valid OTP.'));
}
