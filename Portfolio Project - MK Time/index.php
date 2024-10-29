<?php
include 'includes/header.php';
?>
<div>
    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel" data-interval="500"
        data-bs-pause="false">
        <div class="carousel-inner">
            <a href="#jump"><button class="button">OUR COLLECTIONS</button></a>
            <div class="carousel-item active">
                <div class="image-container"><img src="images/background1.jpg" class="d-block w-100" alt="..."></div>
            </div>
            <div class="carousel-item">
                <div class="image-container"><img src="images/background1-2.jpg" class="d-block w-100" alt="..."></div>
            </div>
            <div class="carousel-item">
                <div class="image-container"><img src="images/background1-3.jpg" class="d-block w-100" alt="..."></div>
            </div>
            <div class="carousel-item">
                <div class="image-container"><img src="images/background1-4.jpg" class="d-block w-100" alt="..."></div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
</div>

<div class="container-fluid" id="welcome">
    <div class="row justify-content-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <br>
            <h3 style="font-family: libre-baskerville-regular">WELCOME TO MK TIME</h3>
            <br>
            <hr>
            <br>
            <p>Welcome to MK Time, where exquisite craftsmanship meets timeless elegance. Our company specializes
                in luxury Swiss watches that are designed and manufactured in Edinburgh, curated to perfection for those
                with
                a discerning taste for sophistication.
                Each timepiece in our collection is a masterpiece, blending tradition with innovation to create a symbol
                of
                impeccable style and precision.

            <p>Indulge in the world of luxury and sophistication with MK Time. Explore our exquisite collection of Swiss
                watches
                and elevate your style to the next level. Discover the perfect timepiece that speaks to your
                individuality and
                makes a statement of elegance and refinement.
            </p>
            <p>All of our products are of the highest standard and quality,
                and come with a life-long gurantee of servicing and repair.
            </p>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

<div class="container-fluid" id="ourbestsellers">
    <h3 style="font-family: libre-baskerville-regular">OUR BESTSELLERS</h3>

    <?php
    # Open database connection.
    require('connect_db.php');

    $q = "SELECT * FROM products WHERE item_id IN (2, 9, 8)";
    $r = mysqli_query($link, $q);

    if (mysqli_num_rows($r) > 0) {
        echo '<div class="container"><div class="row justify-content-center">'; // Start the container and row
    
        while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            echo '
                    <div class="col-md-6 col-lg-3 mb-3"> <!-- Adjusted column sizes -->
                        <a href="product.php?id=' . $row['item_id'] . '"><div class="card text-center">
                            <div class="hover-zoom"><img src="' . $row['item_img'] . '" alt="' . $row['item_name'] . '" class="card-img-top"></div>
                            <div class="card-body">
                                <h5 class="card-title">' . $row['item_name'] . '</h5>
                                <h6  id="jump">' . ($row['item_id'] == 9 ? 'FOR HIM' : 'FOR HER') . '</h6>
                                <p class="card-text">' . $row['item_desc'] . '</p>
                                <h6><b>&pound;' . $row['item_price'] . '</b></h6>
                                <a href="added.php?id=' . $row['item_id'] . '" class="btn btn-light"><b>ADD TO CART</b></a>
                            </div>
                        </div></a>
                    </div>';
        }
        echo '</div></div><br><br>';
    }
    mysqli_close($link);
    ?>

    <div class="container-fluid" id="ourcollections">

        <h3 style="font-family: libre-baskerville-regular">OUR COLLECTIONS</h3>
        <h5>View our <a id="productshomepagelink" href="productsforher.html"><i>hers</i></a> and <a
                id="productshomepagelink" href="productsforhim.html"><i>his</i></a> collections</h5>

        <div class="row justify-content-center">
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                <div class="card mb-md-0 mb-2">
                    <img src="images/forher.jpg" alt="forher" id="ourcollectionsimages">
                    <div class="content">
                        <h5 style="color: #ffffff"><a id="ourcollectionslinks" href="ladies-collection.php">FOR HER</a>
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                <div class="card mb-md-0 mb-2">
                    <img src="images/forhim.jpg" alt="forhim" id="ourcollectionsimages">
                    <div class="content">
                        <h5 style="color: #ffffff"><a id="ourcollectionslinks" href="mens-collection.php">FOR HIM</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid" id="footnote">
        <div class="row justify-content-center">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <br>
                <hr>
                <br>
                <br>
                <p style="font-size: 1.1em">Your satisfaction is paramount to us. If you have any questions or need
                    assistance, please <a href="contactus.php" id="reachout"><i>reach out</i></a> to our dedicated team.
                </p>
                <p style="font-size: 1.1em">Join our family of watch enthusiasts! Follow us on social media and create
                    an account with us to recieve
                    exclusive offers and updates.</p>
                <br>
                <p style="font-size: 1.1em">Thank you for being part of the MK Time experience—where luxury meets
                    legacy.</p>
                <br>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>
</div>

<div class="hover-zoom-2" style="position:relative">
    <picture>
        <img src="images/background1-5.jpg" class="img-fluid" alt="backgroundwatch">
    </picture>
    <a href="#"><button class="button-2">OUR STORY</button></a>
</div>

</div>
<?php
include 'includes/footer.php';
?>