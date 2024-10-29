<?php
# Submit the form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require('connect_db.php');
    require('login_tools.php');
    list($check, $data) = validate($link, $_POST['email'], $_POST['pass']);

    if ($check) {
        session_start();
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name'] = $data['last_name'];
        $_SESSION['email'] = $data['email'];

        header('Location: login.php');
    } else {
        $errors = $data;
    }

    mysqli_close($link);
}

include('login.php');
?>