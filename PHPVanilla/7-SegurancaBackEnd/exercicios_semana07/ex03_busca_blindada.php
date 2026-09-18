<?php
declare(strict_types=1);


//  * Função de escapamento universal (mesma lógica dos exercícios anteriores).

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
}

// Captura o termo pesquisado vindo da URL (método GET)
$busca = $_GET['q'] ?? '';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Busca de Produtos</title>
</head>
<body>
    <h1>Busca de Produtos</h1>

    <form method="GET" action="">
        <label>Buscar produto:</label><br>
        <input type="text" name="q" value="<?= e($busca) ?>">
        <button type="submit">Buscar</button>
    </form>

    <?php if ($busca !== ''): ?>
        <p>Você buscou por: <strong><?= e($busca) ?></strong></p>
    <?php endif; ?>

    
</body>
</html>