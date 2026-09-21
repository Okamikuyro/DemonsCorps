<?php
if (isset($_GET['erro']) && $_GET['erro'] == 1) {
    echo "<script>alert('Nome ou CPF incorretos! Tente novamente.');</script>";
}
?>

<!DOCTYPE html>
<html>
<head><title>DemonsCorps - Login</title> <link rel="stylesheet" href="login.css"></head>
<body>
    <div class="login">
        <a href="Vitrine.php" class="btn-voltar">Voltar</a>
        <h2>DemonsCorps</h2>
        <h1>Login</h1>
        <form action="Controle_PHP.php" method="post">
            <input type="text" name="Nome" placeholder="Nome" minlength="3" required>
            <input type="text" id= "CPF" name="CPF" placeholder="CPF" minlength="14" required>
            <input type="submit" name="BL" value="Entrar">
        </form>
        <p>Não tem conta? <a href="cadastro.php">Cadastrar</a></p>
        <footer>
            <h6><p>&copy; DemonsCorps - Todos os direitos reservados.</p></h6>
        </footer>
    </div>

    <div class="imagem">    
    </div>

<script>
document.getElementById("CPF").addEventListener("input", function(){
    let cpf = this.value;
    cpf = cpf.replace(/\D/g, "");
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
    cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    this.value = cpf;
})
</script>
</body>
</html>
