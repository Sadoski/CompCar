<?php

    require 'Usuarios.php';
    require 'config/banco.php';
    $id = $_GET['id'];
    
    $usuarios = new Usuarios();
    $usuarios->deletFoto($id);
    header('Location: user.php');
    ?>