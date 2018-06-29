<?php

    require 'anuncios.php';
    require 'config/banco.php';
    $id = $_GET['id'];
    
    $anuncio = new Anuncios();
    $anuncio->excluirAnuncio($id);
    header('Location: user.php');
    ?>