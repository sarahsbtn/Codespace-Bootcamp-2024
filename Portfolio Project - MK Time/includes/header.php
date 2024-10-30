<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php
    $prefix = 'MK Time | Luxury and Designed Swiss Watches | ';
    echo isset($pageTitle) ? htmlspecialchars($prefix . $pageTitle) : htmlspecialchars($prefix . 'Default Title');
    ?></title>
    <link rel="icon" type="image/png" href="images/logothumbnail.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="scripts/app.js"></script>
    <script src="scripts/common.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Raleway:ital,wght@0,100..900;1,100..900&family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body onload="document.body.style.opacity='1'">
    <div id="promo">
        <div>Next day delivery available until 3pm</div>
        <div style="display:none;">Free shipping on orders over £5,000</div>
        <div style="display:none;">Pay nothing today with interest free finance</div>
        <div style="display:none;">Free gift with selected watches</div>
    </div>

    <header class="container-fluid">
        <div class="header">
            <center><a href="index.php"><img id="logo" src="images/logo.png" class="img-fluid" alt="logo"></a></center>
            <?php
            // Check if the user is logged in
            $isLoggedIn = isset($_SESSION['user_id']);
            ?>

            <nav class="navbar sticky-top navbar-expand-lg navbar-dark" id="navsearchcart" style="z-index: 7000;">
                <div class="container-fluid justify-content-end">
                    <div class="collapse navbar-collapse flex-grow-0" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown dropstart" id="searchDropdown">
                                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="bi-search"></i>
                                </a>
                                <ul class="dropdown-menu" id="searchbar">
                                    <form class="d-flex" role="search" id="searchbox">
                                        <input class="form-control me-2" type="search" name="query" placeholder="Search"
                                            id="searchinput" aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit"
                                            id="search-button">Search</button>
                                    </form>
                                </ul>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="cart.php"><i class="bi-bag" id="cart"></i></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                    <i class="bi-person-circle" id="account"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" id="collectiondropdown"
                                    style="border: 1px solid #E2DFD2; border-style: inset;">
                                    <?php if ($isLoggedIn): ?> <!-- Change dropdown display if logged in or not -->
                                        <li><a class="dropdown-item" href="login.php">MY ACCOUNT</a></li>
                                        <li><a class="dropdown-item" href="logout.php">LOGOUT</a></li>
                                    <?php else: ?>
                                        <li><a class="dropdown-item" href="register.php">REGISTER</a></li>
                                        <li><a class="dropdown-item" href="login.php">LOGIN</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <nav class="navbar sticky-top navbar-expand-lg navbar-dark" id="navbarmain">
                <div class="container-fluid justify-content-center">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse flex-grow-0" id="collapsibleNavbar">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown" id="navbar2">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">OUR
                                    COLLECTIONS</a>
                                <ul class="dropdown-menu" id="collectiondropdown"
                                    style="border: 1px solid #E2DFD2; border-style: inset;">
                                    <li><a class="dropdown-item" href="ladies-collection.php">FOR HER</a></li>
                                    <li><a class="dropdown-item" href="mens-collection.php">FOR HIM</a></li>
                                </ul>
                            </li>
                            <li class="nav-item" id="navbar2">
                                <a class="nav-link" href="#">ACCESSORIES</a>
                            </li>
                            <li class="nav-item" id="navbar2">
                                <a class="nav-link" href="#">SERVICES AND REPAIR</a>
                            </li>
                            <li class="nav-item" id="navbar2">
                                <a class="nav-link" href="contactus.php">CONTACT US</a>
                            </li>
                            <li class="nav-item" id="navbar2">
                                <a class="nav-link" href="login.php">YOUR ACCOUNT</a>
                            </li>
                            <li class="nav-item" id="navbar2">
                                <a class="nav-link" href="register.php">REGISTER</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>