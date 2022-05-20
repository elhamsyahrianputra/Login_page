<?php
require_once('config.php');

session_start();

if (isset($_SESSION['username'])) {
    header('Location: home.php');
}

if (!isset($_SESSION['confirm'])) {
    header('Location: forgot.php');
}

$data = getUserByUsername($_SESSION['confirm']);



if (isset($_POST['btn-change-password'])) {
    if ($_POST['new-password'] != $_POST['new-repassword']) {
        $error = 'New Password and Re-Password are not correct';
    } else {
        updateUserPassword($data['username'], $_POST['new-password']);
        session_destroy();
        header('Location: login.php');
    }
} else {
    $error = "";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm New Password</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="login-background">

    </div>

    <div class="content">
        <div class="content-image">

        </div>
        <div class="form-login">

            <h1>One Step to Back on Your Journey</h1>
            <p>Let's Finish It</p>

            <form action="" method="POST">
                <input type="password" name="new-password" placeholder="New Password">
                <input type="password" name="new-repassword" placeholder="New Re-Password">
                <button type="submit" class="btn" name="btn-change-password">Change Password</button>
                Remember your Account?<a href="login.php"> Log In</a>

                <h4 class="error-notif"><?= $error ?></h4>
            </form>
        </div>

    </div>
</body>

</html>