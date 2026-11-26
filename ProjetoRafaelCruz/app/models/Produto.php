<?php
require_once __DIR__ . '/Model.php';

class Produto extends Model {
    protected $table = 'tbl_produto';

    // Lista todos os produtos (com tamanhos e cores) na ordem de cadastro
    public function listar() {
        $produtos = $this->db->query("SELECT * FROM {$this->table} ORDER BY id ASC")->fetchAll();
        return $this->anexarVariacoes($produtos);
    }

    // Produtos marcados como destaque (vitrine da página inicial)
    public function destaques($limite = 4) {
        $limite = (int) $limite;
        $produtos = $this->db->query("SELECT * FROM {$this->table} WHERE destaque = 1 ORDER BY id ASC LIMIT {$limite}")->fetchAll();
        return $this->anexarVariacoes($produtos);
    }

    // Variações (tamanho + cor + estoque) de um produto
    public function variacoes($produtoId) {
        $stmt = $this->db->prepare("SELECT * FROM tbl_variacao WHERE produto_id = :id ORDER BY id ASC");
        $stmt->execute(['id' => $produtoId]);
        return $stmt->fetchAll();
    }

    // Junta em cada produto as listas 'tamanhos' e 'cores' (sem repetir)
    private function anexarVariacoes($produtos) {
        if (!$produtos) {
            return [];
        }

        $todas = $this->db->query("SELECT * FROM tbl_variacao ORDER BY id ASC")->fetchAll();
        $porProduto = [];
        foreach ($todas as $v) {
            $porProduto[$v['produto_id']][] = $v;
        }

        foreach ($produtos as &$p) {
            $p['tamanhos'] = [];
            $p['cores']    = [];
            foreach ($porProduto[$p['id']] ?? [] as $v) {
                if ((int) $v['estoque'] <= 0) {
                    continue; // só mostra o que tem em estoque
                }
                if (!in_array($v['tamanho'], $p['tamanhos'], true)) {
                    $p['tamanhos'][] = $v['tamanho'];
                }
                $p['cores'][$v['cor']] = $v['cor_hex'];
            }
        }
        unset($p);

        return $produtos;
    }
}
