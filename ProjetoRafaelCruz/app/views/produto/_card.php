<?php
// Card de produto reutilizado na home e na listagem.
// Espera a variável $p (linha da tbl_produto + 'tamanhos' e 'cores') e, opcionalmente, $mostrarDescricao.
$fundo = 'fundo-' . (($p['id'] % 4) + 1);
?>
<article class="card">
  <div class="card-img <?= $fundo ?>">
    <img src="assets/images/<?= e($p['imagem']) ?>" alt="<?= e($p['nome']) ?>">
  </div>
  <div class="card-corpo">
    <span class="categoria"><?= e($p['categoria']) ?></span>
    <h3><?= e($p['nome']) ?></h3>
    <?php if (!empty($mostrarDescricao)): ?>
      <p><?= e($p['descricao']) ?></p>
    <?php endif; ?>

    <?php if (!empty($p['tamanhos'])): ?>
      <ul class="tamanhos" aria-label="Tamanhos disponíveis">
        <?php foreach ($p['tamanhos'] as $t): ?>
          <li><?= e($t) ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <?php if (!empty($p['cores'])): ?>
      <ul class="cores" aria-label="Cores disponíveis">
        <?php foreach ($p['cores'] as $nomeCor => $hex): ?>
          <li><span class="amostra" style="background: <?= e($hex) ?>"></span><?= e($nomeCor) ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <p class="preco">
      <?= preco($p['preco']) ?>
      <?php if (!empty($p['preco_antigo'])): ?>
        <small><?= preco($p['preco_antigo']) ?></small>
      <?php endif; ?>
    </p>
    <?php if (!empty($mostrarDescricao)): ?>
      <a href="index.php?controller=login&amp;action=index" class="btn">Comprar</a>
    <?php endif; ?>
  </div>
</article>
