<?php
include 'config.php';

if (!isset($_SESSION['matric'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    
    $sql = "DELETE FROM users WHERE matric = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $matric);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
    
    $stmt->close();
}
$conn->close();
?>