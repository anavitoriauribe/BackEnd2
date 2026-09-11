<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Exercícios - Semana 06</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico?v=1">

    <style>
        /* Estilização centralizada da página principal */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f4f8;
            margin: 0;
            padding: 30px;
        }
        main {
            max-width: 800px;
            margin: 0 auto;
            background: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        h1 {
            color: #a02581;
            margin-top: 0;
        }
        p {
            color: #555;
            line-height: 1.5;
        }
        /* Grid de cards para os botões do menu */
        .grid-menu {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 15px;
            margin-top: 25px;
        }
        .card-link {
            display: block;
            background-color: #a02581;
            color: #ffffff;
            text-decoration: none;
            padding: 20px;
            border-radius: 6px;
            font-weight: bold;
            text-align: center;
            transition: background 0.2s ease;
        }
        .card-link:hover {
            background-color: #801d67;
        }
    </style>
</head>
<body>
    <main>
        <h1>Painel de Exercícios - Semana 06</h1>
        <p>Selecione abaixo o exercício que deseja visualizar e testar:</p>

        <!-- Navegação para as páginas individuais de cada exercício -->
        <div class="grid-menu">
            <a href="exercicio01.php" class="card-link">Ex 1: Busca de Produtos (GET)</a>
            <a href="exercicio02.php" class="card-link">Ex 2: Calculadora de IMC (POST)</a>
            <a href="exercicio03.php" class="card-link">Ex 3: Login Seguro (POST)</a>
            <a href="exercicio04.php" class="card-link">Ex 4: Financiamento (POST)</a>
            <a href="exercicio05.php" class="card-link">Ex 5: Inscrição SENAI (POST)</a>
        </div>
    </main>
</body>
</html>