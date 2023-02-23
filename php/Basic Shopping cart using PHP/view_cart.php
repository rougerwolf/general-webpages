<?php
session_start();

// Get total price of items in cart
function get_total_price() {
    $total_price = 0;
    foreach ($_SESSION['cart'] as $product) {
        $total_price += $product['price'] * $product['quantity'];
    }
    return $total_price;
}

// Update cart
if (isset($_POST['update_cart'])) {
    foreach ($_POST['quantity'] as $product_id => $quantity) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;
        }
    }
} elseif (isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['product_id'];
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart Example - View Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script></head>
	<link rel="stylesheet" href="/prototypes/cart/styles.css">
<body>
    <div class="container mt-5">
        <h1>Shopping Cart Example - View Cart</h1>
        <?php if (!empty($_SESSION['cart'])): ?>
            <form method="post">
                <table class="table">
                    <thead>
                        <tr>
							<th>Product</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $product_id => $product): ?>
                            <tr>
								<td><img src="<?php echo $products[$product_id]['image']; ?>" alt="<?php echo $product['name']; ?>" width="50"></td>
                                <td><?php echo $product['name']; ?></td>
                                <td>$<?php echo number_format($product['price'], 2); ?></td>
                                <td>
                                    <input type="number" class="form-control" name="quantity[<?php echo $product_id; ?>]" value="<?php echo $product['quantity']; ?>" min="1">
                                </td>
                                <td>$<?php echo number_format($product['price'] * $product['quantity'], 2); ?></td>
                                <td>
                            <form method="POST">
								<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
								<button type="submit" name="remove_from_cart" class="btn btn-danger btn-sm">Remove</button>
							</form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        <tr>
                            <td colspan="3"></td>
                            <td>Total: $<?php echo number_format(get_total_price(), 2); ?></td>
                            <td>
                                <button type="submit" class="btn btn-primary" name="update_cart" value="1">
                                    Update Cart
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <a href="index.php" class="btn btn-primary">Continue Shopping</a><br><br>
			<form method="post" action="checkout.php">
				<button type="submit" name="checkout" class="btn btn-primary">Checkout</button>
			</form>

        <?php else: ?>
            <p>Your cart is empty.</p>
            <a href="index.php" class="btn btn-primary">Continue Shopping</a>
        <?php endif; ?>
    </div>
</body>
</html>

