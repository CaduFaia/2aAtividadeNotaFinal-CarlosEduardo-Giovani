<?php
require 'database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $author = trim($_POST['author'] ?? '');
    $year = intval($_POST['year'] ?? 0);

    if ($title && $author && $year > 0) {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO books (title, author, year) VALUES (?, ?, ?)");
        $stmt->execute([$title, $author, $year]);
    }
}
header('Location: index.php');
exit;
?>