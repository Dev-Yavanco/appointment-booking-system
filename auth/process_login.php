<?php

require_once "../config/session.php";
require_once "../config/functions.php";

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirect("login.php");
}

$email = sanitize($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (empty($email) || empty($password)) {
    $_SESSION['error'] = "Email and password are required.";
    redirect("login.php");
}

/*
|--------------------------------------------------------------------------
| DATABASE LOGIN GOES HERE
|--------------------------------------------------------------------------
| Member 3's database will be used here.
|--------------------------------------------------------------------------
*/

// Temporary login simulation

$_SESSION['user_id'] = 1;
$_SESSION['full_name'] = "Demo User";
$_SESSION['role'] = "customer";

redirect("../customer/dashboard.php");