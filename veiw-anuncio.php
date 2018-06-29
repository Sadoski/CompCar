<?php 
session_start();
require_once 'header.php' ?>

    <article class=" container wrapper col-md-10 ">
     <?php
     require 'config/banco.php';
    require 'anuncios.php';
    
    $anuncio = new Anuncios();
    $id = $_GET['id'];
    $lista = $anuncio->veiwAnuncios($id);
    if (count($lista) > 0 ){
    foreach ($lista as $linha): 
  
    ?> 
    <div class=" container border border-dark">
        <div class="container-fluid wrapper  border border-dark ">
           <h4 class="card-title mt-3 border border-dark" style="font-weight: bold; padding: 20px; background-color: black; color: white;"><?php echo $linha["marca"].' '.$linha["modelo"] ?></h4>
            <div class="row container ">
                <img src="<?php echo $linha["foto"] ?>" class="card ml-3 mt-3 mb-3" alt=""  width="250" height="250">
                <div style="padding: 60px">
                    <p class="card-text"><?php echo 'Ano: '.$linha["ano"].'</br>KM: '.$linha["km"].'</br>Tipo: '.$linha["tipo"].'</br>Combustivel: '.$linha["combustivel"].'</br>Cor: '.$linha["cor"].'</br>Adicionais: '.$linha["opcional"]?></p>
                </div>
            </div>
            <p class="card-text" style="text-align: right; color: blue; font-size: 1.8em; font-weight: bold; padding: 25px"><?php echo $linha["valor"] ?></p>
        </div>
        </div>
        </div>
    <?php endforeach; } else {
     require_once '404.php';
    }?>
    </article>
<?php require_once 'footer.php' ?>