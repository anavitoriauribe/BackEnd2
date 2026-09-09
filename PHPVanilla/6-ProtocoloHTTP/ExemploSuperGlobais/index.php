<?php
// aplicação de página unica de variaveis SuperGlobais ($_GET, $_POST, $_SERVER)
declare(strict_types=1);

//dados simulados 

$produtos = [
    // Eletrônicos
    ['nome' => 'Teclado USB', 'categoria' => 'Eletrônicos', 'preco' => 80.00], 
    ['nome' => 'Mouse sem fio', 'categoria' => 'Eletrônicos', 'preco' => 65.00], 
    ['nome' => 'Monitor 24 polegadas', 'categoria' => 'Eletrônicos', 'preco' => 899.90],
    ['nome' => 'Fone de Ouvido Bluetooth', 'categoria' => 'Eletrônicos', 'preco' => 149.90],
    ['nome' => 'Caixa de Som USB', 'categoria' => 'Eletrônicos', 'preco' => 89.90],
    ['nome' => 'Roteador Wi-Fi 6', 'categoria' => 'Eletrônicos', 'preco' => 349.00],
    ['nome' => 'HD Externo 1TB', 'categoria' => 'Eletrônicos', 'preco' => 310.00],
    ['nome' => 'Webcam Full HD', 'categoria' => 'Eletrônicos', 'preco' => 199.90],
    ['nome' => 'Pendrive 64GB', 'categoria' => 'Eletrônicos', 'preco' => 45.00],
    ['nome' => 'Hub USB 4 Portas', 'categoria' => 'Eletrônicos', 'preco' => 35.00],
    ['nome' => 'Calculadora Científica', 'categoria' => 'Eletrônicos', 'preco' => 85.00],
    ['nome' => 'Carregador de Parede Rápido', 'categoria' => 'Eletrônicos', 'preco' => 69.90],
    ['nome' => 'Cabo HDMI 2 metros', 'categoria' => 'Eletrônicos', 'preco' => 25.00],
    ['nome' => 'Carregador Portátil 10000mAh', 'categoria' => 'Eletrônicos', 'preco' => 120.00],
    ['nome' => 'Teclado Mecânico RGB', 'categoria' => 'Eletrônicos', 'preco' => 299.90],
    ['nome' => 'Mouse Gamer Overclock', 'categoria' => 'Eletrônicos', 'preco' => 180.00],
    ['nome' => 'Headset Gamer com Microfone', 'categoria' => 'Eletrônicos', 'preco' => 240.00],
    ['nome' => 'Placa de Captura de Vídeo', 'categoria' => 'Eletrônicos', 'preco' => 150.00],
    ['nome' => 'SSD NVMe 500GB', 'categoria' => 'Eletrônicos', 'preco' => 280.00],
    ['nome' => 'Repetidor de Sinal Wi-Fi', 'categoria' => 'Eletrônicos', 'preco' => 89.00],
    ['nome' => 'Adaptador Bluetooth USB', 'categoria' => 'Eletrônicos', 'preco' => 29.90],
    ['nome' => 'Microfone Condensador USB', 'categoria' => 'Eletrônicos', 'preco' => 210.00],
    ['nome' => 'Filtro de Linha 6 Tomadas', 'categoria' => 'Eletrônicos', 'preco' => 45.90],
    ['nome' => 'Nobreak 600VA', 'categoria' => 'Eletrônicos', 'preco' => 480.00],
    ['nome' => 'Smartband Relógio Inteligente', 'categoria' => 'Eletrônicos', 'preco' => 199.00],

    // Papelaria
    ['nome' => 'Caderno', 'categoria' => 'Papelaria', 'preco' => 25.00], 
    ['nome' => 'Caneta azul', 'categoria' => 'Papelaria', 'preco' => 3.50], 
    ['nome' => 'Lapiseira 0.7mm', 'categoria' => 'Papelaria', 'preco' => 12.50],
    ['nome' => 'Bloco de Notas Adesivas', 'categoria' => 'Papelaria', 'preco' => 8.90],
    ['nome' => 'Tesoura Escolar', 'categoria' => 'Papelaria', 'preco' => 6.00],
    ['nome' => 'Grampeador de Mesa', 'categoria' => 'Papelaria', 'preco' => 22.00],
    ['nome' => 'Pasta Suspensa (Dez unidades)', 'categoria' => 'Papelaria', 'preco' => 32.00],
    ['nome' => 'Caneta Gel Preta', 'categoria' => 'Papelaria', 'preco' => 5.50],
    ['nome' => 'Marca Texto Amarelo', 'categoria' => 'Papelaria', 'preco' => 4.20],
    ['nome' => 'Borracha Escolar Branca', 'categoria' => 'Papelaria', 'preco' => 2.00],
    ['nome' => 'Apontador com Depósito', 'categoria' => 'Papelaria', 'preco' => 5.00],
    ['nome' => 'Régua de Alumínio 30cm', 'categoria' => 'Papelaria', 'preco' => 14.90],
    ['nome' => 'Caixa de Clips 2/0', 'categoria' => 'Papelaria', 'preco' => 7.50],
    ['nome' => 'Fita Adesiva Transparente', 'categoria' => 'Papelaria', 'preco' => 6.80],
    ['nome' => 'Agenda Diária', 'categoria' => 'Papelaria', 'preco' => 39.90],
    ['nome' => 'Grampo para Grampeador 26/6', 'categoria' => 'Papelaria', 'preco' => 5.00],
    ['nome' => 'Perfurador de Papel 2 Furos', 'categoria' => 'Papelaria', 'preco' => 28.90],
    ['nome' => 'Pasta Catálogo com 50 Envelopes', 'categoria' => 'Papelaria', 'preco' => 24.50],
    ['nome' => 'Quadro Branco 60x40cm', 'categoria' => 'Papelaria', 'preco' => 45.00],
    ['nome' => 'Marcador de Quadro Branco', 'categoria' => 'Papelaria', 'preco' => 7.20],
    ['nome' => 'Corretivo em Fita', 'categoria' => 'Papelaria', 'preco' => 9.50],
    ['nome' => 'Papel Sulfite A4 (500 folhas)', 'categoria' => 'Papelaria', 'preco' => 32.90],
    ['nome' => 'Estojo Escolar Estruturado', 'categoria' => 'Papelaria', 'preco' => 29.90],
    ['nome' => 'Bloco de Desenho A3', 'categoria' => 'Papelaria', 'preco' => 18.00],
    ['nome' => 'Tinta Guache 6 Cores', 'categoria' => 'Papelaria', 'preco' => 8.50],

    // Móveis e Decoração
    ['nome' => 'Luminária de Mesa', 'categoria' => 'Móveis e Decoração', 'preco' => 79.90],
    ['nome' => 'Cadeira Ergonômica', 'categoria' => 'Móveis e Decoração', 'preco' => 649.00],
    ['nome' => 'Mesa de Escritório em L', 'categoria' => 'Móveis e Decoração', 'preco' => 420.00],
    ['nome' => 'Gaveteiro com Rodinhas', 'categoria' => 'Móveis e Decoração', 'preco' => 210.00],
    ['nome' => 'Prateleira de Madeira 60cm', 'categoria' => 'Móveis e Decoração', 'preco' => 45.00],
    ['nome' => 'Nicho Decorativo Quadrado', 'categoria' => 'Móveis e Decoração', 'preco' => 35.00],
    ['nome' => 'Tapete para Escritório 1x1.2m', 'categoria' => 'Móveis e Decoração', 'preco' => 110.00],
    ['nome' => 'Almofada Lombar', 'categoria' => 'Móveis e Decoração', 'preco' => 65.00],
    ['nome' => 'Relógio de Parede Moderno', 'categoria' => 'Móveis e Decoração', 'preco' => 55.00],
    ['nome' => 'Quadro Decorativo Motivação', 'categoria' => 'Móveis e Decoração', 'preco' => 29.90],
    ['nome' => 'Planta Artificial com Vaso', 'categoria' => 'Móveis e Decoração', 'preco' => 42.00],
    ['nome' => 'Organizador de Documentos', 'categoria' => 'Móveis e Decoração', 'preco' => 38.00],
    ['nome' => 'Lixeira de Inox 5L', 'categoria' => 'Móveis e Decoração', 'preco' => 69.90],
    ['nome' => 'Abajur de Chão', 'categoria' => 'Móveis e Decoração', 'preco' => 189.00],
    ['nome' => 'Suporte Triplo para Plantas', 'categoria' => 'Móveis e Decoração', 'preco' => 85.00],

    // Acessórios
    ['nome' => 'Organizador de Cabos', 'categoria' => 'Acessórios', 'preco' => 15.00],
    ['nome' => 'Suporte para Notebook', 'categoria' => 'Acessórios', 'preco' => 59.90],
    ['nome' => 'Mochila para Notebook', 'categoria' => 'Acessórios', 'preco' => 189.90],
    ['nome' => 'Mousepad Speed', 'categoria' => 'Acessórios', 'preco' => 40.00],
    ['nome' => 'Suporte Articulado para Monitor', 'categoria' => 'Acessórios', 'preco' => 179.90],
    ['nome' => 'Capa Protetora para Notebook', 'categoria' => 'Acessórios', 'preco' => 49.90],
    ['nome' => 'Suporte para Headset de Mesa', 'categoria' => 'Acessórios', 'preco' => 35.00],
    ['nome' => 'Apoio de Pulso para Teclado', 'categoria' => 'Acessórios', 'preco' => 45.00],
    ['nome' => 'Apoio para os Pés Ergonômico', 'categoria' => 'Acessórios', 'preco' => 89.90],
    ['nome' => 'Case para HD Externo', 'categoria' => 'Acessórios', 'preco' => 39.00],
    ['nome' => 'Kit de Limpeza para Telas', 'categoria' => 'Acessórios', 'preco' => 19.90],
    ['nome' => 'Caneta Touch Screen', 'categoria' => 'Acessórios', 'preco' => 15.50],
    ['nome' => 'Luva Antitranspiração para Desenho', 'categoria' => 'Acessórios', 'preco' => 22.00],

    // Cozinha e Alimentos
    ['nome' => 'Garrafa Térmica 500ml', 'categoria' => 'Cozinha', 'preco' => 75.00],
    ['nome' => 'Caneca de Cerâmica', 'categoria' => 'Cozinha', 'preco' => 29.90],
    ['nome' => 'Copo Térmico com Tampa', 'categoria' => 'Cozinha', 'preco' => 89.90],
    ['nome' => 'Infusor de Chá Inox', 'categoria' => 'Cozinha', 'preco' => 14.00],
    ['nome' => 'Cafeteira Italiana 6 Xícaras', 'categoria' => 'Cozinha', 'preco' => 99.00],
    ['nome' => 'Moedor de Café Manual', 'categoria' => 'Cozinha', 'preco' => 65.00],
    ['nome' => 'Pote Hermético de Vidro', 'categoria' => 'Cozinha', 'preco' => 24.90],
    ['nome' => 'Balança Digital de Cozinha', 'categoria' => 'Cozinha', 'preco' => 35.00],
    ['nome' => 'Afiador de Facas Diamantado', 'categoria' => 'Cozinha', 'preco' => 29.90],
    ['nome' => 'Forma de Gelo em Silicone', 'categoria' => 'Cozinha', 'preco' => 18.50],

    // Ferramentas e Utilitários
    ['nome' => 'Fita Isolante', 'categoria' => 'Ferramentas', 'preco' => 7.50],
    ['nome' => 'Chave de Fenda Philips', 'categoria' => 'Ferramentas', 'preco' => 18.00],
    ['nome' => 'Jogo de Chaves Alen', 'categoria' => 'Ferramentas', 'preco' => 35.00],
    ['nome' => 'Trena Métrica 5 metros', 'categoria' => 'Ferramentas', 'preco' => 22.50],
    ['nome' => 'Estilete Profissional', 'categoria' => 'Ferramentas', 'preco' => 12.00],
    ['nome' => 'Lanterna LED Recarregável', 'categoria' => 'Ferramentas', 'preco' => 49.90],
    ['nome' => 'Alicate Universal 8 Polegadas', 'categoria' => 'Ferramentas', 'preco' => 45.00],
    ['nome' => 'Martelo Unha Polido', 'categoria' => 'Ferramentas', 'preco' => 39.90],
    ['nome' => 'Maleta Organizadora Plástica', 'categoria' => 'Ferramentas', 'preco' => 55.00],
    ['nome' => 'Parafusadeira a Bateria', 'categoria' => 'Ferramentas', 'preco' => 199.00],
    ['nome' => 'Fita Dupla Face Fixa Forte', 'categoria' => 'Ferramentas', 'preco' => 16.50],
    ['nome' => 'Abraçadeira de Nylon (100 un)', 'categoria' => 'Ferramentas', 'preco' => 12.90],
];


