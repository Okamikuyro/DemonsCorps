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

if (isset($BC)) {
    $consulta = "INSERT INTO usuario (Id, Nome, CPF, Endereço, Bairro, Cidade, estado, CEP) 
                 VALUES (NULL, '$Nome', '$CPF', '$Endereco', '$Bairro', '$Cidade', '$Estado', '$CEP')";

    banco($server, $user, $password, $db, $consulta);

    echo "Usuário cadastrado com sucesso!";
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