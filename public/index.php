<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../app/config/database.php';
require_once '../app/controllers/ProdutoController.php';
require_once '../app/controllers/CategoriaController.php';


$controller = new ProdutoController($pdo);

$acao = $_GET['acao'] ?? 'listar';

switch ($acao){

case 'cadastrar':

    $categoriaController = new CategoriaController($pdo);

    $categorias = $categoriaController->listar();

    include '../app/views/cadastrar.php';

    break;

case 'salvar':
    $controller->salvar($_POST);

    header('Location: index.php');

    exit;

case 'editar':
    $id = $_GET['id'] ?? null;

    if (!$id) {
        die('Produto não encontrado.');
    }

    $produto = $controller->buscarPorId($id);

    $categoriaController = new CategoriaController($pdo);
    $categorias = $categoriaController->listar();

    include '../app/views/editar.php';

    break;

case 'atualizar':

    $controller->atualizar($_POST);

    header('Location: index.php');

    exit;

    case 'excluir':

        $id = $_GET['id'] ?? null;

        if (!$id) {
            die('Produto não encontrado.');
        }

        $controller->excluir($id);

        header('Location: index.php');

        exit;

    case 'salvarCategoria':

        $categoriaController = new CategoriaController($pdo);

        $categoriaController->salvar($_POST['nome']);

        header('Location: index.php');

        exit;

    default:
    
        $categoriaController = new CategoriaController($pdo);
        $categorias = $categoriaController->listar();
        
        $categoriaId = $_GET['categoria_id'] ?? null;
        
        $produtos = $controller->listar($categoriaId);
        
        include '../app/views/listar.php';

        break;
    
}