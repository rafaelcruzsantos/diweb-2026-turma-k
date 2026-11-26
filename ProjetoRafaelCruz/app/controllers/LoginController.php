<?php
require_once __DIR__ . '/../models/Usuario.php';

class LoginController {
    private $model;

    public function __construct() {
        // Se a sessão não estiver ativa, inicia
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->model = new Usuario();
    }

    // Exibe a tela de login
    public function index() {
        // Se já estiver logado, manda direto para a página principal
        if (isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=painel&action=index');
            exit;
        }
        $tituloPagina = 'Entrar';
        $ativo = 'login';
        require_once __DIR__ . '/../views/login/index.php';
    }

    // Processa o formulário de login
    public function logar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        $login = trim($_POST['login'] ?? '');
        $senha = $_POST['senha'] ?? '';

        $usuario = $this->model->findByLogin($login);

        // Verifica se o usuário existe e se a senha bate
        if ($usuario && password_verify($senha, $usuario['senha'])) {
            // Gera novo id de sessão após autenticar (evita fixação de sessão)
            session_regenerate_id(true);

            // Cria as variáveis de sessão
            $_SESSION['usuario_id']     = $usuario['id'];
            $_SESSION['usuario_nome']   = $usuario['nome'];
            $_SESSION['usuario_perfil'] = $usuario['perfil'];

            header('Location: index.php?controller=painel&action=index');
            exit;
        }

        $erro = "Login ou senha incorretos!";
        $tituloPagina = 'Entrar';
        $ativo = 'login';
        require_once __DIR__ . '/../views/login/index.php';
    }

    // Desloga do sistema
    public function sair() {
        $_SESSION = [];
        session_destroy();
        header('Location: index.php?controller=home&action=index');
        exit;
    }
}
