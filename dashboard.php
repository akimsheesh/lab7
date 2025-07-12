<?php 
include 'config.php';

if (!isset($_SESSION['matric'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>User List</h2>
        <p>Welcome, <?php echo $_SESSION['name']; ?> (<a href="logout.php">Logout</a>)</p>
        
        <table>
            <tr>
                <th>Matric</th>
                <th>Name</th>
                <th>Level</th>
                <th>Action</th>
            </tr>
            <?php
            $sql = "SELECT matric, name, role FROM users";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['matric']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['role']}</td>
                        <td>
                            <a href='update.php?matric={$row['matric']}'>Update</a> | 
                            <a href='delete.php?matric={$row['matric']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                        </td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No users found</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>