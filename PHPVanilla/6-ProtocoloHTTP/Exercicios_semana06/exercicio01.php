<?php
// aplicação de página única de variáveis SuperGlobais ($_GET, $_POST, $_SERVER)
declare(strict_types=1);

// Dados simulados 
$produtos = [
    ['nome' => 'Teclado USB', 'categoria' => 'Eletrônicos', 'preco' => 80.00],
    ['nome' => 'Mouse Sem Fio', 'categoria' => 'Eletrônicos', 'preco' => 65.00],
    ['nome' => 'Caderno Universitário', 'categoria' => 'Papelaria', 'preco' => 25.00],
    ['nome' => 'Caneta Azul', 'categoria' => 'Papelaria', 'preco' => 3.50],
    ['nome' => 'Luminária de Mesa', 'categoria' => 'Móveis', 'preco' => 79.90],
    ['nome' => 'Suporte para Notebook', 'categoria' => 'Acessórios', 'preco' => 59.90],
];

// Declarar variáveis 
$mensagemSucesso = "";
$erros = [];

$nome = "";
$email = "";

// Processamento usando GET
$buscaProduto = trim((string) ($_GET["produto"] ?? ""));
$precoMaximoTexto = trim((string) ($_GET["preco_maximo"] ?? ""));

$produtosFiltrados = $produtos;

if ($buscaProduto !== "" || $precoMaximoTexto !== "") {
    $produtosFiltrados = array_filter($produtos, function (array $produto) use ($buscaProduto, $precoMaximoTexto): bool {
        $nomeCorrespondente = true;
        $precoCorrespondente = true;

        if ($buscaProduto !== "") {
            $nomeCorrespondente = str_contains(
                strtolower($produto["nome"]),
                strtolower($buscaProduto)
            );
        }

        if ($precoMaximoTexto !== "") {
            $precoMaximo = filter_var($precoMaximoTexto, FILTER_VALIDATE_FLOAT);
            $precoCorrespondente = $precoMaximo !== false && $produto["preco"] <= $precoMaximo;
        }

        return $nomeCorrespondente && $precoCorrespondente;
    });
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ex 01 - Buscador de Produtos com Filtro de Preço (GET)</title>
    <link rel="icon" type="image/png" href="favicon.ico">

</head>
    <style>
        body { font-family: Arial, sans-serif; background: #f2f4f8; padding: 20px; }
        main { max-width: 650px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        h1, h2 { color: #a02581; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { background: #a02581; color: white; border: none; padding: 10px 15px; margin-top: 15px; border-radius: 4px; cursor: pointer; }
        .voltar { display: inline-block; margin-bottom: 15px; color: #a02581; text-decoration: none; font-weight: bold; }

        /* ESTILOS DA TABELA */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-family: Arial, sans-serif;
            border: 1px solid #e0e0e0;
        }

        th {
            background-color: #a02581;
            color: white;
            text-align: left;
            padding: 10px;
            font-weight: bold;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #e0e0e0;
            border-right: 1px solid #e0e0e0;
        }

        td:last-child {
            border-right: none;
        }
    </style>
</head>
<body>
    <main>
        <a href="index.php" class="voltar">← Voltar ao Menu Principal</a>
        <h1>Ex 01: Buscador de Produtos com Filtro de Preço (GET)</h1>
        <section>
            <p>Os filtros serão enviados pela URL (GET)</p>

            <form action="index.php" method="GET">
        <label for="produto">Nome do produto</label>
        <input type="text" name="produto" id="produto" placeholder="Escreva o nome de um produto">

        <label for="preco_maximo">Preço máximo</label>
        <input type="number" name="preco_maximo" id="preco_maximo" step="0.01" placeholder="100"> 

        <button type="submit"> Pesquisar ⌕ </button>
    </form>
    <h2>Lista de Produtos Filtrados</h2>
    <p>Observe que os dados da pesquisa aparecem na URL</p>

     <?php if ($produtosFiltrados === []): ?>
            <p class="vazio">Nenhum produto encontrado.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($produtosFiltrados as $produto): ?>
                    <tr>
                        <td><?= $produto['nome'] ?></td>
                        <td><?= $produto['categoria'] ?></td>
                        <td>
                            R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        </section>
    </main>
</body>
</html>