//declarar algumas variáveis 
$mensagemSucesso = "";
$erro = [];

$nome = "";
$email = "";

//processamento usando o GET (busca na lista de produtos) = idex.php? produto=mouse$preco_maximo=100

$buscaProduto = trim((string) ($_GET["produto"] ?? "")); //verificação/operador de nulidade de uma variável (coalescência nula)
$precoMaximoTexto = trim((string) ($_GET["preco_maximo"] ?? ""));

$produtosFiltrados = $produtos; //filtro para a lista de produtos

if ($buscaProduto !== "" || $precoMaximoTexto !== ""){
    $produtosFiltrados = array_filter($produtos,
                            function (array $produto) use ($buscaProduto, $precoMaximoTexto):bool {
                                $nomeCorrespondente = true;
                                $precoCorrespondente = true;
                                if($buscaProduto !== ""){
                                    $nomeCorrespondente = 
                                    str_contains(
                                        strtolower ($produto
                                        ["nome"]),
                                        strtolower($buscaProduto)
                                    );
                                }
                                if($precoMaximoTexto !== ""){
                                    $precoMaximo = filter_var(
                                        $precoMaximoTexto,
                                        FILTER_VALIDATE_FLOAT
                                    );
                                    $precoCorrespondente = $precoMaximo !==false && $produto["preco"] <= $precoMaximo;
                                    }
                                    return $nomeCorrespondente && $precoCorrespondente;
                            });
                                   
}

