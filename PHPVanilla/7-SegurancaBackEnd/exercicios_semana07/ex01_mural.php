<?php
declare(strict_types=1);

// Arquivo onde os recados ficam salvos (simula um "banco de dados" em JSON)
const ARQUIVO_MURAL = __DIR__ . '/mural.json';


//  * Função de escapamento universal.
//  * Converte < > " ' & em entidades HTML para que nunca sejam
//  * interpretados como código pelo navegador.
 
function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
}


//  * Lê os recados já salvos no arquivo JSON.

function carregarRecados(): array
{
    if (!file_exists(ARQUIVO_MURAL)) {
        return [];
    }
    $conteudo = file_get_contents(ARQUIVO_MURAL);
    $dados = json_decode($conteudo, true);
    return is_array($dados) ? $dados : [];
}


//  * Salva um novo recado no arquivo JSON.

function salvarRecado(string $nome, string $mensagem): void
{
    $recados = carregarRecados();
    $recados[] = ['nome' => $nome, 'mensagem' => $mensagem];
    file_put_contents(ARQUIVO_MURAL, json_encode($recados, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}


//  * Valida os dados recebidos do formulário.
//  * Retorna um array de erros (vazio se estiver tudo certo).

function validarRecado(string $nome, string $mensagem): array
{
    $erros = [];

    if (mb_strlen(trim($nome)) < 3) {
        $erros[] = 'O nome deve ter no mínimo 3 caracteres.';
    }

    if (mb_strlen(trim($mensagem)) < 5) {
        $erros[] = 'A mensagem deve ter no mínimo 5 caracteres.';
    }

    return $erros;
}

$erros = [];
$sucesso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    $erros = validarRecado($nome, $mensagem);

    if (empty($erros)) {
        salvarRecado($nome, $mensagem);
        $sucesso = true;
    }
}

$recados = carregarRecados();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Mural de Recados Blindado</title>
</head>
<body>
    <h1>Mural de Recados</h1>

    <?php if ($sucesso): ?>
        <p style="color: green;">Recado publicado com sucesso!</p>
    <?php endif; ?>

    <?php if (!empty($erros)): ?>
        <ul style="color: red;">
            <?php foreach ($erros as $erro): ?>
                <li><?= e($erro) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= e($_POST['nome'] ?? '') ?>"><br><br>

        <label>Mensagem:</label><br>
        <textarea name="mensagem" rows="4" cols="40"><?= e($_POST['mensagem'] ?? '') ?></textarea><br><br>

        <button type="submit">Publicar</button>
    </form>

    <hr>

    <h2>Recados publicados</h2>

    <?php if (empty($recados)): ?>
        <p>Nenhum recado ainda.</p>
    <?php else: ?>
        <?php foreach ($recados as $recado): ?>
            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;">
                <strong><?= e($recado['nome']) ?></strong>
                <p><?= nl2br(e($recado['mensagem'])) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

   
</body>
</html>