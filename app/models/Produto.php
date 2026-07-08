<?php

class Produto
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarTodos($categoriaId = null)
    {
        $sql = "
            SELECT
                produtos.*,
                categorias.nome AS categoria
            FROM produtos
            INNER JOIN categorias
                ON produtos.categoria_id = categorias.id
        ";

        if (!empty($categoriaId)) {
            $sql .= " WHERE produtos.categoria_id = :categoria_id";
        }

        $sql .= " ORDER BY produtos.nome";

        $stmt = $this->pdo->prepare($sql);

        if (!empty($categoriaId)) {
            $stmt->bindValue(':categoria_id', $categoriaId, PDO::PARAM_INT);
        }

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar($dados)
    {
        $sql = "
            INSERT INTO produtos
                (nome, preco, quantidade, descricao, categoria_id)
            VALUES
                (:nome, :preco, :quantidade, :descricao, :categoria_id)
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':nome' => $dados['nome'],
            ':preco' => $dados['preco'],
            ':quantidade' => $dados['quantidade'],
            ':descricao' => $dados['descricao'],
            ':categoria_id' => $dados['categoria_id'],
        ]);

        return true;
    }

    public function buscarPorId($id)
    {
        $sql = "
            SELECT * 
            FROM produtos
            WHERE id = :id
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($dados)
    {
        $sql = "
            UPDATE produtos
            SET
                nome = :nome,
                preco = :preco,
                quantidade = :quantidade,
                descricao = :descricao,
                categoria_id = :categoria_id
            WHERE id = :id
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $dados['id'],
            ':nome' => $dados['nome'],
            ':preco' => $dados['preco'],
            ':quantidade' => $dados['quantidade'],
            ':descricao' => $dados['descricao'],
            ':categoria_id' => $dados['categoria_id']
        ]);
    }

    public function excluir($id)
    {
        $sql = "
            DELETE FROM produtos
            WHERE id = :id
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':id' => $id
        ]);
    }

    public function buscarPorNome($nome)
    {
        $sql = "
            SELECT
                produtos.*,
                categorias.nome AS categoria
            FROM produtos
            INNER JOIN categorias
                ON produtos.categoria_id = categorias.id
            WHERE produtos.nome LIKE :nome
            ORDER BY produtos.nome
        ";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([
            ':nome' => '%' . $nome . '%'
        ]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}