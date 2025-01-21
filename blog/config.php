<?php

session_start();
$host = "localhost";
$dbname = "blog_db";
$user = "root";
$password = "Chouaib2004";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e){
    die("Connection failed: " . $e->getMessage());
}

?>