<?php
include 'database.php';
$db->prepare("UPDATE tarefas SET concluida = 1 WHERE id = ?")->execute([$_GET['id']]);
header('Location: index.php');
?>
