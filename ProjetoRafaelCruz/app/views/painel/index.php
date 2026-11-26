<?php require __DIR__ . '/../layouts/header.php'; ?>

  <main>
    <section class="topo-pagina">
      <div class="container">
        <h1>Olá, <?= e($_SESSION['usuario_nome']) ?></h1>
        <p>Perfil: <?= e(strtoupper($_SESSION['usuario_perfil'])) ?></p>
      </div>
    </section>

    <section class="secao">
      <div class="container">
        <div class="grade">
          <article class="categoria-card">
            <h3>Ver a loja</h3>
            <p>Confira a coleção Verão 2027.</p>
            <a href="index.php?controller=produto&amp;action=index" class="btn">Ir para produtos</a>
          </article>

          <?php if (in_array($_SESSION['usuario_perfil'], ['admin', 'vendedor'], true)): ?>
            <article class="categoria-card">
              <h3>Clientes</h3>
              <p>Veja quem se cadastrou na loja.</p>
              <a href="index.php?controller=cliente&amp;action=index" class="btn">Ver clientes</a>
            </article>
          <?php endif; ?>

          <?php if ($_SESSION['usuario_perfil'] === 'admin'): ?>
            <article class="categoria-card">
              <h3>Gerenciar usuários</h3>
              <p>Cadastrar, editar e excluir contas.</p>
              <a href="index.php?controller=usuario&amp;action=index" class="btn">Abrir CRUD</a>
            </article>
          <?php endif; ?>

          <article class="categoria-card">
            <h3>Sair</h3>
            <p>Encerrar a sessão neste dispositivo.</p>
            <a href="index.php?controller=login&amp;action=sair" class="btn btn-outline">Sair da conta</a>
          </article>
        </div>

        <?php if ($cliente): ?>
          <div class="dados-cliente">
            <h2>Meus dados</h2>
            <dl>
              <dt>Telefone</dt><dd><?= e($cliente['telefone'] ?: '—') ?></dd>
              <dt>Nascimento</dt><dd><?= $cliente['nascimento'] ? e(date('d/m/Y', strtotime($cliente['nascimento']))) : '—' ?></dd>
              <dt>Cidade</dt><dd><?= e($cliente['cidade'] ?: '—') ?></dd>
              <dt>Estilo preferido</dt><dd><?= e(Cliente::ESTILOS[$cliente['estilo_preferido']] ?? '—') ?></dd>
            </dl>
          </div>
        <?php endif; ?>
      </div>
    </section>
  </main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
