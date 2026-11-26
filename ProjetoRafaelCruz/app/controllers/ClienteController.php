<?php
require_once __DIR__ . '/../models/Cliente.php';

// Lista de clientes cadastrados: acesso para admin e vendedor
class ClienteController {
    private $model;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        if (!in_array($_SESSION['usuario_perfil'] ?? '', ['admin', 'vendedor'], true)) {
            header('Location: index.php?controller=painel&action=index');
            exit;
        }

        $this->model = new Cliente();
    }

    public function index() {
        $clientes = $this->model->listarComUsuario();
        $tituloPagina = 'Clientes';
        $ativo = 'painel';
        require_once __DIR__ . '/../views/clientes/index.php';
    }
}
