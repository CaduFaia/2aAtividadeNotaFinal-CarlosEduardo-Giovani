<?php
include 'database.php';
$tarefas = $db->query("SELECT * FROM tarefas ORDER BY vencimento ASC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de Tarefas</title>
    <style>
        body { background: 	#4B0082; color: #48D1CC; }
        input, button { padding: 10px; }
        input[type="text"], input[type="date"] { background: #9370DB; color: #000000; border: 1px solid #4B0082; display: block; width: 30%; margin-bottom: 10px; }
        button { background: #00BFFF; color: black; width: 30%; }
    </style>
</head>
<body>
    <h1>Gerenciador de Tarefas</h1>
    <form action="add_tarefa.php" method="POST">
        <input type="text" name="descricao" placeholder="Descrição" required>
        <input type="date" name="vencimento" required>
        <button type="submit">Adicionar</button>
    </form>
    <?php foreach (['Não Concluídas' => 0, 'Concluídas' => 1] as $titulo => $status): ?>
        <h2>Tarefas <?= $titulo ?></h2>
        <ul>
            <?php foreach ($tarefas as $tarefa): ?>
                <?php if ($tarefa['concluida'] == $status): ?>
                    <li>
                        <?= htmlspecialchars($tarefa['descricao']) ?> - <?= $tarefa['vencimento'] ?>
                        <?php if (!$status): ?>
                            <a href="update_tarefa.php?id=<?= $tarefa['id'] ?>">Concluir</a>
                        <?php endif; ?>
                        <a href="delete_tarefa.php?id=<?= $tarefa['id'] ?>" onclick="return confirm('Excluir esta tarefa?')">Excluir</a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</body>
</html>