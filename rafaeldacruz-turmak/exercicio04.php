]<?php
$nome="Rafael da Cruz Santos Rodrigues";
$anoNascimento=1950;
$anoAtual=2026;
$idade = $anoAtual - $anoNascimento;
$perfil="aluno";
$ingressoInteiro=30;
$clasiEtaria=16;
$titulo="Gente Grande 3";
$data="10/10/2026";
$horario="13:39 hrs";
$assento="F20";
$numSala=2;

if($idade >= 60)
{
    echo "Olá,", $nome, "<br>",
    "Titulo do Filme: ",$titulo, "<br>",
    "Classificação Etária :",$clasiEtaria, "anos", "<br>",
    "Inicio da Sessão: ", $horario, "<br>",
    "Data da Sessão: ", $data, "<br>",
    "Número do Assento: ",$assento,"<br>",
    "Número da Sala: ",$numSala, "<br>",
    "Valor do Ingresso: GRATUITO!";
    }
else {
    echo "Olá $nome, o valor do ingresso é R$ 30,00 ";
}
if($perfil=="aluno")
{
    $valorTotal= $ingressoInteiro/2; 
    echo ", Parabéns! você tem direito a meia-entrada";
    
}
if($idade<$clasiEtaria)
{
    echo "Você não tem idade adequada para assistir o filme!";
}



?>
