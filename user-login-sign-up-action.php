<?php
session_start();
include_once 'config/setting.php';
include_once 'functions/global.php';
include_once 'functions/function-email-sms.php';


$user_mobile_number = $mysqli->real_escape_string($_POST['user_mobile_number']);

$otp = rand(100000, 999999);

$_SESSION['otp_verification'] = $otp;
$_SESSION['temp_mobile'] = $user_mobile_number;

// Mobile OTP Start
$request = $user_mobile_number;
$sms_text = urlencode('' . $otp . ' is the One Time Password (OTP). Use this OTP to validate your login or registration. Taxcomp Solutions Pvt Ltd.');
$template_id = '1707174921647416435';
$status = sendSMS($request, $sms_text, $template_id);
// Mobile OTP End
if($status==200){
echo json_encode(array("statusCode" => 200,"mobile"=>$request));
}else{
echo json_encode(array("statusCode" => 201,"mobile"=>$request));
}

