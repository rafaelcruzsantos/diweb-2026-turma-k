<?php
require_once __DIR__ . '/../models/Cliente.php';

class PainelController {

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Bloqueio de segurança: Se não tiver sessão ativa, chuta de volta para o login
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=login&action=index');
            exit;
        }
    }

    // Exibe a área do usuário logado
    public function index() {
        // Dados de cadastro (telefone, cidade...) quando o usuário é um cliente
        $cliente = null;
        if ($_SESSION['usuario_perfil'] === 'cliente') {
            $cliente = (new Cliente())->findByUsuario($_SESSION['usuario_id']);
        }

        $tituloPagina = 'Minha conta';
        $ativo = 'painel';
        require_once __DIR__ . '/../views/painel/index.php';
    }
}
