<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$database = "Lab_7";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>