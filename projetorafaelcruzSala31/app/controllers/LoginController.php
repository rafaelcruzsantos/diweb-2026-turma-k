<?php
require_once __DIR__ .'/../models/Usuario.php';

class LoginController {
    private $model;

    public function __construct() {
        if (session_status() ===PHP_SESSION_NONE) {
            session_start();
        }
        $this->model = new Usuario();
    }

    public function index() {
        if (isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=painel&action=index');
            exit;
        }
        require_once __DIR__ .'/../views/login/index.php';
    }

    public function logar() {
        if($_SERVER['REQUEST_METHOD']=== 'POST') {
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            $db = Database: :getConnection();
            $stmt = $db->prepare("SELECT * FROM tbl_usuario WHERE login = :login");
            $stmt->execute(['login' => $login]);
            $usuario = $stmt->fetch();

            if ($usuario && password_verify($senha, $usuario['senha'])) {
                $_SESSION['usuario_id']  =$usuario['id'];
                $_SESSION['usuario_nome']  =$usuario['nome'];
                $_SESSION['usuario_perfil']  =$usuario['perfil'];
            }
        }
    }
}