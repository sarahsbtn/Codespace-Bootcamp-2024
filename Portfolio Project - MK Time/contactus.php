<?php
$pageTitle = 'Contact Us';
include 'includes/header.php';

$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('connect_db.php');

    $errors = array();

    # Check for name
    if (empty($_POST['contact_name'])) {
        $errors[] = 'Please enter your name';
    } else {
        $cn = mysqli_real_escape_string($link, trim($_POST['contact_name']));
    }

    # Check for email
    if (empty($_POST['contact_email'])) {
        $errors[] = 'Please enter your email';
    } else {
        $ce = mysqli_real_escape_string($link, trim($_POST['contact_email']));
    }

    # Check for message
    if (empty($_POST['contact_message'])) {
        $errors[] = 'Please enter your message';
    } else {
        $cm = mysqli_real_escape_string($link, trim($_POST['contact_message']));
    }

    # Sumbit to contact_form in database
    if (empty($errors)) {
        $q = "INSERT INTO contact_form (contact_name, contact_email, contact_message) VALUES ('$cn', '$ce', '$cm')";
        $r = @mysqli_query($link, $q);
        if ($r) {
            $success_message = 'Thank you for contacting us. We aim to reply within 3 working days.';

            // Clear the form after submitting
            $_POST['contact_name'] = '';
            $_POST['contact_email'] = '';
            $_POST['contact_message'] = '';
        }

        mysqli_close($link);
    }
}
?>

<div class="image-container" style="padding: 0px">
    <picture>
        <img src="images/contactusbackground.jpg" class="img-fluid" alt="backgroundwatch">
    </picture>
    <div class="bottom-right2">
        <h2 style="font-family: libre-baskerville-regular">CONTACT US</h2>
        <br>
        If you have a question or query,<br> we'd love to hear from you
    </div>
</div>

<div class="container-fluid" id="contactus">
    <div class="row justify-content-center">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php if (!empty($success_message)): ?>
                <div class="alert alert-success" style="margin-top: 20px;">
                    <?php echo html_entity_decode($success_message, ENT_QUOTES, 'UTF-8'); ?>
                </div>
            <?php endif; ?>
            <h2 style="font-family: libre-baskerville-regular">CONTACT US</h2>
            <br>
            <br>
            <p>Our business hours are:</p>
            <p><b>Monday - Friday</p>
            <p>10am - 6pm</b></p>
            <br>
            <h6>Email</h6>
            <p>mktime@madeupmail.co.uk</p>
            <br>
            <h6>Call</h6>
            <p>0131 123 4567</p>
            <br>
            <h6>Write to us</h6>
            <p>MK Time</p>
            <p>8 Nonexistent Place</p>
            <p>Stockaree</p>
            <p>EH0 1AB</p>
            <p>Edinburgh</p>
            <br>
            <br>
            Or use our online contact form below
            <br>
            <br>
            <div class="container" id="contact-form-box">
                <form name="contact-form" action="" method="post" id="contact-form">

                    <!-- Input name -->
                    <label for="contact_name" class="form-label"><b>Name</b></label>
                    <input type="text" class="form-control" name="contact_name" style="margin: auto"
                        placeholder="Enter your name" required value="<?php if (isset($_POST['contact_name']))
                            echo $_POST['contact_name']; ?>">
                    <br>
                    <!-- Input email -->
                    <label for="contact_email" class="form-label"><b>E-mail</b></label>
                    <input type="text" class="form-control" name="contact_email" style="margin: auto"
                        placeholder="Enter your e-mail" required value="<?php if (isset($_POST['contact_email']))
                            echo $_POST['contact_email']; ?>">
                    <br>
                    <!-- Input message -->
                    <label for="contact_message" class="form-label"><b>Your Message</b></label>
                    <textarea class="form-control" name="contact_message" style="margin: auto"
                        placeholder="Write your message here..." rows="4" required value="<?php if (isset($_POST['contact_message']))
                            echo $_POST['contact_message']; ?>"></textarea></textarea>
                    <br />
                    <button type="submit" class="btn btn-dark" style="letter-spacing: 1.5px"><b>SEND</b></button>
                </form>

            </div>

        </div>
        <div class="col-sm-3"></div>
    </div>
</div>

<?php


include 'includes/footer.php';
?>