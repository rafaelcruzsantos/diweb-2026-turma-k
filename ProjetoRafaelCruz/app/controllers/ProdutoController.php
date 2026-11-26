<?php
require_once __DIR__ . '/../models/Produto.php';

// Listagem pública de produtos (cards + guia de medidas)
class ProdutoController {
    private $model;

    public function __construct() {
        $this->model = new Produto();
    }

    public function index() {
        $produtos = $this->model->listar();
        $tituloPagina = 'Produtos';
        $ativo = 'produto';
        require_once __DIR__ . '/../views/produto/index.php';
    }
}
