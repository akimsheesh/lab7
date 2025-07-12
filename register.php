<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Registration Form</h2>
        <form action="register_process.php" method="post">
            <div class="form-group">
                <label>Matric:</label>
                <input type="text" name="matric" required>
            </div>
            <div class="form-group">
                <label>Name:</label>
                <input type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
            <div class="form-group">
                <label>Role:</label>
                <select name="role" required>
                    <option value="">Please select</option>
                    <option value="student">Student</option>
                    <option value="lecturer">Lecturer</option>
                </select>
            </div>
            <button type="submit">Submit</button>
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>