<?php
$pageTitle = 'Register'; // Specific title for this page
include 'includes/header.php';

$success_message = ''; // Success message
$show_form = true; // Show registration form or not

// If user is logged in or not 
if (isset($_SESSION['user_id'])) {
    $show_form = false; // Don't show the form
    $success_message = 'You are already logged in.';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('connect_db.php');

    $error_message = '';

    // Validate first name
    if (empty($_POST['first_name'])) {
        $error_message .= 'Enter your first name.<br>';
    } else {
        $fn = mysqli_real_escape_string($link, trim($_POST['first_name']));
    }

    // Validate last name
    if (empty($_POST['last_name'])) {
        $error_message .= 'Enter your last name.<br>';
    } else {
        $ln = mysqli_real_escape_string($link, trim($_POST['last_name']));
    }

    // Validate email and check for registration
    if (empty($_POST['email'])) {
        $error_message .= 'Enter your email address.<br>';
    } else {
        $e = mysqli_real_escape_string($link, trim($_POST['email']));
        // Check if email is already registered
        $q = "SELECT user_id FROM users WHERE email='$e'";
        $r = @mysqli_query($link, $q);
        if (mysqli_num_rows($r) != 0) {
            $error_message .= 'E-mail address already registered<br>';
        }
    }

    // Validate password only if no email errors
    if (empty($error_message)) {
        $pass_error = false;

        if (empty($_POST['pass1'])) {
            $error_message .= 'Enter your password.<br>';
        } else {
            if (strlen($_POST['pass1']) < 5) {
                $error_message .= 'Password must be at least 5 characters long<br>';
                $pass_error = true;
            }
            if ($_POST['pass1'] != $_POST['pass2']) {
                $error_message .= 'Passwords do not match<br>';
                $pass_error = true;
            }

            if (!$pass_error) {
                $p = mysqli_real_escape_string($link, trim($_POST['pass1']));
            }
        }
    }

    // Insert new user
    if (empty($error_message)) {
        $q = "INSERT INTO users (first_name, last_name, email, pass, reg_date) VALUES ('$fn', '$ln', '$e', '$p', NOW())";
        $r = @mysqli_query($link, $q);
        if ($r) {
            $success_message = 'You are now registered. <a class="alert-link" href="login.php">Login</a>';
            $show_form = false; // Hide form
        }
    }

    mysqli_close($link);
}
?>

<div class="image-container" style="padding: 0px">
    <picture>
        <img src="images/registerbackground.jpg" class="img-fluid" alt="backgroundwatch">
    </picture>
    <div class="bottom-right">
        <h2 style="font-family: libre-baskerville-regular">REGISTER</h2>
        <br>
        Create an account with us to receive exclusive membership<br> benefits, check out faster, keep
        more than<br> one address, track orders and more
    </div>
</div>

<div id="register">
    <div class="row justify-content-center">
        <div class="col-sm-3 col-md-1 col-lg-3"></div>

        <div class="col-sm-6 col-md-10 col-lg-6">
            <div class="container-fluid" id="register-box">
                <?php if (!empty($error_message)): ?>
                    <div class="alert alert-danger" style="margin-bottom: 20px;">
                        <?php echo html_entity_decode($error_message, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                <?php endif; ?>

                <?php if ($show_form): ?>
                    <h2 style="font-family: libre-baskerville-regular; text-align: center;">CREATE NEW<br> CUSTOMER
                        ACCOUNT</h2>
                    <br>
                    <h5>Personal details</h5>
                    <hr>
                    <form action="register.php" method="post">
                        <label for="title"><b>Title *</b></label>
                        <select class="form-select" style="margin: auto" name="title" required>
                            <option value="" selected>Please select</option>
                            <option value="1">Miss.</option>
                            <option value="2">Mr.</option>
                            <option value="3">Mrs.</option>
                            <option value="4">Ms.</option>
                            <option value="5">Dr.</option>
                        </select>

                        <br><br>

                        <label for="inputfirst_name" class="form-label"><b>First name *</b></label>
                        <input type="text" name="first_name" class="form-control" style="margin: auto"
                            placeholder="Enter your first name" required value="<?php if (isset($_POST['first_name']))
                                echo htmlspecialchars($_POST['first_name']); ?>">
                        <br><br>

                        <label for="inputlast_name" class="form-label"><b>Surname *</b></label>
                        <input type="text" name="last_name" class="form-control" style="margin: auto"
                            placeholder="Enter your last name" required value="<?php if (isset($_POST['last_name']))
                                echo htmlspecialchars($_POST['last_name']); ?>">

                        <br><br><br>
                        <h5>Sign-in information</h5>
                        <hr>
                        <br>

                        <label for="email" class="form-label"><b>E-mail *</b></label>
                        <input type="email" class="form-control" name="email" style="margin: auto"
                            placeholder="Enter your e-mail address" required value="<?php if (isset($_POST['email']))
                                echo htmlspecialchars($_POST['email']); ?>">

                        <br><br>

                        <label for="inputpass1" class="form-label"><b>Create a password *</b></label>
                        <input type="password" name="pass1" class="form-control" style="margin: auto"
                            placeholder="Create your password" required>
                        <p style="font-size: 0.7rem; padding-top: 2px"><b>Password must be at least 5 characters long</b>
                        </p>
                        <br>

                        <label for="inputpass2" class="form-label"><b>Confirm password *</b></label>
                        <input type="password" name="pass2" class="form-control" style="margin: auto"
                            placeholder="Confirm password" required>

                        <br>
                        <p>I confirm I have read and agreed with the <a id="tandcs" href="#">Terms and Conditions</a>.
                            <input type="checkbox" name="tandcs" required>
                        </p>
                        <br>
                        <button type="submit" class="btn btn-dark" style="letter-spacing: 1.5px"><b>REGISTER</b></button>
                    </form>
                <?php else: ?>
                    <div class="alert alert-info" style="margin-top: 20px;">
                        <?php echo $success_message; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
        <div class="col-sm-3 col-md-1 col-lg-3"></div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>