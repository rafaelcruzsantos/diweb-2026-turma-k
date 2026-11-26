<?php require __DIR__ . '/../layouts/header.php'; ?>

  <main class="pagina-form">
    <section class="form-caixa">
      <h1>Crie sua conta</h1>
      <p>Ganhe 10% de desconto na primeira compra.</p>

      <?php if (!empty($erros)): ?>
        <div class="alerta alerta-erro">
          <?php foreach ($erros as $msg): ?>
            <p><?= e($msg) ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <form action="index.php?controller=cadastro&amp;action=salvar" method="POST">
        <div class="campo">
          <label for="nome">Nome completo</label>
          <input type="text" id="nome" name="nome" placeholder="Seu nome" value="<?= e($dados['nome']) ?>" required>
        </div>
        <div class="campo">
          <label for="login">E-mail (será seu login)</label>
          <input type="email" id="login" name="login" placeholder="voce@exemplo.com" value="<?= e($dados['login']) ?>" required>
        </div>
        <div class="linha-dupla">
          <div class="campo">
            <label for="nascimento">Nascimento</label>
            <input type="date" id="nascimento" name="nascimento" value="<?= e($dados['nascimento']) ?>">
          </div>
          <div class="campo">
            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" name="telefone" placeholder="(61) 90000-0000" value="<?= e($dados['telefone']) ?>">
          </div>
        </div>
        <div class="linha-dupla">
          <div class="campo">
            <label for="cidade">Cidade</label>
            <input type="text" id="cidade" name="cidade" placeholder="Sua cidade" value="<?= e($dados['cidade']) ?>">
          </div>
          <div class="campo">
            <label for="estilo">Estilo preferido</label>
            <select id="estilo" name="estilo">
              <option value="">Escolha...</option>
              <?php foreach (Cliente::ESTILOS as $valor => $rotulo): ?>
                <option value="<?= e($valor) ?>" <?= $dados['estilo'] === $valor ? 'selected' : '' ?>><?= e($rotulo) ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="linha-dupla">
          <div class="campo">
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" minlength="6" required>
          </div>
          <div class="campo">
            <label for="confirma">Confirmar senha</label>
            <input type="password" id="confirma" name="confirma" minlength="6" required>
          </div>
        </div>
        <button type="submit" class="btn">Criar conta</button>
      </form>

      <p class="form-rodape">Já tem conta? <a href="index.php?controller=login&amp;action=index">Entrar</a></p>
    </section>
  </main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
