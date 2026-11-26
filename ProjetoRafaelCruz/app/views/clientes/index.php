<?php require __DIR__ . '/../layouts/header.php'; ?>

  <main>
    <section class="topo-pagina">
      <div class="container">
        <h1>Clientes cadastrados</h1>
        <p><?= count($clientes) ?> cliente(s) na loja.</p>
      </div>
    </section>

    <section class="secao">
      <div class="container">
        <div class="tabela-wrap">
          <table>
            <caption>Clientes (tbl_usuario + tbl_cliente)</caption>
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Nascimento</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estilo</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($clientes)): ?>
                <tr><td colspan="7">Nenhum cliente cadastrado.</td></tr>
              <?php else: ?>
                <?php foreach ($clientes as $c): ?>
                  <tr>
                    <td><?= e($c['id']) ?></td>
                    <td><?= e($c['nome']) ?></td>
                    <td><?= e($c['login']) ?></td>
                    <td><?= e($c['telefone'] ?: '—') ?></td>
                    <td><?= $c['nascimento'] ? e(date('d/m/Y', strtotime($c['nascimento']))) : '—' ?></td>
                    <td><?= e($c['cidade'] ?: '—') ?></td>
                    <td><?= e(Cliente::ESTILOS[$c['estilo_preferido']] ?? '—') ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        <p class="form-rodape"><a href="index.php?controller=painel&amp;action=index">&larr; Voltar ao painel</a></p>
      </div>
    </section>
  </main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
