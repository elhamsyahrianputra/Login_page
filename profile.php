<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}


require_once('config.php');

$data = getUserByUsername($_SESSION['username']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body>

    <div class="home-background">

    </div>

    <nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: darkviolet;">
        <div class="container">
            <a class="navbar-brand" href="#">Riel Project</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Post</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Story</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn btn-light text-dark" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle" style="margin-right: 6px; color: darkviolet;"></i><?= $data['username']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="logout.php" style="font-weight: 600;">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="welcome">
        <div class="mb-3 row bg-light">
            <label for="staticEmail" class="col-sm-4 col-form-label text-dark">Name</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext text-dark" id="staticEmail" value="<?= $data['name']; ?>">
            </div>
            <label for="staticEmail" class="col-sm-4 col-form-label text-dark">Birth Day</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext text-dark" id="staticEmail" value="<?= $data['date']; ?>">
            </div>
            <label for="staticEmail" class="col-sm-4 col-form-label text-dark">Mother's Name</label>
            <div class="col-sm-8">
                <input type="text" readonly class="form-control-plaintext text-dark" id="staticEmail" value="<?= $data['mother_name']; ?>">
            </div>
        </div>
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>