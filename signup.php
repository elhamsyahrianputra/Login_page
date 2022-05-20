<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION['username'])) {
        header('Location: home.php');
    }

    if (isset($_POST['btn-signup'])) {

        include_once("config.php");

        if ($data = getUserByUsername($_POST['username']) == null) {
            if ($_POST['password'] != $_POST['re-password']) {
                $wrong = true;
                $error = false;
            } else {
                adduser($_POST['username'], $_POST['password'], $_POST['name'], $_POST['date'], $_POST['mother-name']);
                session_start();
                $_SESSION['username'] = $_POST['username'];
                header('Location: home.php');
            }
        } else {
            $error = true;
        }
    } else {
        $_POST['username'] = "";
        $_POST['name'] = "";
        $_POST['date'] = "";
        $_POST['mother-name'] = "";
        $error = false;
        $wrong = false;
    }
    ?>
    <div class="login-background">

    </div>

    <div class="content" style="height: 75%;">
        <div class="content-image">

        </div>
        <div class="form-login">

            <h1>Sign Up</h1>
            <p>To Explore Our Journey</p>
            <form action="" method="POST">

                <input type="text" name="username" placeholder="Username" value="<?= $_POST['username'] ?>" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="re-password" placeholder="Re-Password" required>
                <input type="text" id="name" name="name" placeholder="Fullname" value="<?= $_POST['name'] ?>" required>
                <input type="date" name="date" required value="<?= $_POST['date']; ?>">
                <input type="text" name="mother-name" value="<?= $_POST['mother-name']; ?>" placeholder="Mother's Name" required>


                <button type="submit" class="btn" name="btn-signup">Sign Up</button>

                Already Have an Account?<a href="login.php"> Log In</a>

                <?php if ($error == true) : ?>
                    <h4 class="error-notif">Username Already Taken!</h4>
                <?php elseif ($wrong == true) : ?>
                    <h4 class="error-notif">Those passwords didn't match</h4>
                <?php endif ?>

            </form>
        </div>

    </div>
</body>

</html>