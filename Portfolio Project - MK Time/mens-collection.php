<?php
include 'includes/header.php';
$pageTitle = 'Mens Collection';
?>

<div class="image-container" style="padding: 0px">
    <picture>
        <img src="images/mensbackground.jpg" class="img-fluid" alt="mensbackground1" style="width:100%;">
    </picture>
    <div class="top-right">
        <h2 style="font-family: libre-baskerville-regular">LUXURY<br> WATCHES FOR<br> MEN</h2>
        <br>
        Discover a stunning collection of men’s watches<br> whether you
        are looking for a modern style, or<br> maybe something more timeless
    </div>
</div>

<div class="container-fluid" id="ourmenscollection">
    <br><br>

    <h3 style="font-family: libre-baskerville-regular">OUR MENS COLLECTION</h3>
    <br>
    <hr style="width: 60%; margin: auto">


    <?php
    // Display added to cart message
    if (isset($_SESSION['message'])) {
        echo '
    <div id="notification" class="alert alert-secondary notification-box" role="alert">
        <p>' . $_SESSION['message'] . '</p>
        <a href="cart.php">View your cart</a>
    </div>';

        unset($_SESSION['message']); // Clear message
    }

    # Open database connection
    require('connect_db.php');

    # Retrieve items from 'products' database table, ids 9 to 16 for him
    $q = "SELECT * FROM products WHERE item_id BETWEEN 9 AND 16";
    $r = mysqli_query($link, $q);

    if (mysqli_num_rows($r) > 0) {
        echo '<br><br><div class="container"><div class="row justify-content-center">'; // Start the container and row
    
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo
                '
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 mb-3"> <!-- Adjusted column sizes -->
                        <a href="product.php?id=' . $row['item_id'] . '"><div class="card text-center">
                            <div class="hover-zoom"><img src="' . $row['item_img'] . '" alt="' . $row['item_name'] . '" class="card-img-top"></div>
                                <div class="card-body">
                                    <h5 class="card-title">' . $row['item_name'] . '</h5>
                                    <p class="card-text">' . $row['item_desc'] . '</p>
                                    <h6><b>&pound;' . $row['item_price'] . '</b></h6>
                                    <a href="added.php?id=' . $row['item_id'] . '" class="btn btn-light"><b>ADD TO CART</b></a>
                                </div>
                            </div>
                        </a>
                    </div>';
        }

        echo '</div></div><br><br>
        <h3 style="font-family: libre-baskerville-regular; margin: 0px"><i>"Precision and power, designed for the 
        <br>modern man who values craftsmanship and sophistication<br> in every aspect of life."</i></h3><br><br>
        </div>'; // Close the row and container
    }

     # Close database connection
     mysqli_close($link);
     ?>

    <div class="hover-zoom-2" style="position:relative">
        <picture>
            <img src="images/mensbackground2.jpg" class="img-fluid" alt="backgroundwatch">
        </picture>
    </div>

    <?php
    include 'includes/footer.php';
    ?>