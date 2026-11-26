<?php
require_once __DIR__ . '/../models/Produto.php';

// Página inicial pública (vitrine com banner, destaques e oferta)
class HomeController {
    private $produtos;

    public function __construct() {
        $this->produtos = new Produto();
    }

    public function index() {
        $destaques = $this->produtos->destaques(4);
        $tituloPagina = 'Moda em tecidos naturais';
        $ativo = 'home';
        require_once __DIR__ . '/../views/home/index.php';
    }
}
