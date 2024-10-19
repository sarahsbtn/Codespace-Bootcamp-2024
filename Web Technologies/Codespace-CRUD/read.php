<?php
include ('includes/nav.php');

# Open database connection.
require ('connect_db.php');

# Retrieve items from 'products' database table.
$q = "SELECT * FROM products";
$r = mysqli_query($link, $q);

if (mysqli_num_rows($r) > 0) {
    echo '<br><br><div class="container"><div class="row">'; // Start the container and row

    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        echo '
        <div class="col-md-3 mb-4"> 
            <div class="card" style="width: 100%;"> 
                <img src=' . $row['item_img'] . ' class="card-img-top" alt="Item image">
                <div class="card-body">
                    <h5 class="card-title text-center">' . $row['item_name'] . '</h5>
                    <p class="card-text">' . $row['item_desc'] . '</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><p class="text-center">&pound' . $row['item_price'] . '</p></li>
                    <li class="list-group-item btn btn-dark"><a class="btn btn-dark btn-lg btn-block" href="update.php?id=' . $row['item_id'] . '">Update</a></li>
                    <li class="list-group-item"><a class="btn btn-dark" href="delete.php?item_id=' . $row['item_id'] . '">Delete Item</a></li>
                </ul>
            </div>
        </div>'; 
    }

    echo '</div></div>'; 

} else {
    echo '<p style="padding: 30px">There are currently no items in the table to display.</p>';
}

# Close database connection.
mysqli_close($link);

include ('includes/footer.php');
?>
