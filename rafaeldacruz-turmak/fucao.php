<?php 

function exibirBoasVindas(): void {
    echo "Bem vindo ao sistema acadêmico!<br>";
    echo "Tenha um excelente aula. <br>";
}

exibirBoasVindas();

function calcularMedia(float $nota1, float $nota2): float {
    $media = ($nota1 + $nota2) /2;
    return $media;
}
$notaFinal = calcularMedia(7.5, 8.5);

if ($notaFinal >= 7.0) {
    echo "Média {$notaFinal} - Aluno Aprovado! <br><br>";
} else {
    echo "Média: {$notaFinal} - Aluno em Recuperação! <br> <br>";
}

function saudarUsuario(string $nome, string $saudacao = "Olá"):
string 
{
    return "{$saudacao}, {$nome} ! Seja bem vindo.";
}

echo saudarUsuario("Carlos") . "<br>";
echo saudarUsuario("Maria", "Bom dia") . "<br>";

//


 
