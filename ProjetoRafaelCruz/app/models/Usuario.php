<?php
require_once __DIR__ . '/Model.php';

class Usuario extends Model {
    protected $table = 'tbl_usuario';

    // Perfis aceitos no sistema (usados para validar o formulário)
    const PERFIS = ['admin' => 'Administrador', 'vendedor' => 'Vendedor', 'cliente' => 'Cliente'];

    // Busca um usuário pelo login (retorna false se não existir)
    public function findByLogin($login) {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE login = :login");
        $stmt->execute(['login' => $login]);
        return $stmt->fetch();
    }
}
