<?php
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

    <?php if ($_SESSION['is_admin']): ?>
        <a href="admin.php">Admin Panel</a>
    <?php endif; ?>

    <a href="logout.php">Logout</a>
</body>
</html>
