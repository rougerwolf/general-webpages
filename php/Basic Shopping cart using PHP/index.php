<?php
session_start();

// Define products
$products = array(
    1 => array(
        'name' => 'Product 1',
        'price' => 10.99,
        'image' => 'product1.jpg'
    ),
    2 => array(
        'name' => 'Product 2',
        'price' => 19.99,
        'image' => 'product2.jpg'
    ),
    3 => array(
        'name' => 'Product 3',
        'price' => 5.99,
        'image' => 'product3.jpg'
    ),
	4 => array(
        'name' => 'Product 4',
        'price' => 21.99,
        'image' => 'product4.jpg'
    ),
	5 => array(
        'name' => 'Product 5',
        'price' => 8.99,
        'image' => 'product5.jpg'
    ),
	6 => array(
        'name' => 'Product 6',
        'price' => 14.99,
        'image' => 'product6.jpg'
    ),
	7 => array(
        'name' => 'Product 7',
        'price' => 12.99,
        'image' => 'product7.jpg'
    )
);

// Initialize cart
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Update cart
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity'] += 1;
    } else {
        $_SESSION['cart'][$product_id] = array(
            'name' => $products[$product_id]['name'],
            'price' => $products[$product_id]['price'],
            'quantity' => 1
        );
    }
} elseif (isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['product_id'];
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

// Get number of products in cart
function get_num_cart_items($product_id) {
    if (isset($_SESSION['cart'][$product_id])) {
        return $_SESSION['cart'][$product_id]['quantity'];
    }
    return 0;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart Example - Products</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
	
</head>
<body>
 <div class="container">
    <h1>Shopping Cart Example - Products</h1>
    <div class="row">
        <?php foreach ($products as $product_id => $product): ?>
            <div class="col-md-4">
                <div class="card mb-4 box-shadow">
                    <img class="card-img-top" src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                    <div class="card-body">
                        <h4 class="card-title"><?php echo $product['name']; ?></h4>
                        <p class="card-text">$<?php echo number_format($product['price'], 2); ?></p>
                        <form method="post">
                            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                            <button type="submit" class="btn btn-primary" name="add_to_cart">Add to Cart (<?php echo get_num_cart_items($product_id); ?>)</button>
                        </form>
                        <?php if (isset($_SESSION['cart'][$product_id])): ?>
                            <form method="post">
                                <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                                <button type="submit" class="btn btn-danger" name="remove_from_cart">Remove from Cart</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <a href="view_cart.php" class="btn btn-primary">View Cart</a>
</div>
</body>
</html>
