<?php

# Function to load specified or default URL.
function load($page = 'login.php')
{
    # Begin URL with protocol, domain, and current directory.
    $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']);

    # Remove trailing slashes then append page name to URL.
    $url = rtrim($url, '/\\');
    $url .= '/' . $page;

    # Execute redirect then quit. 
    header("Location: $url");
    exit();
}


# Function to check email address and password. 
function validate($link, $email = '', $pwd = '')
{
    # Initialize errors array.
    $errors = array();

    # Check email field.
    if (empty($email)) {
        $errors[] = 'Enter your email address.';
    } else {
        $e = mysqli_real_escape_string($link, trim($email));
    }

    # Check password field.
    if (empty($pwd)) {
        $errors[] = 'Enter your password.';
    } else {
        $p = mysqli_real_escape_string($link, trim($pwd));
    }

    // On success retrieve user_id, first_name, and last name from 'users' database.
    if (empty($errors)) {
        // Check if the email is registered first
        $checkEmailQuery = "SELECT user_id, first_name, last_name, email, pass FROM users WHERE email='$e'";
        $emailResult = mysqli_query($link, $checkEmailQuery);

        if (mysqli_num_rows($emailResult) == 1) {
            // Email is registered, check the password
            $row = mysqli_fetch_array($emailResult, MYSQLI_ASSOC);

            // Verify the password (
            if ($row['pass'] === $p) {
                return array(true, $row);
            } else {
                $errors[] = 'Incorrect password';
            }
        } else {
            $errors[] = 'Email address not registered';
        }
    }

    // On failure retrieve error message/s.
    return array(false, $errors);
}