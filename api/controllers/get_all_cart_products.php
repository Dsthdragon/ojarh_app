<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Methods: PUT, GET, POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../config/Database.php';
include_once '../models/Controller.php';
include_once '../models/core.php';

//Instantiate DB & connect
// $database = new Database();
// $db = $database->connect();
$db = getDB();
$user = new Users($db);

if(isset($_SESSION['cart'])) { //if cart is available
	$products = [];
	$cart = $_SESSION['cart'];
	$counter = 0;

	foreach ($cart as $productid => $value) { //get product details of each cart items

		$result = $user->get_product_details($productid);

		$product_id = $result->productid;
		$product_name = $result->product_title;
		$product_img = $result->img0;

		$products[$counter] = ['product_id' => $product_id, 'product_title' => $product_name, 'product_img' => $product_img];
		$counter++;

	}

	 echo json_encode($products);

} else { // no item in cart
	 echo 0;
}

?>