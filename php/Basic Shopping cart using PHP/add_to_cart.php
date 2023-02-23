<?php
session_start();

// Check if product ID is provided
if (isset($_GET['id'])) {
	$product_id = $_GET['id'];

	// Check if product already exists in cart
	if (isset($_SESSION['cart'][$product_id])) {
		// Increment product quantity
		$_SESSION['cart'][$product_id]['quantity']++;
	} else {
		// Add product to cart
		$product_name = "Product " . $product_id;
		$product_price = $product_id * 10;
		$_SESSION['cart'][$product_id] = array(
			'name' => $product_name,
			'price' => $product_price,
			'quantity' => 1
		);
	}

	// Redirect back to product list
	header('Location: index.php');
	exit;
}
