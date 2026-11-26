<?php
require_once __DIR__ . '/Model.php';

// Dados complementares do cliente (o login e a senha ficam na tbl_usuario)
class Cliente extends Model {
    protected $table = 'tbl_cliente';

    // Estilos que o cliente pode escolher no cadastro
    const ESTILOS = [
        'camisaria'   => 'Camisaria',
        'vestidos'    => 'Vestidos',
        'alfaiataria' => 'Alfaiataria',
        'jeans'       => 'Jeans e jaquetas'
    ];

    // Busca os dados do cliente a partir do id do usuário logado
    public function findByUsuario($usuarioId) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE usuario_id = :id");
        $stmt->execute(['id' => $usuarioId]);
        return $stmt->fetch();
    }

    // Lista os usuários com perfil "cliente" junto com seus dados de cadastro
    public function listarComUsuario() {
        $sql = "SELECT u.id, u.nome, u.login, c.telefone, c.nascimento, c.cidade, c.estilo_preferido, c.criado_em
                FROM tbl_usuario u
                LEFT JOIN {$this->table} c ON c.usuario_id = u.id
                WHERE u.perfil = 'cliente'
                ORDER BY u.id DESC";
        return $this->db->query($sql)->fetchAll();
    }
}
