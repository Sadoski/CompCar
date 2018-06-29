<?php
    require 'config/banco.php';
    require 'Usuarios.php';
    
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $email = trim($_POST['email']);
        $senha = md5(trim($_POST['password']));
        
        $usuario = new Usuarios();
        $resultado = $usuario->carregar($email, $senha);

        if (count($resultado) > 0){
            session_start();
            foreach ($resultado as $linha):
                $id = $linha['id_usuario'];
                $login = $linha['login'];
                $email = $linha['email'];
            endforeach;
            $_SESSION['id_usuario'] = $id;
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $email;
            echo $email;        
            header("Location: index.php");
        }else{
            $_SESSION['loginErro'] = "Usuário ou senha inválido";
            header("Location: login.php");
        }
    }
?>