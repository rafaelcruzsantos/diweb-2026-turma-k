<?php

$idade = 19;
$cont = 50;
if ((($idade >=16)&&($idade <18))|| ($idade >=70))
{
 echo "Seu voto é Facultativo!";
}
if (($idade >= 18)&&($idade <70))
{
$cont=$cont+1;
echo "Você é obrigado a votar!<br>";
echo "A quantidade de votos é:" ,$cont,"<br>";
}
else 
{
echo "Me desculpe mas você não pode votar!<br>";
}
echo "Segundo Exemplo de Condição<br>";

$saldo = 100.00;
$valorCompra = 80.00;
if ($saldo >= $valorCompra)
{
echo "Compra realizada com sucesso!";
}
else 
{
echo "Saldo insuficiente. Que tal guardar mais um pouco?";
}

echo "<br>Terceiro exemplo de Condição <br>";

$hora =4;
if (($hora >= 6)&&($hora<=12))
{
echo "Bom dia!";
}
elseif (($hora >12)&&($hora<=18))
{
echo "Boa Tarde!";
}
elseif(($hora >18)&& ($hora<=24))
{
echo "Boa noite!";
}
else 
{
echo "Boa Madrugada!";
}

echo "Quarto exemplo de condição <br>";

$corFavorita = "verde";
if ($corFavorita == "verde")
{
echo "Você gosta da cor da natureza!";
}
else if ($corFavorita == "Azul")
{
echo "Você gosta da cor do céu!";
}
else
{
echo "Você escolheu uma cor diferente!";
}
?>
