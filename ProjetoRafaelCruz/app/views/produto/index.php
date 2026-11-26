<?php require __DIR__ . '/../layouts/header.php'; ?>

  <main>
    <section class="topo-pagina">
      <div class="container">
        <h1>Coleção Verão 2027</h1>
        <p><?= count($produtos) ?> peças-chave para montar o seu guarda-roupa.</p>
      </div>
    </section>

    <!-- Listagem em cards (dados da tbl_produto) -->
    <section class="secao">
      <div class="container">
        <div class="grade">
          <?php if (empty($produtos)): ?>
            <p>Nenhum produto cadastrado ainda.</p>
          <?php else: ?>
            <?php $mostrarDescricao = true; ?>
            <?php foreach ($produtos as $p): ?>
              <?php require __DIR__ . '/_card.php'; ?>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </section>

    <!-- Tabela: guia de medidas -->
    <section class="secao secao-escura">
      <div class="container">
        <div class="secao-titulo">
          <h2>Guia de medidas</h2>
          <p>Compare com uma peça sua que serve bem.</p>
        </div>
        <div class="tabela-wrap">
          <table>
            <caption>Medidas em centímetros</caption>
            <thead>
              <tr>
                <th scope="col">Tamanho</th>
                <th scope="col">Busto</th>
                <th scope="col">Cintura</th>
                <th scope="col">Quadril</th>
                <th scope="col">Numeração</th>
              </tr>
            </thead>
            <tbody>
              <tr><th scope="row">P</th><td>82–88</td><td>64–70</td><td>90–96</td><td>36–38</td></tr>
              <tr><th scope="row">M</th><td>89–95</td><td>71–77</td><td>97–103</td><td>40–42</td></tr>
              <tr><th scope="row">G</th><td>96–102</td><td>78–84</td><td>104–110</td><td>44–46</td></tr>
              <tr><th scope="row">GG</th><td>103–110</td><td>85–92</td><td>111–118</td><td>48–50</td></tr>
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
