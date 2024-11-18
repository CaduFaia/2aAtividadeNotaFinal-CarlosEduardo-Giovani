<?php
require 'database.php';
$books = getDB()->query("SELECT * FROM books ORDER BY id ASC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Livraria</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #2F4F4F; color: #87CEEB; }
        form { margin-bottom: 20px; }
        ul { list-style: none; padding: 0; }
        li { margin-bottom: 10px; }
        button { background-color: #007BFF; color: white; border: none; padding: 5px 10px; border-radius: 3px; }
        button:hover { background-color: #0056b3; }
        a { color: red; }
    </style>
</head>
<body>
    <h1>Livraria Entre Linhas</h1>
    <form action="add_book.php" method="POST">
        <input type="text" name="title" placeholder="Título" required>
        <input type="text" name="author" placeholder="Autor" required>
        <input type="number" name="year" placeholder="Ano" required>
        <button type="submit">Adicionar</button>
    </form>
    <h2>Livros Cadastrados</h2>
    <?php if ($books): ?>
        <ul>
            <?php foreach ($books as $book): ?>
                <li>
                    <?= htmlspecialchars($book['title']) ?>, de <?= htmlspecialchars($book['author']) ?> (<?= $book['year'] ?>)
                    <a href="delete_book.php?id=<?= $book['id'] ?>" onclick="return confirm('Deseja excluir?')">[Excluir]</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Nenhum livro cadastrado.</p>
    <?php endif; ?>
</body>
</html>