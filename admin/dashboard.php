<?php

require_once "../config/session.php";
require_once "../config/functions.php";

requireAdmin();

echo "<h1>Admin Dashboard</h1>";
echo "<p>Welcome " . htmlspecialchars($_SESSION['full_name']) . "</p>";