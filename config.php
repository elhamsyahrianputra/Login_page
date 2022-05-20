<?php

$localhost = "localhost";
$username = "root";
$password = "";
$db = "login_page";

$conn = mysqli_connect($localhost, $username, $password, $db);

if (!$conn) {
    die("Konesi Gagal " . mysqli_connect_error());
}

function getUser()
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM user");
    $result = mysqli_fetch_all($query);
    return $result;
}

function getUserByUsername($username)
{
    global $conn;
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $data = mysqli_fetch_array($query);
    return $data;
}

function addUser($username, $password, $name, $date, $mother_name)
{
    global $conn;
    $query = mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$password', '$name', '$date', '$mother_name')");
    return $query;
}

function updateUserPassword($username, $password)
{
    global $conn;
    $query = mysqli_query($conn, "UPDATE  user  SET password = '$password' WHERE username = '$username'");
    return $query;
}
