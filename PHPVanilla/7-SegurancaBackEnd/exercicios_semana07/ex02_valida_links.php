<?php
declare(strict_types=1);


//  * Função de escapamento universal

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
}


//  * Verifica se a URL é válida E se o protocolo é http:// ou https://.
//  * Isso bloqueia payloads como javascript:alert(document.cookie).

function urlEhSegura(string $url): bool
{
    if (filter_var($url, FILTER_VALIDATE_URL) === false) {
        return false;
    }

    return str_starts_with($url, 'http://') || str_starts_with($url, 'https://');
}

$erro = '';
$nome = '';
$link = '';
$linkValido = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $link = trim($_POST['link'] ?? '');

    if (mb_strlen($nome) < 3) {
        $erro = 'O nome deve ter no mínimo 3 caracteres.';
    } elseif (!urlEhSegura($link)) {
        $erro = 'Link inválido. Use apenas URLs que comecem com http:// ou https://.';
    } else {
        $linkValido = $link;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Validador de Links de Portfólio</title>
</head>
<body>
    <h1>Cadastro de Portfólio</h1>

    <?php if ($erro !== ''): ?>
        <p style="color: red;"><?= e($erro) ?></p>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= e($nome) ?>"><br><br>

        <label>Link (GitHub/LinkedIn):</label><br>
        <input type="text" name="link" value="<?= e($link) ?>"><br><br>

        <button type="submit">Validar</button>
    </form>

    <?php if ($linkValido !== null): ?>
        <hr>
        <h2>Link validado</h2>
        <p>
            <?= e($nome) ?> -
            <a href="<?= e($linkValido) ?>" target="_blank">Visitar Portfólio</a>
        </p>
    <?php endif; ?>

   
</body>
</html>