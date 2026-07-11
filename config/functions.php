<?php

function sanitize($data)
{
    return htmlspecialchars(trim($data));
}

function redirect($url)
{
    header("Location: $url");
    exit();
}

function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

function requireLogin()
{
    if (!isLoggedIn()) {
        redirect("../auth/login.php");
    }
}

function requireAdmin()
{
    if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
        redirect("../auth/login.php");
    }
}