<?php

function produtosEletronicos() {

    $nome = ["Notebook", "Celular", "Cadeira", "Mochila"];
    $preco = [3500, 1800, 450, 120];
    $marca = ["Dell", "Samsung", "Flexform", "Nike"];
    $cor = ["Preto", "Azul", "Cinza", "Preto"];
    $estoque = [10, 15, 8, 20];

    for ($i = 0; $i < 4; $i++) {
        echo "Nome: " . $nome[$i] . "<br>";
        echo "Preço: R$ " . $preco[$i] . "<br>";
        echo "Marca: " . $marca[$i] . "<br>";
        echo "Cor: " . $cor[$i] . "<br>";
        echo "Estoque: " . $estoque[$i] . "<br><hr>";
    }
}

produtosEletronicos();

?>
