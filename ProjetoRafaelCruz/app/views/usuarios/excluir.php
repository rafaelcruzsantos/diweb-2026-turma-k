<?php require __DIR__ . '/../layouts/header.php'; ?>

  <main class="pagina-form">
    <section class="form-caixa">
      <h1>Excluir usuário?</h1>
      <p>Você vai apagar <strong><?= e($usuario['nome']) ?></strong> (<?= e($usuario['login']) ?>). Essa ação não pode ser desfeita.</p>

      <!-- Confirmação feita com um formulário POST, sem JavaScript -->
      <form method="POST" action="index.php?controller=usuario&amp;action=excluir&amp;id=<?= e($usuario['id']) ?>">
        <button type="submit" class="btn btn-perigo">Sim, excluir</button>
      </form>

      <p class="form-rodape"><a href="index.php?controller=usuario&amp;action=index">Cancelar</a></p>
    </section>
  </main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
