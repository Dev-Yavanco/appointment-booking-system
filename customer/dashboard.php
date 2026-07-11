<?php

require_once "../config/session.php";
require_once "../config/functions.php";

requireLogin();

echo "<h1>Customer Dashboard</h1>";
echo "<p>Welcome " . htmlspecialchars($_SESSION['full_name']) . "</p>";