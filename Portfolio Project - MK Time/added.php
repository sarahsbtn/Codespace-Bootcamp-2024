<?php
session_start(); // Start the session to access session variables

# Getting the product id from the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    # Open database connection
    require('connect_db.php');

    # Querying product information from the database
    $q = "SELECT * FROM products WHERE item_id = $id";
    $r = mysqli_query($link, $q);

    # Handling query result
    if (mysqli_num_rows($r) == 1) {
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);

        # Managing the cart
        if (isset($_SESSION['cart'][$id])) {
            # Increment quantity if already in the cart
            $_SESSION['cart'][$id]['quantity']++;
            $_SESSION['message'] = 'Another ' . $row["item_name"] . ' has been added to your cart.';
        } else {
            # Add item to cart
            $_SESSION['cart'][$id] = array('quantity' => 1, 'price' => $row['item_price']);
            $_SESSION['message'] = $row["item_name"] . ' has been added to your cart.';
        }
    }

    # close the database connection
    mysqli_close($link);
}

# Redirect to the appropriate collection page 
if ($id >= 1 && $id <= 8) {
    header("Location: ladies-collection.php");
} elseif ($id >= 9 && $id <= 16) {
    header("Location: mens-collection.php");
}
exit;
?>