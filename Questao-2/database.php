<?php
try {
    $db = new PDO('sqlite:tarefas.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("
        CREATE TABLE IF NOT EXISTS tarefas (
            id INTEGER PRIMARY KEY AUTOINCREMENT,
            descricao TEXT NOT NULL,
            vencimento DATE NOT NULL,
            concluida INTEGER DEFAULT 0
        )
    ");
} catch (PDOException $e) {
    die("Erro ao conectar: " . $e->getMessage());
}
?>