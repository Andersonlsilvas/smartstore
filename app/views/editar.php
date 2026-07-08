<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Editar Produto</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>Editar Produto</h1>

<form action="index.php?acao=atualizar" method="POST">

    <input type="hidden" name="id" value="<?= $produto['id']; ?>">

    <p>
        <label>Nome</label><br>
        <input
            type="text"
            name="nome"
            value="<?= htmlspecialchars($produto['nome']); ?>"
            required>
    </p>

    <p>
        <label>Preço</label><br>
        <input
            type="number"
            step="0.01"
            name="preco"
            value="<?= $produto['preco']; ?>"
            required>
    </p>

    <p>
        <label>Quantidade em Estoque</label><br>
        <input
            type="number"
            name="quantidade"
            value="<?= $produto['quantidade']; ?>"
            required>
    </p>

    <p>
        <label>Descrição</label><br>
        <textarea name="descricao"><?= htmlspecialchars($produto['descricao']); ?></textarea>
    </p>

    <p>
        <label>Categoria</label><br>

        <select name="categoria_id" required>

            <option value="">Selecione</option>

            <?php foreach ($categorias as $categoria): ?>

                <option
                    value="<?= $categoria['id']; ?>"
                    <?= $categoria['id'] == $produto['categoria_id'] ? 'selected' : ''; ?>>

                    <?= htmlspecialchars($categoria['nome']); ?>

                </option>

            <?php endforeach; ?>

        </select>

    </p>

    <button type="submit">
        Atualizar Produto
    </button>

</form>

</body>
</html>