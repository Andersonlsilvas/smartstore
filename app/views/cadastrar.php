<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Cadastrar Produto</h1>

<form action="index.php?acao=salvar" method="POST">
    <p>
        <label>Nome do Produto</label><br>
        <input type="text" name="nome" required>
    </p>

    <p>
        <label>Preço</label><br>    
        <input type="number" step="0.01" name="preco" required>
    </p>

    <p>
        <label>Quantidade em Estoque</label><br>
        <input type="number" name="quantidade" required>
    </p>

    <p>
        <label>Descrição</label><br>
        <textarea name="descricao"></textarea>
    </p>

    <p>
        <label>Categoria</label><br>

        <select name="categoria_id" required>

    <option value="">Selecione</option>

            <?php foreach ($categorias as $categoria): ?>

                <option value="<?= $categoria['id']; ?>">
                    <?= htmlspecialchars($categoria['nome']); ?>
                </option>

            <?php endforeach; ?>

        </select>
    </p>

    <button type="submit">
        Salvar Produto
    </button>

</form>
    
</body>
</html>