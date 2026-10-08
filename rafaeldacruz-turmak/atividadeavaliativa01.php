<?php
$nome="Rafael da Cruz dos Santos Rodrigues";
$notabim01 = 5;
$notabim02 = 3;
$notabim03 = 4;
$notabim04 = 1;
$resultadobim01= $notabim01+$notabim02;
$resultadobim02= $notabim03+$notabim04;
$semestre=($resultadobim01+$resultadobim02)/2;

echo "Nome do aluno: $nome <br>";

if ($semestre >= 7)
{
    echo "Parabéns, você foi aprovado com média: ", $semestre;
}

else 
{
    echo "Você foi reprovado neste semestre, estude mais!";
}









?>