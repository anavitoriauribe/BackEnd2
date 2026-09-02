<!-- NÍVEL 4: PROGRAMAÇÃO FUNCIONAL (array_filter e array_map)
Exercício 4: Catálogo da Netflix (Filtro)
O sistema precisa recomendar apenas filmes adequados para crianças. Mock de Dados:
$filmes = [
    ["titulo" => "Matrix", "genero" => "Ficção", "classificacao_idade" => 16],
    ["titulo" => "Shrek", "genero" => "Animação", "classificacao_idade" => 0],
    ["titulo" => "Deadpool", "genero" => "Ação", "classificacao_idade" => 18],
    ["titulo" => "Procurando Nemo", "genero" => "Animação", "classificacao_idade" => 0],
    ["titulo" => "Vingadores", "genero" => "Ação", "classificacao_idade" => 12]
];
Missão: Não use o if tradicional! Utilize a função array_filter e uma Arrow Function (fn() =>) para criar um novo array chamado $filmesInfantis contendo apenas os filmes cuja classificacao_idade seja menor ou igual a 12. Em seguida, exiba essa nova lista na tela com um foreach. -->

<?php
//lista de todos os filmes
$filmes = [
    ["titulo" => "Matrix", "genero" => "Ficção", "classificacao_idade" => 16],
    ["titulo" => "Shrek", "genero" => "Animação", "classificacao_idade" => 0],
    ["titulo" => "Deadpool", "genero" => "Ação", "classificacao_idade" => 18],
    ["titulo" => "Procurando Nemo", "genero" => "Animação", "classificacao_idade" => 0],
    ["titulo" => "Vingadores", "genero" => "Ação", "classificacao_idade" => 12]
];
//filtro para aparecer só os filmes de classificação de 12 anos
$filmesInfantis = array_filter($filmes, fn($filme) => $filme["classificacao_idade"] <= 12);

?>

<style>
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        background: #f0f2f5;
        padding: 30px;
    }

    h2 {
        color: #333;
    }



    ul {
        list-style: none;
        padding: 0;
        width: 320px;
    }

    li {
        background: #fff;
        border-left: 5px solid #88cdd6;
        border-radius: 6px;
        padding: 10px 15px;
        margin-bottom: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        transition: transform 0.2s;
    }

    li:hover {
        transform: translateX(5px);
    }

    .genero {
        color: #777;
        font-size: 13px;
    }

    .selo {
        display: inline-block;
        margin-top: 5px;
        background: #e8f0ff;
        color: #88cdd6;
        font-size: 12px;
        font-weight: bold;
        padding: 2px 8px;
        border-radius: 10px;
    }
</style>

<h2>Filmes Recomendados para Crianças</h2>
<ul>
    <?php foreach ($filmesInfantis as $filme): ?>
        <li>
            <strong><?php echo $filme["titulo"]; ?></strong>
            (<?php echo $filme["genero"]; ?>) —
            Livre a partir de <?php echo $filme["classificacao_idade"]; ?> anos
        </li>
    <?php endforeach; ?>
</ul>