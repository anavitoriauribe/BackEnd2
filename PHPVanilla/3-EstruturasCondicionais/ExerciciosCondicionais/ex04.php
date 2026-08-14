<?php 
declare(strict_types=1);
// Exercício 4: Autenticação de Sistema (Login Múltiplo)
$senhaSistema = "SenhaSegura123";
$cargoUsuario = "Auxiliar";
if (($cargoUsuario === "Diretor" || $cargoUsuario === "Gerente") && $senhaSistema === "senhaSegura123"){
    echo "Acesso permitido";
} else {
    echo "Acesso negado";
}
?>