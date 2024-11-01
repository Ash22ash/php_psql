<?php
require 'db.php';

if (!isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    header('Location: home.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $is_admin = isset($_POST['is_admin']) && $_POST['is_admin'] == 'on' ? true : false; // Check if checkbox is checked

    $sql = 'INSERT INTO users (username, email, password, is_admin) VALUES (:username, :email, :password, :is_admin)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password, 'is_admin' => $is_admin]);

    header('Location: admin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Create User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Create User</h1>
    <form method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="is_admin">Admin:</label>
        <input type="checkbox" id="is_admin" name="is_admin">
        <button type="submit">Create</button>
    </form>
</body>
</html>
