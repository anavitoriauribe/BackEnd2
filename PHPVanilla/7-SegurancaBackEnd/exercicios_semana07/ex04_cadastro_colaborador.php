<?php
declare(strict_types=1);


//  * Função de escapamento universal (mesma lógica dos exercícios anteriores).

function e(string $texto): string
{
    return htmlspecialchars($texto, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML5, 'UTF-8');
}


//  * Remove espaços das pontas e qualquer tag HTML do texto.

function sanitizarTexto(string $dado): string
{
    return trim(strip_tags($dado));
}


//  * Valida todos os campos do colaborador e retorna:
//  * ['ok' => bool, 'erros' => array, 'dados' => array]

function validarColaborador(array $dados): array
{
    $erros = [];

    $nome = sanitizarTexto($dados['nome'] ?? '');
    if (mb_strlen($nome) < 3) {
        $erros[] = 'Nome deve ter no mínimo 3 caracteres.';
    }

    $email = filter_var($dados['email'] ?? '', FILTER_VALIDATE_EMAIL);
    if ($email === false) {
        $erros[] = 'E-mail inválido.';
    }

    $matricula = filter_var($dados['matricula'] ?? '', FILTER_VALIDATE_INT);
    if ($matricula === false) {
        $erros[] = 'Matrícula deve ser um número inteiro.';
    }

    $salario = filter_var($dados['salario'] ?? '', FILTER_VALIDATE_FLOAT);
    if ($salario === false) {
        $erros[] = 'Salário deve ser um número (ex: 2500.50).';
    }

    return [
        'ok' => empty($erros),
        'erros' => $erros,
        'dados' => [
            'nome' => $nome,
            'email' => $email !== false ? $email : '',
            'matricula' => $matricula !== false ? $matricula : null,
            'salario' => $salario !== false ? $salario : null,
        ],
    ];
}

$resultado = ['ok' => false, 'erros' => [], 'dados' => []];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resultado = validarColaborador($_POST);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Colaboradores</title>
</head>
<body>
    <h1>Cadastro de Colaboradores</h1>

    <?php if (!empty($resultado['erros'])): ?>
        <ul style="color: red;">
            <?php foreach ($resultado['erros'] as $erro): ?>
                <li><?= e($erro) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="POST" action="">
        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?= e($_POST['nome'] ?? '') ?>"><br><br>

        <label>E-mail:</label><br>
        <input type="text" name="email" value="<?= e($_POST['email'] ?? '') ?>"><br><br>

        <label>Matrícula:</label><br>
        <input type="text" name="matricula" value="<?= e($_POST['matricula'] ?? '') ?>"><br><br>

        <label>Salário:</label><br>
        <input type="text" name="salario" value="<?= e($_POST['salario'] ?? '') ?>"><br><br>

        <button type="submit">Cadastrar</button>
    </form>

    <?php if ($resultado['ok']): ?>
        <hr>
        <h2>Confirmação do cadastro</h2>
        <ul>
            <li>Nome: <?= e($resultado['dados']['nome']) ?></li>
            <li>E-mail: <?= e($resultado['dados']['email']) ?></li>
            <li>Matrícula: <?= e((string) $resultado['dados']['matricula']) ?></li>
            <li>Salário: <?= e((string) $resultado['dados']['salario']) ?></li>
        </ul>
    <?php endif; ?>
</body>
</html>