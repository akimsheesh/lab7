<?php
include 'config.php';

if (!isset($_SESSION['matric'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['matric'])) {
    $matric = $_GET['matric'];
    $sql = "SELECT * FROM users WHERE matric = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $matric);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Update User</h2>
        <form action="update_process.php" method="post">
            <input type="hidden" name="matric" value="<?php echo $user['matric']; ?>">
            
            <div class="form-group">
                <label>Matric:</label>
                <input type="text" value="<?php echo $user['matric']; ?>" disabled>
            </div>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
            </div>
            <div class="form-group">
                <label>Role:</label>
                <select name="role" required>
                    <option value="student" <?php echo ($user['role'] == 'student') ? 'selected' : ''; ?>>Student</option>
                    <option value="lecturer" <?php echo ($user['role'] == 'lecturer') ? 'selected' : ''; ?>>Lecturer</option>
                </select>
            </div>
            <button type="submit">Update</button>
            <a href="dashboard.php" class="cancel-btn">Cancel</a>
        </form>
    </div>
</body>
</html>