<?php

require_once __DIR__ . '/../models/Categoria.php';

class CategoriaController
{
    private $categoria;

    public function __construct($pdo)
    {
        $this->categoria = new Categoria($pdo);
    }

    public function listar()
    {
        return $this->categoria->listarTodas();
    }

    public function salvar($nome)
    {
        return $this->categoria->salvar($nome);
    }
}