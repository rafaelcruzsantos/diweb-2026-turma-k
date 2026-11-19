<?php
require_once 'app/view/painel/topo.php';
?>
<body>
    <header class="header">
        <div>
            Olá, <strong><?= $_SESSION['usuario_nome'] ?></strong>
            (Perfil: <em><?= strtoupper($_SESSION['usuario_perfil']) ?></em>) |
            <a href="index.php?controller=login&action=sair" style="color: red; font-weight: bold;">Sair</a>
        </div>
        <div class="container navbar">
            <a href="#" class="logo">Bella<span>Estética</span></a>
            <nav>
                <ul class="nav-links">
                    <li><a href="#inicio">Início</a></li>
                    <li><a href="#sobre">Sobre Nós</a></li>
                    <li><a href="index.php?controller=usuario&action=index">Gerenciar Usuários</a></li>
                    <li><a href="#servicos">Tratamentos</a></li>
                    <li><a href="#contato">Contato</a></li>
                </ul>
            </nav>
            <a href="#agendamento" class="btn btn-primary">Agendar Consulta</a>
        </div>
    </header>
    <body>
        <h2>Novo Usuário</h2>
        <form method="POST">
            <label>Nome:</label><br>
            <input type="text" name="nome" required><br><br>

            <label>E-Mail:</label><br>
            <input type="email" name="email" required><br><br>

            <button type="submit">Salvar</button>
            <a href="index.php?controller=usuario&action=index">Voltar</a>
        </form>
    </body>
</body>
</html>