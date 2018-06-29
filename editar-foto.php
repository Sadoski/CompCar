<?php

    require 'Usuarios.php';
    require 'config/banco.php';
    $id = $_GET['id'];
    $id = $_GET['foto'];
    
    $usuarios = new Usuarios();
    $usuarios->updateFoto($id,$foto);
    header('Location: user.php');
    ?>