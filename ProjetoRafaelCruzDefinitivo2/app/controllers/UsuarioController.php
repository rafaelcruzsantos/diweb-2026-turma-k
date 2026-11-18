<?php
require_once __DIR__.'/../model/Usuario.php';

class UsuarioController {
    private $model;
    public function __construtct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset ($_SESSION['usuario_id'])) {
            header('Location:
            index.php?controller=login&action=index');
            exit;
        }
        $this->model = new Usuario();
    }
    public function index() {
$usuarios = $this->model->all();
require_once __DIR__ .'/../view/usuarios/index.php';
    }
    public function cadastrar() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$dados = [
    'nome' => $_POST['nome'],
    'login' => $_POST['login'],
    'senha' => password_hash ($_POST['senha'],
    PASSWORD_DEFAULT), 
'perfil' => $_POST['perfil']
];
$this->model->insert($dados);
header ('Location: index.php?controller=usuario&action=index');
exit;
        }
        require_once __DIR__ .'/../view/usuario/cadastrar.php';
    }
    public function editar() {
$Id = $_GET['id'] ?? null;
if (!id) die("ID não fornecido.");
if ($_SERVER['REQUEST_METHOD']=== 'POST') {
    $dados = [
        'nome' => $_POST['nome'],
        'login' => $_POST['login'],
        'perfil' => $_POST['perfil']
    ];
if (!empty($_POST['senha'])) {
    $dados ['senha'] = password_hash ($_POST['senha'], PASSWORD_DEFAULT);
}
$this->model->update($id, $dados);
header('Location:
index.php?controller=usuario&action=index');
exit;
}
$usuario = $this->model->find($id);
if (!$usuario) {
header ('Location:
index.php?controller=usuario&action=index');
exit;
}
require_once __DIR__ .'/../view/usuarios/editar/php';
    }
    public function excluir () {
$id = $_GET['id'] ?? null;
if ($id) {
    $this->model->delete($id);
}
header('Location:
index.php?controller=usuario&action=index');
exit;
    }

}