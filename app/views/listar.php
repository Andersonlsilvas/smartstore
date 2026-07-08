<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>Controle de Estoque</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1>Controle de Estoque</h1>

<!-- ========================= -->
<!-- CARD - CADASTRAR PRODUTO -->
<!-- ========================= -->

<div class="card">

    <h2>Cadastrar Produto</h2>

    <form action="index.php?acao=salvar" method="POST">

        <p>
            <label>Nome</label><br>
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

        <p>

            Não encontrou a categoria?

            <a href="#" id="mostrarCategoria">
                + Cadastrar nova categoria
            </a>

        </p>

        <button type="submit">
            Salvar Produto
        </button>

    </form>

</div>

<!-- ========================= -->
<!-- CARD - CADASTRAR CATEGORIA -->
<!-- ========================= -->

<div class="card" id="cadastroCategoria">

    <h2>Cadastrar Categoria</h2>

    <form action="index.php?acao=salvarCategoria" method="POST">

        <p>

            <label>Nome da Categoria</label><br>

            <input
                type="text"
                name="nome"
                required>

        </p>

        <button type="submit">

            Cadastrar Categoria

        </button>

    </form>

</div>

<!-- ========================= -->
<!-- CARD - ESTOQUE -->
<!-- ========================= -->

<div class="card">

    <h2>Estoque Atual</h2>

    <form method="GET" action="index.php">

        <label for="categoria">

            Filtrar por categoria

        </label><br>

        <select name="categoria_id" id="categoria">

            <option value="">Todas</option>

            <?php foreach ($categorias as $categoria): ?>

                <option
                    value="<?= $categoria['id']; ?>"
                    <?= (isset($_GET['categoria_id']) && $_GET['categoria_id'] == $categoria['id']) ? 'selected' : ''; ?>>

                    <?= htmlspecialchars($categoria['nome']); ?>

                </option>

            <?php endforeach; ?>

        </select>

        <button type="submit">
            Filtrar
        </button>

    </form>

    <p>

        <label for="buscar">

            Buscar Produto

        </label><br>

        <input
            type="text"
            id="buscar"
            placeholder="Digite o nome do produto...">

    </p>

    <?php if (empty($produtos)): ?>

        <p>Nenhum produto cadastrado.</p>

    <?php else: ?>

        <table id="tabelaProdutos">

            <tr>

                <th>Nome</th>
                <th>Preço</th>
                <th>Quantidade</th>
                <th>Categoria</th>
                <th>Ações</th>

            </tr>

            <?php foreach ($produtos as $produto): ?>

                <tr>

                    <td><?= htmlspecialchars($produto['nome']); ?></td>

                    <td>

                        R$ <?= number_format($produto['preco'], 2, ',', '.'); ?>

                    </td>

                    <td><?= $produto['quantidade']; ?></td>

                    <td><?= htmlspecialchars($produto['categoria']); ?></td>

                    <td>

                        <a href="?acao=editar&id=<?= $produto['id']; ?>">

                            ✏ Editar

                        </a>

                        |

                        <a
                            href="?acao=excluir&id=<?= $produto['id']; ?>"
                            onclick="return confirm('Tem certeza que deseja excluir este produto?');">

                            🗑 Excluir

                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </table>

    <?php endif; ?>

</div>

<script src="js/busca.js"></script>
<script src="js/categoria.js"></script>

</body>
</html>