<?php

require_once __DIR__ . '/../models/Produto.php';

class ProdutoController
{
    private $produto;

    public function __construct($pdo)
    {
        $this->produto = new Produto($pdo);
    }

    public function listar($categoriaId = null)
    {
        return $this->produto->listarTodos($categoriaId);
    }
    public function salvar($dados)
    {
        return $this->produto->salvar($dados);
    }
    public function buscarPorId($id)
    {
        return $this->produto->buscarPorId($id);
    }
    public function atualizar($dados)
    {
        return $this->produto->atualizar($dados);
    }
    public function excluir($id)
    {
        return $this->produto->excluir($id);
    }
    public function buscarPorNome($nome)
    {
        return $this->produto->buscarPorNome($nome);
    }
}