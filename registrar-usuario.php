<?php
    require 'config/banco.php';
    require 'Usuarios.php';
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
     $senha = md5($_POST['password']);
    
    $usuario = new Usuarios();
    $usuario->inserir($nome, $email, $senha);

    header('Location: index.php');
    
?>
