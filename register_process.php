<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $matric = $_POST['matric'];
    $name = $_POST['name'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    // Periksa koneksi database terlebih dahulu
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (matric , name, password, role) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    // Debugging: Tampilkan error jika prepare gagal
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }
    
    $stmt->bind_param("ssss", $matric, $name, $password, $role);
    
    if ($stmt->execute()) {
        header("Location: login.php?registration=success");
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }
    
    $stmt->close();
}
$conn->close();
?>