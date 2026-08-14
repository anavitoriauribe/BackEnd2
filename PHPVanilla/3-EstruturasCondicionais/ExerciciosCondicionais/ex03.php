<?php
$peso = 58.5;
$altura = 1.73;
$imc = ($peso / ($altura * $altura));
if ($altura <18.5){
    echo "Abaixo do peso";
}
elseif ($imc== 18.5 || $imc <= 24.9) {
    echo "Peso normal";
}
elseif ($imc == 25.0 || $imc <= 29.9) {
    echo "Sobrepeso";
}
elseif ($imc == 30.0 || $imc <= 34.9) {
    echo "Obesidade Grau I";
}
else echo "Obesidade Grau II ou III" 

?>