<?php
require('classes/login.php');
$validador = new Login();
$validador->verificar_logado();

require_once 'classes/DB.php';
$db = new DB();

// Caso tenha vindo um parâmetro de remoção via GET


// Carrega todos os produtos
$produtos = $db->listarTodos();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Listar Produtos</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f8f9fa; }
        .container { max-width: 900px; margin: auto; background: #fff; padding: 20px; border-radius: 6px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; }
        .top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; }
        a.button { text-decoration: none; background: #007bff; color: #fff; padding: 8px 14px; border-radius: 4px; }
        a.button:hover { background: #0056b3; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 12px; border-bottom: 1px solid #dee2e6; text-align: left; }
        th { background: #e9ecef; }
        tr:hover { background: #f1f3f5; }
        .remover { color: #dc3545; text-decoration: none; }
        .remover:hover { text-decoration: underline; }
        .error { color: #c00; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <h2>Produtos Cadastrados</h2>
            <div>
                <a class="button" href="home.php">← Voltar</a>
            </div>
        </div>

        <?php if (!empty($erro)): ?>
            <p class="error"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <?php if (empty($produtos)): ?>
            <p>Nenhum produto cadastrado ainda.</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    
                </tr>
                <?php foreach ($produtos as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['id']) ?></td>
                        <td><?= htmlspecialchars($p['nome_produto']) ?></td>
                        <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                        <td><?= htmlspecialchars($p['descricao']) ?></td>
                        <td><?= htmlspecialchars($p['categoria']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>
