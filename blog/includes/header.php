

<?php
// header.php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog</title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
    <h1>Simple Blog</h1>
    <nav>
        <a href="/index.php">Home</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="/pages/dashboard.php">Dashboard</a>
            <a href="/pages/logout.php">Logout</a>
        <?php else: ?>
            <a href="/pages/login.php">Login</a>
            <a href="/pages/register.php">Register</a>
        <?php endif; ?>
    </nav>
</header>
<div class="container">