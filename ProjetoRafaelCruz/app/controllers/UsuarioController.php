<?php
require_once __DIR__ . '/../models/Usuario.php';

// CRUD de usuários: acesso restrito ao perfil "admin"
class UsuarioController {
    private $model;

    public function __construct() {
        // Inicia a sessão se não estiver iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Se tentar acessar o CRUD sem logar, vai para a tela de login
        if (!isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=login&action=index');
            exit;
        }

        // Clientes cadastrados pelo site não podem gerenciar usuários
        if (($_SESSION['usuario_perfil'] ?? '') !== 'admin') {
            header('Location: index.php?controller=painel&action=index');
            exit;
        }

        $this->model = new Usuario();
    }

    public function index() {
        $usuarios = $this->model->all();
        $tituloPagina = 'Usuários';
        $ativo = 'painel';
        require_once __DIR__ . '/../views/usuarios/index.php';
    }

    public function cadastrar() {
        $erro = null;
        $usuario = ['nome' => '', 'login' => '', 'perfil' => 'cliente'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = [
                'nome'   => trim($_POST['nome'] ?? ''),
                'login'  => trim($_POST['login'] ?? ''),
                'perfil' => $_POST['perfil'] ?? ''
            ];
            $senha = $_POST['senha'] ?? '';

            if ($usuario['nome'] === '' || $usuario['login'] === '' || strlen($senha) < 6) {
                $erro = 'Preencha nome, login e uma senha de pelo menos 6 caracteres.';
            } elseif (!isset(Usuario::PERFIS[$usuario['perfil']])) {
                $erro = 'Perfil inválido.';
            } elseif ($this->model->findByLogin($usuario['login'])) {
                $erro = 'Já existe um usuário com esse login.';
            } else {
                $this->model->insert([
                    'nome'   => $usuario['nome'],
                    'login'  => $usuario['login'],
                    'senha'  => password_hash($senha, PASSWORD_DEFAULT),
                    'perfil' => $usuario['perfil']
                ]);
                header('Location: index.php?controller=usuario&action=index');
                exit;
            }
        }

        $tituloPagina = 'Novo usuário';
        $ativo = 'painel';
        require_once __DIR__ . '/../views/usuarios/cadastrar.php';
    }

    public function editar() {
        $id = $_GET['id'] ?? null;
        if (!$id) die("ID não fornecido.");

        $usuario = $this->model->find($id);

        // Se o usuário não existir no banco, volta para a lista
        if (!$usuario) {
            header('Location: index.php?controller=usuario&action=index');
            exit;
        }

        $erro = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'nome'   => trim($_POST['nome'] ?? ''),
                'login'  => trim($_POST['login'] ?? ''),
                'perfil' => $_POST['perfil'] ?? ''
            ];
            $outro = $this->model->findByLogin($dados['login']);

            if ($dados['nome'] === '' || $dados['login'] === '') {
                $erro = 'Nome e login são obrigatórios.';
            } elseif (!isset(Usuario::PERFIS[$dados['perfil']])) {
                $erro = 'Perfil inválido.';
            } elseif ($outro && $outro['id'] != $id) {
                $erro = 'Já existe outro usuário com esse login.';
            } else {
                if (!empty($_POST['senha'])) {
                    $dados['senha'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                }
                $this->model->update($id, $dados);
                header('Location: index.php?controller=usuario&action=index');
                exit;
            }

            // Mantém o que foi digitado ao reexibir o formulário com erro
            $usuario = array_merge($usuario, $dados);
        }

        $tituloPagina = 'Editar usuário';
        $ativo = 'painel';
        require_once __DIR__ . '/../views/usuarios/editar.php';
    }

    // Excluir em duas etapas (sem JavaScript):
    // GET mostra a tela de confirmação, POST apaga de verdade.
    public function excluir() {
        $id = $_GET['id'] ?? null;
        $usuario = $id ? $this->model->find($id) : null;

        // Não deixa o admin apagar a própria conta nem um id inexistente
        if (!$usuario || $usuario['id'] == $_SESSION['usuario_id']) {
            header('Location: index.php?controller=usuario&action=index');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->delete($id);
            header('Location: index.php?controller=usuario&action=index');
            exit;
        }

        $tituloPagina = 'Excluir usuário';
        $ativo = 'painel';
        require_once __DIR__ . '/../views/usuarios/excluir.php';
    }
}
