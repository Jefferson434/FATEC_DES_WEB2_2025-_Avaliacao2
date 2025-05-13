<?php
// excluir.php

require('classes/login.php');
$validador = new Login();
$validador->verificar_logado();

require_once 'classes/DB.php';
$db = new DB();

// Se recebeu um POST para excluir
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['excluir'])) {
    $id = (int) $_POST['excluir'];
    if ($db->excluirPorId($id)) {
        header('Location: excluir.php');
        exit;
    } else {
        $erro = "Falha ao excluir o produto #{$id}.";
    }
}

// Carrega todos os produtos para listar
$produtos = $db->listarTodos();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Excluir Produtos</title>
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
        button.excluir-btn {
            background: #dc3545;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        button.excluir-btn:hover {
            background: #c82333;
        }
        .error { color: #c00; margin-bottom: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="top-bar">
            <h2>Excluir Produtos</h2>
            <div>
                <a class="button" href="home.php">← Voltar</a>
            </div>
        </div>

        <?php if (!empty($erro)): ?>
            <p class="error"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>

        <?php if (empty($produtos)): ?>
            <p>Não há produtos para excluir.</p>
        <?php else: ?>
            <form method="post">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Preço</th>
                        <th>Descrição</th>
                        <th>Categoria</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach ($produtos as $p): ?>
                        <tr>
                            <td><?= htmlspecialchars($p['id']) ?></td>
                            <td><?= htmlspecialchars($p['nome_produto']) ?></td>
                            <td>R$ <?= number_format($p['preco'], 2, ',', '.') ?></td>
                            <td><?= htmlspecialchars($p['descricao']) ?></td>
                            <td><?= htmlspecialchars($p['categoria']) ?></td>
                            <td>
                                <button
                                    type="submit"
                                    name="excluir"
                                    value="<?= $p['id'] ?>"
                                    class="excluir-btn"
                                    onclick="return confirm('Tem certeza que deseja excluir o produto “<?= addslashes(htmlspecialchars($p['nome_produto'])) ?>”?')"
                                >
                                    Excluir
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
