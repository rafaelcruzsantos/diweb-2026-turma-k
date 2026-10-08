<?php

$estoque_roupas =
[
    ["id" => 101, "nome"=>"Regata Preta","qtd" => 15,
    "preco" => 55,00, "tipo" => "Roupa Academia"],

    ["id" => 102, "nome" =>"Camiseta Preta Básica", "qtd"=> 8,
    "preco" => 35,00, "tipo"=> "Camiseta"],

    ["id" => 103, "nome"=>"Calça Cargo Bege","qtd" => 25,
    "preco" => 45,00, "tipo" => "Calça"],

    ["id" => 104, "nome"=>"Tênis New Balance 550 Verde","qtd" => 5,
    "preco" => 350,00, "tipo" => "Calçado"],

    ["id" => 105, "nome"=>"Sapatilha Rosa Melissa","qtd" => 30,
    "preco" => 80,00, "tipo" => "Calçado"],

    ["id" => 106, "nome"=>"Camiseta Oversized Mike Tyson Branca","qtd" => 12,
    "preco" => 80,00, "tipo" => "Camiseta"],

    ["id" => 107, "nome"=>"Calça Estonada Prata","qtd" => 10,
    "preco" => 115,00, "tipo" => "Calça"],

    ["id" => 108, "nome"=> "Tênis New Balance 530", "qtd" => 7,
    "preco" => 699,99, "tipo" => "Calçado"],

    ["id" => 109, "nome"=>"Sandália Havaianas Branca Bandeira do Brasil","qtd" => 10,
    "preco" => 99,99, "tipo" => "Calçado"],

    ["id" => 110, "nome"=>"Calça De Moletom Cinza GG","qtd" => 20,
    "preco" => 60,00, "tipo" => "Calça"]

];

echo "<h2>Relatório de Estoque de Peças de Roupas e Calçados</h2>";
//Início da tabela para organizar os dados visualmente
echo"<table border='1' cellpadding='10'
style='border-collapse: colapse;
largura: 100%; '>";

echo"<tr style='background-color: #808080 ;'>;
    <th>ID</th>
    <th>Produto</th>
    <th>Tipo</th>
    <th>Qtd</th>
    <th>Preço Unitário.</th>
    <th>Total em Estoque</th>
    </tr>";
//O foreach percorre cada 'sub'array' (cada produto)
foreach ($estoque_roupas as $indice) {
    $valor_total_item = $indice['qtd'] * $indice['preco'];
    echo "<tr>";
    echo "<td>" . $indice['id'] . "</td>";
    echo "<td>" . $indice['nome'] . "</td>";
    echo "<td>" . $indice['tipo'] . "</td>";
    echo "<td>" . $indice['qtd'] . "</td>";
    
    echo "<td>R$ " . number_format($indice['preco'], 2, ',', '.') . "</td>";
    echo "<td>R$ " . number_format($valor_total_item,2 , ',', '.') . "</td>";
}
echo "</table>";
?>


