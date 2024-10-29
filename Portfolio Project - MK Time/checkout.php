<?php
include 'includes/header.php';
$page_title = 'Checkout';
require('connect_db.php');

# Redirect if not logged in.
if (!isset($_SESSION['user_id'])) {
    require('login_tools.php');
    load();
}

# Variables
$order_id = null;
$message = '';

# Check for passed total and cart.
if (isset($_POST['total']) && ($_POST['total'] > 0) && !empty($_SESSION['cart'])) {

    # Store buyer and order total in 'orders' database table.
    $q = "INSERT INTO orders (user_id, total, order_date) VALUES (" . $_SESSION['user_id'] . ", " . $_POST['total'] . ", NOW())";

    if ($r = mysqli_query($link, $q)) {
        $order_id = mysqli_insert_id($link);

        # Retrieve cart items from 'products' database table.
        $q = "SELECT * FROM products WHERE item_id IN (" . implode(',', array_keys($_SESSION['cart'])) . ") ORDER BY item_id ASC";
        $r = mysqli_query($link, $q);

        # Store order contents in 'order_contents' database table.
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            $query = "INSERT INTO order_contents (order_id, item_id, quantity, price) VALUES ($order_id, " . $row['item_id'] . ", " . $_SESSION['cart'][$row['item_id']]['quantity'] . ", " . $_SESSION['cart'][$row['item_id']]['price'] . ")";
            mysqli_query($link, $query);
        }

        # Success message 
        $message = "Thanks for your order! Your order number is #$order_id";

        # Empty cart 
        $_SESSION['cart'] = NULL;
    } else {
        $message = "Error: " . mysqli_error($link);
    }
} else {
    $message = 'There are no items in your cart';
}

# Close database connection
mysqli_close($link);
?>

<div class="container-fluid" id="checkout">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-6 col-lg-4">
            <?php if ($message): ?>
                <div class="alert <?php echo isset($order_id) ? 'alert-success' : 'alert-danger'; ?> text-center"
                    role="alert">
                    <p><?php echo $message; ?></p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include('includes/footer.php'); ?>