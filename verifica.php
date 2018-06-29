<?php 
 
// Verifica se existe os dados da sessão de login 
if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["login"]) || !isset($_SESSION["senha"])){ 
    // Usuário não logado! Redireciona para a página de login 
     //Destrói
    session_destroy();

    
    header("Location: login.php");
    exit();
    
} 
?>