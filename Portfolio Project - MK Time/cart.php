<?php
include 'includes/header.php';
$pageTitle = 'Shopping Cart';

$show_cart = true; // Show cart content or not
$message = ''; // Message variable

// Check if form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check for checkout action
    if (isset($_POST['action']) && $_POST['action'] === 'CHECKOUT') {
        // Ensure user is logged in
        if (isset($_SESSION['user_id']) && !empty($_SESSION['cart'])) {
            header('Location: checkout.php');
            exit();
        }
    }

    // Update changed quantity field values
    if (isset($_POST['qty'])) {
        foreach ($_POST['qty'] as $item_id => $item_qty) {
            $id = (int) $item_id;
            $qty = (int) $item_qty;

            # Change quantity or delete if zero
            if ($qty == 0) {
                unset($_SESSION['cart'][$id]);
            } elseif ($qty > 0) {
                $_SESSION['cart'][$id]['quantity'] = $qty;
            }
        }
    }
}

// Initialize grand total variable.
$total = 0;

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']); // Change 'user_id' to your actual session variable name

if ($isLoggedIn) {
    // Check if the cart is not empty.
    if ($show_cart && !empty($_SESSION['cart'])) {
        require('connect_db.php');

        # Retrieve all items in the cart from the 'products' database table
        $q = "SELECT * FROM products WHERE item_id IN (" . implode(',', array_keys($_SESSION['cart'])) . ") ORDER BY item_id ASC";
        $r = mysqli_query($link, $q);

        // Cart table/cartItems, to display different messages depending on login or if cart empty
        $cartItems = '';
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            $subtotal = $_SESSION['cart'][$row['item_id']]['quantity'] * $row['item_price'];
            $total += $subtotal;

            $cartItems .= "<tr>
                <td><img src='{$row['item_img']}' alt='{$row['item_name']}' style='width: 100px; height: auto;'></td>
                <td>{$row['item_name']}</td>
                <td><input type='text' size='3' name='qty[{$row['item_id']}]' value='{$_SESSION['cart'][$row['item_id']]['quantity']}'></td>
                <td>£" . number_format($row['item_price'], 2) . "</td>
                <td>£" . number_format($subtotal, 2) . "</td>
            </tr>";
        }

        mysqli_close($link);
    } }
?>

<div class="image-container" style="padding: 0px">
    <picture>
        <img src="images/shoppingcartbackground.jpg" class="img-fluid" alt="backgroundwatch">
    </picture>
    <div class="bottom-left-dark-2">
        <h2 style="font-family: libre-baskerville-regular">SHOPPING CART</h2>
        <br>
        View and update your shopping cart<br> and proceed to checkout
    </div>
</div>

<div class="container-fluid" id="shoppingcart">
    <div class="row justify-content-center">
        <div class="col-sm-8 col-md-8 col-lg-8"><br><br>
            <div class="container-fluid" id="shoppingcartbox">
                <?php if (!$show_cart): ?>
                    <div class="alert alert-warning" style="text-align: center;">
                        <?php echo $message; ?>
                    </div>
                <?php elseif (!isset($_SESSION['user_id'])): ?>
                    <div class="alert alert-secondary" style="text-align: center;">
                        Please log in to view your cart
                    </div>
                <?php elseif (empty($_SESSION['cart'])): ?>
                    <div class="alert alert-secondary" style="text-align: center;">
                        Your cart is currently empty
                    </div>
                <?php else: ?>
                    <h2 class="text-center" style="font-family: libre-baskerville-regular">SHOPPING CART</h2>
                    <hr>
                    <form action="cart.php" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php echo $cartItems; ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align: center;">
                                        <button type="submit" name="action" value="UPDATE" class="btn"
                                            style="letter-spacing: 1.5px; padding: 5px 10px; font-size: 0.75em;">
                                            <strong>UPDATE</strong>
                                        </button>
                                    </td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="5" style="text-align: left;">
                                        <strong>Total:
                                            <span class="float-end">£<?php echo number_format($total, 2); ?></span>
                                        </strong>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </form>
                    <form action="checkout.php" method="post">
                        <input type="hidden" name="total" value="<?php echo $total; ?>">
                        <button type="submit" name="action" value="CHECKOUT" class="btn" style="letter-spacing: 1.5px">
                            <strong>CHECKOUT</strong></button>
                    </form>
                <?php endif; ?>
            </div><br>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>