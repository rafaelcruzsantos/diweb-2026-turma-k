<?php require __DIR__ . '/../layouts/header.php'; ?>

  <main>
    <section class="topo-pagina">
      <div class="container">
        <h1>Controle de usuários</h1>
        <p><a class="btn" href="index.php?controller=usuario&amp;action=cadastrar">Novo usuário</a></p>
      </div>
    </section>

    <section class="secao">
      <div class="container">
        <div class="tabela-wrap">
          <table>
            <caption>Usuários cadastrados (tbl_usuario)</caption>
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Login</th>
                <th scope="col">Perfil</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($usuarios)): ?>
                <tr><td colspan="5">Nenhum registro encontrado.</td></tr>
              <?php else: ?>
                <?php foreach ($usuarios as $u): ?>
                  <tr>
                    <td><?= e($u['id']) ?></td>
                    <td><?= e($u['nome']) ?></td>
                    <td><?= e($u['login']) ?></td>
                    <td><?= e($u['perfil']) ?></td>
                    <td class="acoes">
                      <a href="index.php?controller=usuario&amp;action=editar&amp;id=<?= e($u['id']) ?>">Editar</a>
                      <?php if ($u['id'] != $_SESSION['usuario_id']): ?>
                        | <a href="index.php?controller=usuario&amp;action=excluir&amp;id=<?= e($u['id']) ?>" class="link-perigo">Excluir</a>
                      <?php endif; ?>
                    </td>
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
