<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Principal - Sistema </title>
</head>
<body>
    <header atyle ="background: #f4f4f4 ; padding: 10px; display: flex; justify-content: space-between; align-iteme: centrer:">
        <h1>🚀Painel do Sistema</h1>
        <div>
            Óla, <strong><7=$_SESSION['usuario_nome'] 7></strong>(perfil: <em> <7=stoupper($_SESSION['usuario_perfil']) ?></em>)|
            <a href="Index.php?controller=login&action=sair"style="color: red; font-wight: bold;">Sair</a>
        </div>

    </header>
     <main style="padding: 20px;">
     <h2>bem-vindo ao sistema acadêmico basel</h2>
     <p>Este é o esqueleto da sua pagina Principal. aqui você pode aplicar o seu tema, css, bootstrap ou criar seu cards.</p>
     <hr>
     <h3> Menu de Navegação do projeto:</h3>
     <ul>
        <li><a href=
        "Index.php?controller=usuario$action=index">Gerencia Usuario (CRUD)</a></li>
        <li><a href="#" onclick="alert('Espeço para o aluno criar o ClienteController!')">Gerencia Clientes (Desafio do aluno)</a></li>
        <li><a href="#" onclick="alert('Espeço para o aluno criar o produtocontroller!')">Gerencia Produtos (Desafio do aluno)</a></li>
     </ul>
    </main>
    <footer style="margin-top: 50px text-align: center; color #777;">
    <p>Disciplina LTP2 - Rafael Cruz</p>
    </footer>
</body>
</html>