<?php
session_start();
include_once 'config/setting.php';
include_once 'functions/global.php';
include_once 'functions/function-email-sms.php';

$email_address = $_SESSION['temp_mobile'];
$pro_token = $_SESSION['otp_verification'];

// Mobile OTP Start
$request = $email_address;
$sms_text = urlencode('' . $pro_token . ' is the One Time Password (OTP). Use this OTP to validate your login or registration. Taxcomp Solutions Pvt Ltd.');
$template_id = '1707174921647416435';
$status = sendSMS($request, $sms_text, $template_id);
// Mobile OTP End
if($status==200){
echo json_encode(array("statusCode" => 200,"mobile"=>$request));
}else{
echo json_encode(array("statusCode" => 201,"mobile"=>$request));
}
