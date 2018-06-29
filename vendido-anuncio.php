<?php

    require 'anuncios.php';
    require 'config/banco.php';
    $id = $_GET['id'];
    
    $anuncio = new Anuncios();
    $anuncio->updateVendido($id,$foto);
    header('Location: user.php');
    ?>