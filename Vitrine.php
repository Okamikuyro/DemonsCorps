<?php
session_start();

require_once 'app/cons.php'; 
require_once 'app/DLL.php'; 


$sql_religioes = "SELECT * FROM religioes";
$res_religioes = banco($server, $user, $password, $db, $sql_religioes);


$sql_categorias = "SELECT * FROM categorias";
$res_categorias = banco($server, $user, $password, $db, $sql_categorias);


if (isset($_GET['religiao'])) {
    $id = $_GET['religiao'];
    $sql_produtos = "SELECT * FROM produtos WHERE Id_religioes = $id";
} elseif (isset($_GET['categoria'])) {
    $id = $_GET['categoria'];
    $sql_produtos = "SELECT * FROM produtos WHERE Id_categoria = $id";
} else {
    $sql_produtos = "SELECT * FROM produtos";
}


$resultado = banco($server, $user, $password, $db, $sql_produtos);

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
<head> 
    <title>DemonsCorps</title> 
    <link rel="stylesheet" href="paginaInicial.css"> 
</head>
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
    <div class="nav-item">
        <span class="texto-info">Religiões ▾</span>
        <div class="sub-navbar">
            <a href="Vitrine.php">Padrão</a>
            <?php while ($r = $res_religioes->fetch_assoc()): ?>
                <a href="Vitrine.php?religiao=<?php echo $r['Id_religioes']; ?>&nome=<?php echo urlencode($r['Nome_religiao']); ?>">
                    <?php echo $r['Nome_religiao']; ?>
                </a>
            <?php endwhile; ?>
        </div>
    </div>

    <div class="nav-item">
        <span class="texto-info">Categorias ▾</span>
        <div class="sub-navbar">
            <a href="Vitrine.php">Padrão</a>
            <?php while ($c = $res_categorias->fetch_assoc()): ?>
                <a href="Vitrine.php?categoria=<?php echo $c['Id_categoria']; ?>&nome=<?php echo urlencode($c['Nome_categoria']); ?>">
                    <?php echo $c['Nome_categoria']; ?>
                </a>
            <?php endwhile; ?>
        </div>
    </div>
</nav>
<?php if (isset($_GET['nome'])): ?>
    <h2 class="titulo-categoria"><?php echo htmlspecialchars($_GET['nome']); ?></h2>
<?php endif; ?>

<div class="parent">
    <?php while ($produto = $resultado->fetch_assoc()): ?>
        <div class="card-produto">
            <div class="foto-produto">
                <img src="<?php echo $produto['foto']; ?>" class="img-produto">
            </div>

            <div class="info-produto">
                <h3 class="nome-produto"><?php echo $produto['nome_produto']; ?></h3>
                <p>R$ <?php echo $produto['Valor']; ?></p>

                <div class="botoes-card">
                    <a href="" class="btn-ver-mais">Ver mais</a>
                    <form action="Controle_PHP.php" method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $produto['id_produto']; ?>">
                        <input type="hidden" name="nome" value="<?php echo $produto['nome_produto']; ?>">
                        <input type="hidden" name="valor" value="<?php echo $produto['Valor']; ?>">
                        <input type="hidden" name="foto" value="<?php echo $produto['foto']; ?>">
                        <button type="submit" name="add_carrinho" class="btn-add-carrinho">Adicionar</button>
                    </form>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<footer>
    <p>&copy; DemonsCorps - Todos os direitos reservados.</p>
</footer> 
</body>
</html>