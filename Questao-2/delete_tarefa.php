<?php
include 'database.php';
$db->prepare("DELETE FROM tarefas WHERE id = ?")->execute([$_GET['id']]);
header('Location: index.php');
?>