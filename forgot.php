<?php
require_once('config.php');

session_start();
if (isset($_SESSION['username'])) {
    header('Location: home.php');
}

if (isset($_POST['btn-confirm'])) {
    $data = getUserByUsername($_POST['username']);

    if ($data == null) {
        $error = 'Username, Date of Birth, and Mother Name are not correct';
    } elseif (
        $data['username'] == $_POST['username']
        && $data['date'] == $_POST['date']
        && $data['mother_name'] == $_POST['mother-name']
    ) {
        $_SESSION['confirm'] = $_POST['username'];
        header('Location: forgot_change_pass.php');
    } else {
        $error = 'Username, Date of Birth, and Mother Name are not correct';
    }
} else {
    $_POST['username'] = '';
    $_POST['date'] = '';
    $_POST['mother-name'] = '';

    $error = "";
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="login-background">

    </div>

    <div class="content">
        <div class="content-image">

        </div>
        <div class="form-login">

            <h1>Did You Lost on Your Journey?</h1>
            <p>Let Us help you</p>

            <form action="" method="POST">
                <input type="text" id="username" name="username" placeholder="Username atau Email" value="<?= $_POST['username'] ?>" required>
                <input type="date" name="date" value="<?= $_POST['date'] ?>" required>
                <input type="text" name="mother-name" placeholder="Mother's Name" value="<?= $_POST['mother-name'] ?>" required>

                <button type="submit" class="btn" name="btn-confirm">Confirm</button>
                Remember your Account?<a href="login.php"> Log In</a>

                <h4 class="error-notif"><?= $error; ?></h4>

            </form>
        </div>

    </div>
</body>

</html>