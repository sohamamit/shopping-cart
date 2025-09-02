<?php
session_start();
include_once 'config/setting.php';
include_once 'functions/global.php';

$email_address = $mysqli->real_escape_string($_POST['email_address']);
$pro_token = $mysqli->real_escape_string($_POST['pro_token']);

$query = "INSERT INTO  my_out_stock_alert SET email_address=?,pro_token=?";
$statement = $mysqli->prepare($query);
$statement->bind_param('ss', $email_address, $pro_token);

if ($statement->execute()) {

    echo json_encode(array("statusCode" => 200,));
} else {
    echo json_encode(array("statusCode" => 201));
}
$statement->close();
