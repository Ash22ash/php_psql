<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $word = $_POST['word'];
    $hashedWord = password_hash($word, PASSWORD_DEFAULT); // Hash the word
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hash Word</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Generate Hashed Word</h1>
    <form method="POST">
        <label for="word">Word:</label>
        <input type="text" id="word" name="word" required>
        <button type="submit">Hash</button>
    </form>

    <?php if (isset($hashedWord)): ?>
        <h2>Hashed Result:</h2>
        <p><?php echo htmlspecialchars($hashedWord); ?></p>
    <?php endif; ?>
</body>
</html>
