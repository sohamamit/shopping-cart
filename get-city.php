<?php
session_start();
include_once 'config/setting.php';
include_once 'config/check-session.php';
include_once 'functions/global.php';

$id = $_POST['id'];

echo $global->CountryStateCityByID(2, $id);