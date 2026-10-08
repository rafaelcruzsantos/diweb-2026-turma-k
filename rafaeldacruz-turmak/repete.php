<?php 

for ($i=1; $i<=100; $i++)
{
    echo "Teste" . $i. "<br>";
}
//



for ($i=2020; $i<=2026; $i++)
{
    echo "Ano do ingresso: " . $i. "|";
}

//



//Exemplo 2
$contador = 1;
while ($contador <=5)
{
    echo "Processando registro acadêmico nº $contador... <br>";
    $contador++;
}

//
$tentativas = 0;
do {
    echo "Tentando conectar ao servidor de banco de dados... <br>";
    $tentativas++;
}
while ($tentativas < 0);
// Mesmo sendo falso, ele executou uma vez.

//Quarto exemplo de estrutura de repetição

$disciplinas = ["Programação Web", "Estrutura de Dados", "Banco de Dados"];
foreach ($disciplinas as $indice => $nomedisciplina) {
    echo "Cod: $indice - Disciplina: $nomedisciplina <br>";
}
$notas = [3.8,2.9,4.2,5.0];
foreach ($notas as $indice => $valordanota)
{
    echo "Nota: $indice - Valor da Nota é: $valordanota <br>";
}

//Atividade
for ($i=0 ; $i <=5; $i++)
{
    echo "Linhas" .$i. "|";
}
for ($i=1; $i <=5; $i++)
{
    echo "Colunas" .$i. "<br>";
}






?>