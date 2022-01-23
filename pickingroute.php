<?php
require "include/model.php";
$DB = new DB();

$count = rand(5,10);
$random_ids = array();

for ($i = 1; $i <= $count; $i++) {
    $random_ids[] = rand(1, 60);
}

$data['initial_products_ids'] = $random_ids;
$in_values = implode(',', $random_ids);

$products_grouped = $DB->select("SELECT DISTINCT `gr`, COUNT(*) as `count` FROM `products` WHERE id IN ($in_values)  GROUP BY `gr` ORDER BY `count` DESC");
$data['picker'] = "P".$products_grouped['0']['gr'];
$data['groups_products'] = $products_grouped;

$i = 1;
$a = 1;
foreach($products_grouped as $group) {
    $gr = $group['gr'];
    if($a == 2) { $order = "DESC"; $a = 0;} else {$order = "ASC";}
    $data['steps'][$i] = $DB->select("SELECT id, name, col, row, position FROM `products` WHERE `gr`=$gr AND id IN ($in_values) ORDER BY `row` $order");
    $i++;
    $a++;
   
  }
header('Access-Control-Allow-Origin: *');
header('Content-type:application/json;charset=utf-8');
echo json_encode($data);

