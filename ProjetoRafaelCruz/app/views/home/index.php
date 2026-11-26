<?php require __DIR__ . '/../layouts/header.php'; ?>

  <main>
    <!-- Banner principal -->
    <section class="hero">
      <div class="container hero-inner">
        <div>
          <span class="selo">Coleção Verão 2027</span>
          <h1>Vista a calma dos tecidos naturais</h1>
          <p>Linho, algodão e viscose em cortes leves e cores da terra. Peças feitas para durar e para combinar com tudo no seu guarda-roupa.</p>
          <a href="index.php?controller=produto&amp;action=index" class="btn">Ver coleção</a>
          <a href="index.php?controller=cadastro&amp;action=index" class="btn btn-outline">Criar conta</a>
        </div>
        <div class="hero-arte">
          <img src="assets/images/vestido.svg" alt="Ilustração de um vestido midi terracota">
        </div>
      </div>
    </section>

    <!-- Categorias -->
    <section class="secao">
      <div class="container">
        <div class="secao-titulo">
          <h2>Escolha seu estilo</h2>
          <p>Quatro universos para montar looks do dia à noite.</p>
        </div>
        <div class="grade">
          <article class="categoria-card">
            <h3>Camisaria</h3>
            <p>Linho e algodão cru</p>
          </article>
          <article class="categoria-card">
            <h3>Vestidos</h3>
            <p>Midis e longos fluidos</p>
          </article>
          <article class="categoria-card">
            <h3>Alfaiataria</h3>
            <p>Calças e saias de caimento</p>
          </article>
          <article class="categoria-card">
            <h3>Jeans &amp; Jaquetas</h3>
            <p>Lavagens suaves</p>
          </article>
        </div>
      </div>
    </section>

    <!-- Destaques (vindos do banco de dados) -->
    <section class="secao secao-escura">
      <div class="container">
        <div class="secao-titulo">
          <h2>Destaques da semana</h2>
          <p>As peças que mais saíram nos últimos dias.</p>
        </div>
        <div class="grade">
          <?php if (empty($destaques)): ?>
            <p>Nenhum destaque cadastrado ainda.</p>
          <?php else: ?>
            <?php foreach ($destaques as $p): ?>
              <?php require __DIR__ . '/../produto/_card.php'; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- Oferta -->
    <section class="oferta">
      <div class="container">
        <h2>Frete grátis acima de R$ 250</h2>
        <p>Cadastre-se hoje e ganhe 10% de desconto na primeira compra.</p>
        <a href="index.php?controller=cadastro&amp;action=index" class="btn">Quero meu desconto</a>
      </div>
    </section>

    <!-- Depoimentos -->
    <section class="secao">
      <div class="container">
        <div class="secao-titulo">
          <h2>Quem veste, aprova</h2>
        </div>
        <div class="grade">
          <article class="depoimento">
            <p>O linho é fresquinho e não amassa tanto quanto eu imaginava. Já levei três camisas.</p>
            <footer>Marina S., Brasília</footer>
          </article>
          <article class="depoimento">
            <p>Vestido lindo, tamanho certinho com o guia de medidas. Chegou em dois dias.</p>
            <footer>Camila R., Goiânia</footer>
          </article>
          <article class="depoimento">
            <p>A calça de alfaiataria tem um caimento que eu não achava em outro lugar.</p>
            <footer>Juliana P., Anápolis</footer>
          </article>
        </div>
      </div>
    </section>
  </main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
