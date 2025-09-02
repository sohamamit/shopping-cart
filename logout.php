<?php
session_start();
include_once 'config/setting.php';
session_unset();
header('location:index.php');
?>