<?php
session_start();
include "app/cons.php";
require_once "app/DLL.php";
extract($_POST);
if (isset($_GET['acao']) && $_GET['acao'] == 'sair') {
    session_destroy();
    header("Location: Vitrine.php");
    exit();
}




if (isset($add_carrinho)) {
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: Cadastro.php");
        exit();
    }
    $id = $_POST['id'];
    if (isset($_SESSION['carrinho'][$id])) {
        $_SESSION['carrinho'][$id]['quantidade']++;
    } else {
        $_SESSION['carrinho'][$id] = [
            'id' => $_POST['id'],
            'nome' => $_POST['nome'],
            'valor' => $_POST['valor'],
            'foto' => $_POST['foto'],
            'quantidade' => 1
        ];
    }
    
    header("Location: Vitrine.php?sucesso=1");
    exit();
}


if (isset($atualizar_qtd)) {
    $id = $_POST['id'];
    $_SESSION['carrinho'][$id]['quantidade'] = $_POST['quantidade'];
    header("Location: Carrinho.php");
    exit();
}


if (isset($_GET['remover'])) {
    $id = $_GET['remover'];
    unset($_SESSION['carrinho'][$id]);
    header("Location: Carrinho.php");
    exit();
}




if (isset($BC)) {
$verificaCPF = "SELECT * FROM usuario WHERE CPF = '$CPF'";
$resultado = banco($server, $user, $password, $db, $verificaCPF);

if ($resultado && $resultado->num_rows > 0) {
    header("Location: Cadastro.php?erro=cpf_existe");
    exit();
}
$consulta = "INSERT INTO usuario (Id, Nome, CPF, Endereço, Bairro, Cidade, estado, CEP) 
             VALUES (NULL, '$Nome', '$CPF', '$Endereco', '$Bairro', '$Cidade', '$Estado', '$CEP')";
    banco($server, $user, $password, $db, $consulta);
    header("Location: Login.php");
    exit();
}
        if (isset($BL)) {
            $consulta = "SELECT * FROM Usuario WHERE Nome = '$Nome' AND CPF = '$CPF'";
            $resultado = banco($server, $user, $password, $db, $consulta);

            if ($linha = $resultado->fetch_assoc()) {
                $_SESSION['login'] = "ok";
                $_SESSION['usuario_id'] = $linha['Id'];
                $_SESSION['usuario_nome'] = $linha['Nome']; 
                header("Location: Vitrine.php");
                exit();
            } else {
            header("Location: Login.php?erro=1");
                exit();
            }
        }