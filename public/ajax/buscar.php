<?php

require_once '../../app/config/database.php';
require_once '../../app/controllers/ProdutoController.php';

$controller = new ProdutoController($pdo);

$nome = $_GET['nome'] ?? '';

$produtos = $controller->buscarPorNome($nome);

header('Content-Type: application/json');

echo json_encode($produtos);