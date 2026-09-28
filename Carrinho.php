<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: Login.php");
    exit();
}

$nome = htmlspecialchars($_SESSION['usuario_nome']);
$linkLogin = "<span>| $nome</span> <a href='Controle_PHP.php?acao=sair'>Sair</a>";

$carrinho = $_SESSION['carrinho'] ?? [];


if (is_array($carrinho) && count($carrinho) === 0) {
    unset($_SESSION['carrinho']);
    $carrinho = [];
}

$totalGeral = 0;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>DemonsCorps - Carrinho</title>
    <link rel="stylesheet" href="paginaInicial.css">
</head>
<body>
<header class="top-header">
    <div class="logo"><h1>DemonsCorps</h1></div>
    <nav class="top-nav">
        <a href="Vitrine.php"> Voltar </a>
        <?= $linkLogin ?>
    </nav>
</header>

<div class="container-carrinho">
    <?php if (empty($carrinho) || count($carrinho) == 0): ?>
        <h1><p class="carrinho-vazio">Seu carrinho está vazio no momento.</p><h1>
    <?php else: ?>
        <table class="tabela-carrinho">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Produto</th>
                    <th>Preço Un.</th>
                    <th>Qtd</th>
                    <th>Subtotal</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($carrinho as $item): 
                    $subtotal = $item['valor'] * $item['quantidade'];
                    $totalGeral += $subtotal;
                ?>
                    <tr>
                        <td><img src="<?= $item['foto'] ?>" class="img-carrinho"></td>
                        <td><?= htmlspecialchars($item['nome']) ?></td>
                        <td>R$ <?= number_format($item['valor'], 2, ',', '.') ?></td>
                        <td>
                        
                            <form action="Controle_PHP.php" method="POST">
                                <input type="hidden" name="id" value="<?= $item['id'] ?>">
                                <input type="number" name="quantidade" value="<?= $item['quantidade'] ?>" min="1" onchange="this.form.submit()">
                                <input type="hidden" name="atualizar_qtd" value="1">
                            </form>
                        </td>
                        <td>R$ <?= number_format($subtotal, 2, ',', '.') ?></td>
                        <td>
                            <a href="Controle_PHP.php?remover=<?= $item['id'] ?>" class="btn-remover">Remover</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="resumo-carrinho">
            <h3>Total: R$ <?= number_format($totalGeral, 2, ',', '.') ?></h3>
            <a href="#comprar" class="btn-comprar">Comprar</a>
        </div>
    <?php endif; ?>
</div>

<footer>
    <p>&copy; DemonsCorps - Todos os direitos reservados.</p>
</footer>
</body>
</html>