<?php
declare(strict_types=1);

$erro = [];
$mensagemSucesso = "";
$cursosPermitidos = ['Desenvolvimento de Sistemas', 'Mecatrônica', 'Redes'];

$nomeCandidato = trim((string)($_POST['nome_candidato'] ?? ''));
$idadeTexto = trim((string)($_POST['idade'] ?? ''));
$cursoDesejado = trim((string)($_POST['curso_desejado'] ?? ''));

// O checkbox gera chave apenas se estiver selecionado no envio
$aceiteTermos = isset($_POST['aceite_termos']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (strlen($nomeCandidato) < 5) {
        $erro['nome_candidato'] = "O nome deve conter pelo menos 5 caracteres.";
    }

    $idade = filter_var($idadeTexto, FILTER_VALIDATE_INT);
    if ($idade === false || $idade < 16) {
        $erro['idade'] = "Idade mínima para inscrição: 16 anos.";
    }

    if (!in_array($cursoDesejado, $cursosPermitidos, true)) {
        $erro['curso_desejado'] = "Selecione um curso válido da lista.";
    }

    if (!$aceiteTermos) {
        $erro['aceite_termos'] = "Você precisa aceitar os termos para prosseguir.";
    }

    if (empty($erro)) {
        $mensagemSucesso = "Inscrição confirmada com sucesso!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ex 05 - Inscrição SENAI</title>
    <link rel="icon" type="image/png" href="favicon.ico">
    <style>
        body { font-family: Arial, sans-serif; background: #f2f4f8; padding: 20px; }
        main { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        h1 { color: #a02581; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input[type="text"], input[type="number"], select { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { background: #a02581; color: white; border: none; padding: 10px 15px; margin-top: 15px; border-radius: 4px; cursor: pointer; }
        .erro { color: #b00020; font-size: 0.85em; display: block; }
        .sucesso { background: #d4edda; color: #155724; padding: 15px; border-radius: 4px; margin-bottom: 20px; }
        .voltar { display: inline-block; margin-bottom: 15px; color: #a02581; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <main>
        <a href="index.php" class="voltar">← Voltar ao Menu Principal</a>

        <h1>Ex 05: Inscrição em Curso Técnico (POST)</h1>

        <?php if ($mensagemSucesso !== ""): ?>
            <div class="sucesso">
                <h3><?= htmlspecialchars($mensagemSucesso) ?></h3>
                <p>Candidato: <?= htmlspecialchars($nomeCandidato) ?></p>
                <p>Curso: <?= htmlspecialchars($cursoDesejado) ?></p>
            </div>
        <?php endif; ?>

        <form action="exercicio05.php" method="POST" novalidate>
            <label for="nome_candidato">Nome do Candidato:</label>
            <input type="text" id="nome_candidato" name="nome_candidato" value="<?= htmlspecialchars($nomeCandidato) ?>">
            <?php if (isset($erro['nome_candidato'])): ?>
                <span class="erro"><?= $erro['nome_candidato'] ?></span>
            <?php endif; ?>

            <label for="idade">Idade:</label>
            <input type="number" id="idade" name="idade" value="<?= htmlspecialchars($idadeTexto) ?>">
            <?php if (isset($erro['idade'])): ?>
                <span class="erro"><?= $erro['idade'] ?></span>
            <?php endif; ?>

            <label for="curso_desejado">Curso Desejado:</label>
            <select id="curso_desejado" name="curso_desejado">
                <option value="">Selecione...</option>
                <?php foreach ($cursosPermitidos as $curso): ?>
                    <option value="<?= $curso ?>" <?= $cursoDesejado === $curso ? 'selected' : '' ?>>
                        <?= $curso ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($erro['curso_desejado'])): ?>
                <span class="erro"><?= $erro['curso_desejado'] ?></span>
            <?php endif; ?>

            <br>
            <label style="font-weight: normal;">
                <input type="checkbox" name="aceite_termos" value="1" <?= $aceiteTermos ? 'checked' : '' ?>>
                Aceito os termos e condições do processo seletivo
            </label>
            <?php if (isset($erro['aceite_termos'])): ?>
                <span class="erro"><?= $erro['aceite_termos'] ?></span>
            <?php endif; ?>

            <button type="submit">Finalizar Inscrição</button>
        </form>
    </main>
</body>
</html>