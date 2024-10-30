<?php
$pageTitle = 'View Product';
include 'includes/header.php';
?>

<div class="container-fluid" id="product-page">
    <!-- Breadcrumb nav -->
    <nav aria-label="breadcrumb" style="padding: 20px 20px;">
        <ol class="breadcrumb" style="font-size: 1.25em;">
            <li class="breadcrumb-item"><a href="index.php" id="#breadcrumblinks">Home</a></li>
            <?php
            require('connect_db.php');

            if (isset($_GET['id'])) {
                $product_id = (int) $_GET['id'];
                $collection = '';

                // Collection link based ID
                if ($product_id >= 1 && $product_id <= 8) {
                    $collection = 'Ladies Collection';
                } elseif ($product_id >= 9 && $product_id <= 16) {
                    $collection = 'Mens Collection';
                }

                // Display relevant link
                echo '<li class="breadcrumb-item"><a href="' . strtolower(str_replace(' ', '-', $collection)) . '.php" id="#breadcrumblinks">' . $collection . '</a></li>';

                // Product name
                $q = "SELECT item_name FROM products WHERE item_id = $product_id";
                $r = mysqli_query($link, $q);

                if ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
                    echo '<li class="breadcrumb-item active" aria-current="page">' . htmlspecialchars($row['item_name']) . '</li>';
                }
            }
            ?>
        </ol>
    </nav>

    <?php
    require('connect_db.php');

    if (isset($_GET['id'])) {
        $product_id = (int) $_GET['id'];
        $q = "SELECT * FROM products WHERE item_id = $product_id";
        $r = mysqli_query($link, $q);

        if ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            ?>
            <div class="container product-details">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-5">
                        <br>
                        <div class="image-zoom-container">
                            <img src="<?= $row['item_img'] ?>" alt="<?= htmlspecialchars($row['item_name']) ?>"
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6">
                        <br>
                        <h1><?= htmlspecialchars($row['item_name']) ?></h1>
                        <h5><?= htmlspecialchars($row['item_desc']) ?></h5><br>
                        <p><?= htmlspecialchars($row['item_desc_product_page']) ?></p><br>
                        <h5 class="price"><b>&pound;<?= $row['item_price'] ?></b></h5><br>
                        <div style="border: 1px solid #ccc; padding: 15px">
                            <h6>Finance Options Available</h6>
                            <p style="margin-bottom: 0px">Flexible payment plans tailored to your budget. View your options <a
                                    href="#" id="finance"><i>here</i></a></p>
                        </div>
                        <br>
                        <h6 style="color: green"><strong><i class="bi bi-check" style="font-size: 1.3em"></i>In stock</strong>
                        </h6>
                        <p style="display: inline;">Order by 3 PM for next-day delivery - </p>
                        <span id="countdown" style="font-weight: bold; display: inline;"></span><br><br>
                        <a href="added.php?id=<?= $row['item_id'] ?>" class="btn btn-light" style="font-size: 1em"><b>ADD TO CART</b></a>
                    </div>
                </div>
            </div>
            <?php
        } else {
            echo '<div class="container"><p>Product not found.</p></div>';
        }
    } else {
        echo '<div class="container"><p>No product selected.</p></div>';
    }
    ?>
    <br><br>
    <div class="row">
        <div class="col-md-5" style="margin: auto">
            <hr style="width: ">
            <br>
            <h3 style="font-family: libre-baskerville-regular; margin: 0px; text-align: center"><i>
                    "Craftsmanship, heritage, and artistry converge in our luxury timepieces. Each watch
                    is a masterpiece, designed to capture the essence of elegance and the spirit of
                    adventure. With every tick, you don’t just measure time—you celebrate life’s milestones
                    and the memories that last forever."</i></h3>
        </div>
    </div>
    <br><br><br>
</div>

<?php
include 'includes/footer.php';
?>