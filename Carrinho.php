<?php
session_start();


if (!isset($_SESSION['usuario_id'])) {
    header("Location: Login.php");
    exit();
}

$nome = htmlspecialchars($_SESSION['usuario_nome']);
$linkLogin = "<span>|  $nome</span>  <a href='Controle_PHP.php?acao=sair'>Sair</a>";
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><title>DemonsCorps - Carrinho</title><link rel="stylesheet" href="paginaInicial.css"></head>
<body>
<header class="top-header">
    <div class="logo"><h1>DemonsCorps</h1></div>
    <nav class="top-nav">
            <a href="Vitrine.php"> Voltar </a>
        <?= $linkLogin ?>
    </nav>
</header>
        
   

   
    <footer>
        <p>&copy; DemonsCorps - Todos os direitos reservados.</p>
    </footer>
</body>
</html>