<?php require __DIR__ . '/../layouts/header.php'; ?>

  <main class="pagina-form">
    <section class="form-caixa">
      <h1>Novo usuário</h1>
      <p>Crie uma conta e defina o perfil de acesso.</p>

      <?php if (!empty($erro)): ?>
        <p class="alerta alerta-erro"><?= e($erro) ?></p>
      <?php endif; ?>

      <form method="POST">
        <div class="campo">
          <label for="nome">Nome</label>
          <input type="text" id="nome" name="nome" value="<?= e($usuario['nome']) ?>" required>
        </div>
        <div class="campo">
          <label for="login">Login</label>
          <input type="text" id="login" name="login" value="<?= e($usuario['login']) ?>" required>
        </div>
        <div class="campo">
          <label for="senha">Senha</label>
          <input type="password" id="senha" name="senha" minlength="6" required>
        </div>
        <div class="campo">
          <label for="perfil">Perfil</label>
          <select id="perfil" name="perfil" required>
            <?php foreach (Usuario::PERFIS as $valor => $rotulo): ?>
              <option value="<?= e($valor) ?>" <?= $usuario['perfil'] === $valor ? 'selected' : '' ?>><?= e($rotulo) ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <button type="submit" class="btn">Salvar</button>
      </form>

      <p class="form-rodape"><a href="index.php?controller=usuario&amp;action=index">Voltar</a></p>
    </section>
  </main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
