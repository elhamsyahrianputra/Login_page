<?php

session_start();
$_SESSION = [];
session_reset();
session_unset();
session_destroy();
header('Location: login.php');
