<!DOCTYPE html>
<html>
<head><title>DemonsCorps - Cadastro</title><link rel="stylesheet" href="cadastro.css"></head>
<body>
    <div class="cadastro">
        <a href="Login.php" class="btn-voltar">Voltar</a>
        <h2>DemonsCorps</h2>
        <h1>Cadastrar</h1>
        <form action="Controle_PHP.php" method="post">
            <input type="text" name="Nome" placeholder="Nome Completo" minlength="3" required>
            <input type="text" id= "CPF" name="CPF" placeholder="CPF" minlength="14" required>
            <input type="text" name="Endereco" placeholder="Endereço" minlength="5" required>
            <input type="text" name="Bairro" placeholder="Bairro" minlength="2" required>
            <input type="text" name="Cidade" placeholder="Cidade" minlength="2" required>
            <input type="text" name="Estado" placeholder="Estado" minlength="2" required>
            <input type="text" id= "CEP" name="CEP" placeholder="CEP" minlength="9" required>
            
            <input type="submit" name="BC" value="Cadastrar">
        </form>
        <p>Já tem conta? <a href="Login.php">Fazer Login</a></p>
        <footer>
            <p>&copy; DemonsCorps - Todos os direitos reservados.</p>
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
});
document.getElementById("CEP").addEventListener("input", function(){
    let cep = this.value;
    cep = cep.replace(/\D/g, "");
    cep = cep.replace(/(\d{5})(\d)/, "$1-$2");
    this.value = cep;
});

</script>
</body>
</html>