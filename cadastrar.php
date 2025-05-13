<?php
require('classes/login.php');
$validador = new Login();
$validador->verificar_logado();


require_once 'classes/DB.php';
$db = new DB();

// Se o formulário foi enviado, cadastra o produto
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastrar'])) {
    $nome      = trim($_POST['nome']);
    $preco     = floatval($_POST['preco']);
    $descricao = trim($_POST['descricao']);
    $categoria = trim($_POST['categoria']);

    if ($db->cadastrar($nome, $preco, $descricao, $categoria)) {
        header('Location: home.php');
        exit;
    } else {
        $erro = "Falha ao cadastrar produto.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Adicionar Produto</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        form { max-width: 400px; margin: auto; display: flex; flex-direction: column; gap: 10px; }
        input[type="text"], input[type="number"] { padding: 8px; font-size: 14px; }
        input[type="submit"] {
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        input[type="submit"]:hover { background-color: #218838; }
        .error { color: #c00; }
    </style>
</head>
<body>

<h2>Cadastro de Novo Produto</h2>

<?php if (!empty($erro)): ?>
    <p class="error"><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<form method="post">
    <input type="text"   name="nome"      placeholder="Nome do Produto" required>
    <input type="number" step="0.01" name="preco"     placeholder="Preço (ex: 99.90)" required>
    <input type="text"   name="descricao" placeholder="Descrição">
    <input type="text"   name="categoria" placeholder="Categoria">
    <input type="submit" name="cadastrar" value="Cadastrar Produto">
</form>

<p><a href="products.php">← Voltar para listagem</a></p>

</body>
</html>
