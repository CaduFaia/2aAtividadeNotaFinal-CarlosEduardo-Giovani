<?php
include 'database.php';
$db->prepare("INSERT INTO tarefas (descricao, vencimento) VALUES (?, ?)")
   ->execute([$_POST['descricao'], $_POST['vencimento']]);
header('Location: index.php');
?>