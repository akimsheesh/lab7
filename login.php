<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($_GET['error'])): ?>
            <div class="error">Invalid username or password, try login again.</div>
        <?php endif; ?>
        <?php if (isset($_GET['registration'])): ?>
            <div class="success">Registration successful! Please login.</div>
        <?php endif; ?>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <label>Matric:</label>
                <input type="text" name="matric" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>