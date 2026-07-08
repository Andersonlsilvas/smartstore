const campoBusca = document.getElementById('buscar');

campoBusca.addEventListener('keyup', function (){

    const nome = this.value;

    fetch('ajax/buscar.php?nome=' + encodeURIComponent(nome))
        .then(response => response.json())
        .then(produtos => {

            let linhas = `
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            `;

            produtos.forEach(produto => {
                linhas +=`
                    <tr>
                        <td>${produto.nome}</td>
                        <td>R$ ${Number(produto.preco).toFixed(2).replace('.',',')}</td>
                        <td>${produto.quantidade}</td>
                        <td>${produto.categoria}</td>
                        <td>
                            <a href="?acao=editar&id=${produto.id}" >✏ Editar</a>
                            |
                            <a href="?acao=excluir&id=${produto.id}"
                                onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                 🗑 Excluir
                            </a>
                        </td>
                    </tr>
                `;
            });

            document.getElementById('tabelaProdutos').innerHTML = linhas;
        });

});