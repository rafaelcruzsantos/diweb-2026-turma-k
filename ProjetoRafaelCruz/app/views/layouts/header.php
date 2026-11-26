<?php
// Cabeçalho compartilhado por todas as páginas.
// Variáveis esperadas: $tituloPagina (texto do <title>) e $ativo (item do menu em destaque)
$logado = isset($_SESSION['usuario_id']);
$ativo  = $ativo ?? '';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= e($tituloPagina ?? 'Início') ?> | Linho &amp; Lume</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,wght@0,600;0,700;1,600&family=Inter:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <!-- Cabeçalho (igual em todas as páginas) -->
  <header class="site-header">
    <div class="container header-inner">
      <a class="logo" href="index.php?controller=home&amp;action=index">Linho<span>&amp;</span>Lume</a>
      <nav class="main-nav" aria-label="Navegação principal">
        <ul>
          <li><a href="index.php?controller=home&amp;action=index" class="<?= $ativo === 'home' ? 'ativo' : '' ?>">Início</a></li>
          <li><a href="index.php?controller=produto&amp;action=index" class="<?= $ativo === 'produto' ? 'ativo' : '' ?>">Produtos</a></li>
          <?php if ($logado): ?>
            <li><a href="index.php?controller=painel&amp;action=index" class="<?= $ativo === 'painel' ? 'ativo' : '' ?>">Minha conta</a></li>
            <li><a href="index.php?controller=login&amp;action=sair" class="nav-destaque">Sair</a></li>
          <?php else: ?>
            <li><a href="index.php?controller=login&amp;action=index" class="<?= $ativo === 'login' ? 'ativo' : '' ?>">Entrar</a></li>
            <li><a href="index.php?controller=cadastro&amp;action=index" class="nav-destaque">Cadastre-se</a></li>
          <?php endif; ?>
        </ul>
      </nav>
    </div>
  </header>
