<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../models/Cliente.php';

// Cadastro público: qualquer visitante cria uma conta de cliente
class CadastroController {
    private $usuarios;
    private $clientes;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->usuarios = new Usuario();
        $this->clientes = new Cliente();
    }

    // Exibe o formulário de cadastro
    public function index() {
        if (isset($_SESSION['usuario_id'])) {
            header('Location: index.php?controller=painel&action=index');
            exit;
        }
        $this->exibir();
    }

    // Valida e grava o novo cliente (usuário + dados de cliente)
    public function salvar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=cadastro&action=index');
            exit;
        }

        $dados = [
            'nome'       => trim($_POST['nome'] ?? ''),
            'login'      => trim($_POST['login'] ?? ''),
            'telefone'   => trim($_POST['telefone'] ?? ''),
            'nascimento' => trim($_POST['nascimento'] ?? ''),
            'cidade'     => trim($_POST['cidade'] ?? ''),
            'estilo'     => $_POST['estilo'] ?? ''
        ];
        $senha    = $_POST['senha'] ?? '';
        $confirma = $_POST['confirma'] ?? '';

        $erros = [];
        if ($dados['nome'] === '')                                   $erros[] = 'Informe seu nome.';
        if (!filter_var($dados['login'], FILTER_VALIDATE_EMAIL))     $erros[] = 'Informe um e-mail válido.';
        if (strlen($senha) < 6)                                      $erros[] = 'A senha precisa ter pelo menos 6 caracteres.';
        if ($senha !== $confirma)                                    $erros[] = 'As senhas não conferem.';
        if ($dados['telefone'] !== '' && !preg_match('/^[0-9 ()+-]{8,20}$/', $dados['telefone'])) {
            $erros[] = 'Telefone inválido.';
        }
        if ($dados['nascimento'] !== '') {
            $data = DateTime::createFromFormat('Y-m-d', $dados['nascimento']);
            if (!$data || $data->format('Y-m-d') !== $dados['nascimento'] || $data > new DateTime('today')) {
                $erros[] = 'Data de nascimento inválida.';
            }
        }
        if ($dados['estilo'] !== '' && !isset(Cliente::ESTILOS[$dados['estilo']])) {
            $erros[] = 'Estilo preferido inválido.';
        }
        if (!$erros && $this->usuarios->findByLogin($dados['login'])) {
            $erros[] = 'Já existe uma conta com esse e-mail.';
        }

        if ($erros) {
            $this->exibir($erros, $dados);
            return;
        }

        // Grava usuário e cliente juntos: se um falhar, nenhum é salvo
        $db = Database::getConnection();
        try {
            $db->beginTransaction();

            // O perfil é sempre "cliente": o visitante nunca escolhe o próprio perfil
            $this->usuarios->insert([
                'nome'   => $dados['nome'],
                'login'  => $dados['login'],
                'senha'  => password_hash($senha, PASSWORD_DEFAULT),
                'perfil' => 'cliente'
            ]);
            $usuarioId = $db->lastInsertId();

            $this->clientes->insert([
                'usuario_id'       => $usuarioId,
                'telefone'         => $dados['telefone'] ?: null,
                'nascimento'       => $dados['nascimento'] ?: null,
                'cidade'           => $dados['cidade'] ?: null,
                'estilo_preferido' => $dados['estilo'] ?: null
            ]);

            $db->commit();
        } catch (PDOException $ex) {
            $db->rollBack();
            $this->exibir(['Não foi possível concluir o cadastro. Tente novamente.'], $dados);
            return;
        }

        header('Location: index.php?controller=login&action=index&cadastro=ok');
        exit;
    }

    private function exibir($erros = [], $dados = []) {
        $dados = array_merge(
            ['nome' => '', 'login' => '', 'telefone' => '', 'nascimento' => '', 'cidade' => '', 'estilo' => ''],
            $dados
        );
        $tituloPagina = 'Cadastre-se';
        $ativo = 'cadastro';
        require_once __DIR__ . '/../views/cadastro/index.php';
    }
}
