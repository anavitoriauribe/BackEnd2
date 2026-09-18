<?php
declare(strict_types=1);

const ARQUIVO_CHAT = __DIR__ . '/chat.json';
const LIMITE_CARACTERES = 250;


//  * Função de escapamento universal (mesma lógica dos exercícios anteriores).

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
}

function carregarChat(): array
{
    if (!file_exists(ARQUIVO_CHAT)) {
        return [];
    }
    $dados = json_decode(file_get_contents(ARQUIVO_CHAT), true);
    return is_array($dados) ? $dados : [];
}

function salvarMensagem(string $autor, string $mensagem): void
{
    $chat = carregarChat();
    $chat[] = ['autor' => $autor, 'mensagem' => $mensagem];
    file_put_contents(ARQUIVO_CHAT, json_encode($chat, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
}


//  * Valida autor e mensagem antes de salvar no chat.
 
function validarMensagem(string $autor, string $mensagem): array
{
    $erros = [];

    if (trim($autor) === '') {
        $erros[] = 'Selecione quem está enviando a mensagem.';
    }

    if (mb_strlen(trim($mensagem)) === 0) {
        $erros[] = 'A mensagem não pode ser vazia.';
    } elseif (mb_strlen($mensagem) > LIMITE_CARACTERES) {
        $erros[] = 'A mensagem não pode ultrapassar ' . LIMITE_CARACTERES . ' caracteres.';
    }

    return $erros;
}

$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $autor = trim($_POST['autor'] ?? '');
    $mensagem = trim($_POST['mensagem'] ?? '');

    $erros = validarMensagem($autor, $mensagem);

    if (empty($erros)) {
        salvarMensagem($autor, $mensagem);
    }
}

$mensagens = carregarChat();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Chat Industrial - Operador x Supervisor</title>
</head>
<body>
    <h1>Chat da Operação</h1>

    <?php if (!empty($erros)): ?>
        <ul style="color: red;">
            <?php foreach ($erros as $erro): ?>
                <li><?= e($erro) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Quem envia:</label><br>
        <select name="autor">
            <option value="Operador">Operador</option>
            <option value="Supervisor">Supervisor</option>
        </select><br><br>

        <label>Mensagem (máx. <?= LIMITE_CARACTERES ?> caracteres):</label><br>
        <textarea name="mensagem" rows="3" cols="40" maxlength="<?= LIMITE_CARACTERES ?>"></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>

    <hr>

    <h2>Histórico</h2>

    <?php if (empty($mensagens)): ?>
        <p>Nenhuma mensagem ainda.</p>
    <?php else: ?>
        <?php foreach ($mensagens as $msg): ?>
            <p>
                <strong><?= e($msg['autor']) ?>:</strong>
                <?= nl2br(e($msg['mensagem'])) ?>
            </p>
        <?php endforeach; ?>
    <?php endif; ?>

  
</body>
</html>