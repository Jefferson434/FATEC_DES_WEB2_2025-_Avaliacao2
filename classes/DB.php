<?php
class DB {
    private $pdo;

 
    public function __construct() {
        $host = 'localhost';
        $dbname = 'artesanato_db';
        $user = 'root';
        $pass = '';
        $dsn = "mysql:host={$host};dbname={$dbname};charset=utf8mb4";

        try {
            $this->pdo = new PDO(
                $dsn,
                $user,
                $pass,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]
            );
        } catch (PDOException $e) {
            die('Erro de conexão: ' . $e->getMessage());
        }
    }

    
    public function __destruct() {
        $this->pdo = null;
    }


    public function listarTodos() {
        $sql = "SELECT id, nome_produto, preco, descricao, categoria
                  FROM produtos_artesanais
               ORDER BY id ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }


    public function cadastrar($nome_produto, $preco, $descricao, $categoria) {
        $sql = "INSERT INTO produtos_artesanais
                    (nome_produto, preco, descricao, categoria)
                VALUES
                    (:nome_produto, :preco, :descricao, :categoria)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            ':nome_produto' => $nome_produto,
            ':preco'        => $preco,
            ':descricao'    => $descricao,
            ':categoria'    => $categoria,
        ]);
    }

    
    public function excluirPorId($id) {
        $sql = "DELETE FROM produtos_artesanais WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([':id' => $id]);
    }
}
