<?php
session_start();
require('config.php');

if (isset($_SESSION['username'])) {
    header('Location: home.php');
}

if (isset($_POST['btn-login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $data = getUserByUsername($username);

    if ($data == null) {
        $error = true;
    } else {
        if ($data['username'] == $username && $data['password'] == $password) {

            $_SESSION['username'] = $_POST['username'];
            header('Location: home.php');
        } else {
            $error = true;
        }
    }
} else {
    $username = "";
    $password = "";
    $error = false;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Login Page Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="login-background">

    </div>

    <div class="content">
        <div class="content-image">

        </div>
        <div class="form-login">

            <h1>Welcome Capt !</h1>
            <p>Let's Start Your Journey</p>
            <form action="" method="POST">
                <input type="text" id="username" name="username" placeholder="Username atau Email" value="<?= $username ?>">


                <input type="password" id="password" name="password" placeholder="Password" value="<?= $password ?>">

                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                        Remember Me
                    </label>

                    <a href="forgot.php" id="forgot-password">Forgot Password?</a>
                </div>



                <button type="submit" class="btn-login" name="btn-login">Login</button>

                <div class="or-line">
                    - - - - - - - - - - - - - Or - - - - - - - - - - - - -
                </div>

                <button type="button" class="btn-another-login"><img src="assets/icon/google.png">Login With Google</button>
                <button type="button" class="btn-another-login"><img src="assets/icon/facebook.png">Login With Facebook</button>
                Don't Have an Account?<a href="signup.php"> Sign Up</a>

                <?php
                if ($error == true) : ?>
                    <h4 class="error-notif">Username or Password is wrong!</h4>
                <?php endif ?>
            </form>
        </div>

    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>