<?php
require "include/model.php";
$DB = new DB();

$product_id = $_GET['id'];
$position = $_GET['position'];

if (is_numeric($product_id)) {
    $where = " WHERE `id`='$product_id'";
} elseif (!empty($position)) {
    $where = " WHERE `position`='$position'";
} else {
    $where = "";
}

$results = $DB->select("SELECT * FROM `products` $where");

header('Content-type:application/json;charset=utf-8');
header('Access-Control-Allow-Origin: *');
echo json_encode(count($results) == 0 ? null : $results);