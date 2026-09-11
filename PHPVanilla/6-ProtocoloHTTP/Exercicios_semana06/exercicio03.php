<?php
declare(strict_types=1);

$erro = [];
$mensagemSucesso = "";

$email = trim((string)($_POST['email'] ?? ''));
$senha = (string)($_POST['senha'] ?? '');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validação do formato do e-mail via filter_var
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro['email'] = "Informe um e-mail válido.";
    }

    // Validação da extensão mínima da senha
    if (strlen($senha) < 6) {
        $erro['senha'] = "A senha deve conter no mínimo 6 caracteres.";
    }

    // Se as validações básicas passarem, confere com os dados de acesso mockados
    if (empty($erro)) {
        if ($email === 'admin@senai.br' && $senha === 'senhaSegura123') {
            $mensagemSucesso = "Bem-vindo ao sistema, Administrador!";
        } else {
            $erro['login'] = "Credenciais inválidas.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Ex 03 - Login Seguro</title>
     <link rel="icon" type="image/png" href="favicon.ico">
    <style>
        body { font-family: Arial, sans-serif; background: #f2f4f8; padding: 20px; }
        main { max-width: 500px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        h1 { color: #a02581; }
        label { font-weight: bold; display: block; margin-top: 10px; }
        input { width: 100%; padding: 8px; margin-top: 5px; box-sizing: border-box; }
        button { background: #a02581; color: white; border: none; padding: 10px 15px; margin-top: 15px; border-radius: 4px; cursor: pointer; }
        .erro { color: #b00020; font-size: 0.85em; }
        .sucesso { background: #d4edda; color: #155724; padding: 15px; border-radius: 4px; }
        .voltar { display: inline-block; margin-bottom: 15px; color: #a02581; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <main>
        <a href="index.php" class="voltar">← Voltar ao Menu Principal</a>

        <h1>Ex 03: Painel de Autenticação (POST)</h1>

        <?php if ($mensagemSucesso !== ""): ?>
            <div class="sucesso">
                <h3><?= htmlspecialchars($mensagemSucesso) ?></h3>
            </div>
        <?php else: ?>
            <?php if (isset($erro['login'])): ?>
                <p class="erro" style="font-weight: bold;"><?= $erro['login'] ?></p>
            <?php endif; ?>

            <form action="ex03_login_seguro.php" method="POST" novalidate>
                <label for="email">E-mail:</label>
                <!-- Sticky Form mantido no campo e-mail -->
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
                <?php if (isset($erro['email'])): ?><span class="erro"><?= $erro['email'] ?></span><?php endif; ?>

                <label for="senha">Senha:</label>
                <!-- REGRA DE SEGURANÇA: O campo senha NUNCA deve utilizar o atributo value para Sticky Form -->
                <input type="password" id="senha" name="senha">
                <?php if (isset($erro['senha'])): ?><span class="erro"><?= $erro['senha'] ?></span><?php endif; ?>

                <button type="submit">Entrar</button>
            </form>
        <?php endif; ?>
    </main>
</body>
</html>