<?php

require_once "../config/session.php";
require_once "../config/functions.php";

// Only allow POST requests
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    redirect("register.php");
}

// Get and sanitize input
$full_name = sanitize($_POST['full_name'] ?? '');
$email     = sanitize($_POST['email'] ?? '');
$phone     = sanitize($_POST['phone'] ?? '');
$password  = $_POST['password'] ?? '';
$confirm   = $_POST['confirm_password'] ?? '';

// Validation
$errors = [];

if (empty($full_name)) {
    $errors[] = "Full name is required.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address.";
}

if (strlen($password) < 8) {
    $errors[] = "Password must be at least 8 characters.";
}

if ($password !== $confirm) {
    $errors[] = "Passwords do not match.";
}

// If validation fails
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    redirect("register.php");
}

// Hash password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

/*
|--------------------------------------------------------------------------
| DATABASE CODE GOES HERE
|--------------------------------------------------------------------------
| Member 3 will provide the database.
| We'll insert the user into the database here.
|--------------------------------------------------------------------------
*/

// Temporary success message
$_SESSION['success'] = "Registration validation passed.";

redirect("login.php");