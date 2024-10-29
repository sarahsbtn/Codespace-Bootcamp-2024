<?php
include 'includes/header.php';
$pageTitle = 'Your Account'; // Set the title for this page

# Check if user is logged in
if (isset($_SESSION['user_id'])) {
    $user_name = $_SESSION['first_name'];
    $user_email = $_SESSION['email'];

    // Welcome message
    $welcome_message = "WELCOME, $user_name";
    $additional_message = "Check out your account to uncover the latest<br>
                           arrivals, and take full advantage of the exclusive perks<br>
                           designed just for you, ensuring you have a truly personalized experience!";


    echo <<<HTML
    <div class="image-container" style="padding: 0px">
        <picture>
            <img src="images/youraccountbackground2.jpg" class="img-fluid" alt="backgroundwatch">
        </picture>
        <div class="bottom-left-dark">
            <h2 style="font-family: libre-baskerville-regular; text-transform: uppercase" >$welcome_message</h2>
            <br>
            <h6>$additional_message</h6>
        </div>
    </div>

    <div class="container-fluid" id="youraccount">
        <div class="row justify-content-center">
            <div class="col-sm-8 col-md-8 col-lg-8">
                <div class="container-fluid" id="youraccountbox">
                    <h2 style="font-family: libre-baskerville-regular;">$user_name's Dashboard</h2>
                    <p>$user_email</p>
                    <hr style="padding: 15px; margin: auto; width: 85%">
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <a href="#">
                                <div class="accountinnerboxes">
                                    <i class="bi bi-person-circle" id="accounticons"></i>
                                    <br>
                                    <h5 class="account-title">Account</h5>
                                    <p style="font-size: 0.8em">Manage your personal information, including your name and address</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#">
                                <div class="accountinnerboxes">
                                    <i class="bi bi-tags-fill" id="accounticons"></i>
                                    <br>
                                    <h5 class="account-title">Orders</h5>
                                    <p style="font-size: 0.8em">View your order history and track the status of recent purchases</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#">
                                <div class="accountinnerboxes">
                                    <i class="bi bi-credit-card" id="accounticons"></i>
                                    <br>
                                    <h5 class="account-title">Payment Methods</h5>
                                    <p style="font-size: 0.8em">Manage your saved payment options safely and securely</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-4">
                            <a href="#">
                                <div class="accountinnerboxes">
                                    <i class="bi bi-heart" id="accounticons"></i>
                                    <br>
                                    <h5 class="account-title">Wishlist</h5>
                                    <p style="font-size: 0.8em">Keep track of your favourite watches and get alerts for promotions</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#">
                                <div class="accountinnerboxes">
                                    <i class="bi bi-arrow-repeat" id="accounticons"></i>
                                    <br>
                                    <h5 class="account-title">Returns</h5>
                                    <p style="font-size: 0.8em">Access information about our return and exchange policies</p>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <a href="#">
                                <div class="accountinnerboxes">
                                    <i class="bi bi-star-fill" id="accounticons"></i>
                                    <br>
                                    <h5 class="account-title">Membership</h5>
                                    <p style="font-size: 0.8em">Check your membership tier and benefits within our loyalty program</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <br>
                    <a href="logout.php" class="btn btn-light"><b>LOG OUT</b></a> <!-- Logout link -->
                </div>
            </div>
        </div>
    </div>
    HTML;
} else {
    # Display the login form if the user is not logged in
    ?>
    <div class="image-container" style="padding: 0px">
        <picture>
            <img src="images/youraccountbackground.jpg" class="img-fluid" alt="backgroundwatch">
        </picture>
        <div class="bottom-left">
            <h2 style="font-family: libre-baskerville-regular">YOUR ACCOUNT</h2>
            <br>
            Sign in to manage your account, place and<br> track your orders, checkout faster, <br>and more
        </div>
    </div>
    <div class="container-fluid" id="login">
        <div class="row justify-content-center">
            <h2 style="padding-left: 80px; font-family: libre-baskerville-regular">CUSTOMER LOGIN</h2>

            <div class="col-md-6 col-lg-5">
                <br>
                <h5 style="margin-left: 10px">Returning Customers</h5>
                <hr>
                <br>

                <!-- Error Message Display -->
                <?php if (isset($errors) && !empty($errors)): ?>
                    <p id="err_msg" class="alert alert-danger">
                        <?php foreach ($errors as $msg): ?>
                            <?php echo htmlspecialchars($msg); ?><br>
                        <?php endforeach; ?>
                    </p>
                <?php endif; ?>

                <div class="container">
                    <div class="col-sm-10">
                        <form action="login_action.php" method="post">
                            <label for="inputemail" class="form-label"><b>E-mail</b></label>
                            <input type="text" name="email" class="form-control" placeholder="Enter e-mail" required>
                            <br>
                            <br>
                            <label for="password" class="form-label"><b>Password</b></label>
                            <input type="password" name="pass" class="form-control" placeholder="Enter password" required>
                            <br>
                            <label>
                                Remember me <input type="checkbox" checked="checked" name="remember">
                            </label>
                            <p><a id="forgotpw" href="#">Forgot your password?</a></p>
                            <br>
                            <button type="submit" value="login" class="btn btn-dark" style="letter-spacing: 1.5px"><b>LOG
                                    IN</b></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5"><br>
                <br class="d-block d-md-none"><br class="d-block d-md-none">
                <h5 style="margin-left: 10px">New Customers</h5>
                <hr>
                <br>
                <p style="margin-left: 10px">Create an account with us to receive exclusive membership<br>
                    benefits, check out faster, keep more than one address, <br>
                    track orders and more.</p>
                <br>
                <a href="register.php"><button type="button" class="btn btn-dark"
                        style="letter-spacing: 1.5px; margin-left: 10px"><b>REGISTER</b></button></a>
            </div>
        </div>
    </div>

    <?php
}
include 'includes/footer.php';
?>