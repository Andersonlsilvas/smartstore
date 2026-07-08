<?php

class Categoria
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listarTodas()
    {
        $sql = "SELECT * FROM categorias ORDER BY nome";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function salvar($nome)
    {
        $sql = "
            INSERT INTO categorias (nome)
            VALUES (:nome)
        ";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            ':nome' => $nome
        ]);
    }
}