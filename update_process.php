<?php
include 'config.php';

if (!isset($_SESSION['matric'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $role = $_POST['role'];

    $sql = "UPDATE users SET name = ?, role = ? WHERE matric = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $role, $matric);
    
    if ($stmt->execute()) {
        header("Location: dashboard.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
    
    $stmt->close();
}
$conn->close();
?>