// processaento do POST

if($_SERVER["REQUEST_METHOD"] === "POST"){
//reuperar os dados de um formulário
$nome = trim ((string) ($_POST["nome"] ?? ""));
    $email = trim((string) ($_POST["email"] ?? ""));

    // Validação do Servidor

    if(strlen($nome) < 3){
        $erro ["nome"] = "Informe um nome com pleo menos 3 caracteres"; 
        }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $erro["email"]= "Informe um email válido";
        }

    // se nao existir erros, o cadastro será realizado
    if($erro === []){
        $mensagemSucesso = "Cadasro Realizado com sucesso!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de GET & POST no PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
    <h1>Exemplo prático: GET & POST</h1>

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
        <section>
            <h2>Cadastro de alunos com POST</h2>
            <p>Os dados serão enviados no corpo da requisição e não aparecerão na URL</p>

             <?php if($mensagemSucesso !== "") :?>
            <div class="sucesso">
                <?= $nome ?><br>
                <?= $email ?>
            </div>
        <?php endif; ?>

            <form action="index.php" method="POST" novalidate>
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" placeholder="Digite seu Nome">
            <?php if(isset($erro["nome"])): ?>
                <div class="erro">
                    <?= $erro["nome"] ?>
                </div>
            <?php endif; ?>

            <form action="index.php" method="POST" novalidate>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Digite seu email">
            <?php if(isset($erro["email"])): ?>
                <div class="erro">
                    <?= $erro["email"] ?>
                </div>
            <?php endif; ?>

                </form>
            </section>
        </main>
</body>
</html>