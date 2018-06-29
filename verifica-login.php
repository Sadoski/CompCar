<?php 
 
// Verifica se existe os dados da sessão de login 
if(!isset($_SESSION["id_usuario"]) || !isset($_SESSION["login"]) || !isset($_SESSION["senha"])){ 
    
} else {
    header("Location: index.php");
    exit();  
}
?>