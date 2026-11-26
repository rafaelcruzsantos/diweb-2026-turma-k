<?php require __DIR__ . '/../layouts/header.php'; ?>

  <main class="pagina-form">
    <section class="form-caixa">
      <h1>Bem-vinda de volta</h1>
      <p>Entre para acompanhar pedidos e salvar seus favoritos.</p>

      <?php if (isset($erro)): ?>
        <p class="alerta alerta-erro"><?= e($erro) ?></p>
      <?php elseif (($_GET['cadastro'] ?? '') === 'ok'): ?>
        <p class="alerta alerta-ok">Conta criada! Agora é só entrar.</p>
      <?php endif; ?>

      <form action="index.php?controller=login&amp;action=logar" method="POST">
        <div class="campo">
          <label for="login">E-mail ou login</label>
          <input type="text" id="login" name="login" placeholder="voce@exemplo.com" value="<?= e($_POST['login'] ?? '') ?>" required>
        </div>
        <div class="campo">
          <label for="senha">Senha</label>
          <input type="password" id="senha" name="senha" placeholder="Sua senha" required>
        </div>
        <button type="submit" class="btn">Entrar</button>
      </form>

      <p class="form-rodape">Ainda não tem conta? <a href="index.php?controller=cadastro&amp;action=index">Cadastre-se</a></p>
    </section>
  </main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
