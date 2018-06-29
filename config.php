<?php
    session_start();
    
    require 'config/banco.php';
    require 'Usuarios.php';
    $id = $_SESSION["id_usuario"];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senhaAtual = $_POST['senhaAtual'];
    $senhaNova = $_POST['password'];
    $senhaNovamente = $_POST['password-confirm'];
    
    if(($senhaNova == "") || ($senhaNovamente =="")){ 
        $usuario = new Usuarios();
        $usuario->editar($nome,$id);
        header('Location: user.php');
    } else {
        $senha = md5(trim($senhaAtual));
        $usuario = new Usuarios();
        $resultado = $usuario->carregar($email, $senha);
        if (count($resultado) > 0){
            $nova = md5(trim($senhaAtual));
            $usuario->redefinicao($nome, $nova, $id);
            
            require 'refresh-session.php';
            $refresh = RefreshSession();
            $refresh.refreshSession($id,$nome,$email);
            
             header("Location: user.php");
        }else{
            echo 'Senha invalida';
            exit();
        }
       
          
    }
    
    
    ?>