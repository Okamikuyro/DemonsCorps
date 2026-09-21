<?php
session_start();
#var_dump($_SESSION);
if (isset($_SESSION['usuario_id'])) {
    $nome = htmlspecialchars($_SESSION['usuario_nome']);
    $linkLogin = "<a href='Carrinho.php' class='btn-carrinho'>🛒</a>
        <span>$nome</span>  
        <a href='Controle_PHP.php?acao=sair'>Sair</a>";
} else {
    $linkLogin = '<a href="Login.php">Entre ou Cadastre</a>';
}
?>
<!DOCTYPE html>
<html>
<head> <title>DemonsCorps</title> <link rel="stylesheet" href="paginaInicial.css"> </head>
<body>
    <header class="top-header">
        <div class="logo">
            <h1>DemonsCorps</h1>
        </div>
        <nav class="top-nav">
            <?php echo $linkLogin; ?>
        </nav>
    </header>

    <nav class="categories-nav">
        <a href="#1">PlaceHolder</a>
        <a href="#2">PlaceHolder</a>
        <a href="#3">PlaceHolder</a>
        <a href="#4">PlaceHolder</a>
        <a href="#5">PlaceHolder</a>
        <a href="#6">PlaceHolder</a>
        <a href="#7">PlaceHolder</a>
    </nav>

    
<div class="parent">
    <?php for ($i = 1; $i <= 10; $i++): ?>
        <div class="card-produto">
            <div class="foto-produto">
                PlaceHolder <?= $i ?>
            </div>

            <div class="info-produto">
                <h3 class="nome-produto">PlaceHolder <?= $i ?></h3>
                <div class="botoes-card">
                    <a href="#" class="btn-ver-mais">Ver mais</a>
                    <button class="btn-add-carrinho">Adicionar</button>
                </div>
            </div>
        </div>
    <?php endfor; ?>
</div>
    

   
    <footer>
        <p>&copy; DemonsCorps - Todos os direitos reservados.</p>
    </footer> 
</body>
</html>

