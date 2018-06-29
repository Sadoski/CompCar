<?php 
require 'config/banco.php';
require 'anuncios.php';
$anuncio = new Anuncios(); 
// definir o numero de itens por pagina
$itens_por_pagina = 10;

// pegar a pagina atual
if (!isset($_GET['pagina'])) {
    $pagina = 0;
} else {
    $pagina = intval($_GET['pagina']); 
     
}


$proximaPagina = ($pagina * $itens_por_pagina) - $itens_por_pagina;

$total = $anuncio->listarVeiculos();
$num = count($total);
$quantidadeDeLinks = ceil($num / $itens_por_pagina);
session_start();
?>
<?php require_once 'header.php' ?>
      <article class=" col-lg-12 col-md-12"> <!-- Sessão Conteudo -->
        <div class="container wrapper">
            <form  class="form-group" method = "Post" enctype="multipart/form-data" action="pesquisa.php" >
            <center><div class="form-group" >
                    <select class="" onChange="" name="marca" style="width:180px">
                        <option value=""></option>
                        <?php
                        
                        
                        $lista = $anuncio->pesquisarMarca();
                        if (count($lista) > 0){
                        foreach ($lista as $linha): 
                         {?>
                            <option value="<?php echo $linha['marca'] ?>"><?php echo $linha['marca'] ?></option>
                        <?php } endforeach; }?>
                    </select> 
                    <select class="" onChange="" name="modelo" style="width:180px">
                        <option  value=""></option>
                        <?php
                        
                        $lista = $anuncio->pesquisarModelo();
                        if (count($lista) > 0){
                        foreach ($lista as $linha): ?>
                            <option  value="<?php echo $linha['modelo'] ?>"><?php echo $linha['modelo'] ?></option>
                        <?php endforeach; }?>
                    </select> 
                    <select  class="" onChange="" name="ano" style="width:180px">
                        <option  value=""></option>
                        <?php
                        
                        $lista = $anuncio->pesquisarAno();
                        if (count($lista) > 0){
                        foreach ($lista as $linha): ?>
                            <option value="<?php echo $linha['ano'] ?>"><?php echo $linha['ano'] ?></option>
                        <?php endforeach; }?>
                    </select>
                    <select class="" onChange="" name="preco" style="width:180px">
                        <option  value=""></option>
                        <option  value="0 até 5.000">0 até 5.000</option>
                        <option  value="10.000 até 30.000">10.000 até 30.000</option>
                        <option  value="30.000 até 50.000">30.000 até 50.000</option>
                        <option  value="50.000 até 70.000">50.000 até 70.000</option>
                        <option  value="70.000 até 80.000">70.000 até 80.000</option>
                        <option  value="80.000 até 100.000">80.000 até 100.000</option>
                        <option  value="100.000 até 130.000">100.000 até 130.000</option>
                        <option  value="130.000 até 150.000">130.000 até 150.000</option>
                        <option  value="150.000...">150.000...</option>
                    </select>
                    <select class="" onChange="" name="tipo" style="width:180px">
                        <option  value=""></option>
                        <?php
                        
                        $lista = $anuncio->pesquisarTipo();
                        if (count($lista) > 0){
                        foreach ($lista as $linha): ?>
                            <option  value="<?php echo $linha['tipo'] ?>"><?php echo $linha['tipo'] ?></option>
                        <?php endforeach; }?>
                    </select>
                <div class=" mt-3 col-12 col-md-3">
                  <button type="submit" class="btn btn-block btn-lg btn-primary">Pesquisar</button>
                </div>
            </div></center>
            </form>
          <div class="form-row mt-5">
            
            
            <form class="form-group col-lg-9 col-md-3">   
                <div class="form-row">
                        <?php
                        
                        if (!isset($_POST['marca']) || !isset($_POST['modelo']) || !isset($_POST['ano']) || !isset($_POST['tipo']) || !isset($_POST['preco'])){
                        if (!isset($_GET['marca'])){
                            $marca = "";
                        }else{
                            $marca = strval($_GET['marca']);
                        }

                        if (!isset($_GET['modelo'])){
                            $modelo = "";
                        }else{
                            $modelo = strval($_GET['modelo']);
                        }
                        
                        if (!isset($_GET['ano'])){
                            $ano = "";
                        }else{
                            $ano = strval($_GET['ano']);
                        }

                        if (!isset($_GET['tipo'])){
                            $tipo = "";
                        }else{
                            $tipo = strval($_GET['tipo']);
                        }

                        if (!isset($_GET['valor'])){
                            $valor = "";
                        }else{
                            $valor = strval($_GET['valor']);
                        }
                        if ($valor == ""){
                            $val = 0;
                            $lista = $anuncio->numPage($marca, $modelo, $ano, $tipo, $val, $pagina, $itens_por_pagina);
                        }elseif ($valor =="0 até 5.000") {
                            $val1 = 0;
                            $val2 = 5000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="10.000 até 30.000") {
                            $val1 = 10000.00;
                            $val2 = 30000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="30.000 até 50.000") {
                            $val1 = 30000.00;
                            $val2 = 70000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="50.000 até 70.000") {
                            $val1 = 50000.00;
                            $val2 = 70000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="70.000 até 80.000") {
                            $val1 = 70000.00;
                            $val2 = 80000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="80.000 até 100.000") {
                            $val1 = 80000.00;
                            $val2 = 10000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="100.000 até 130.000") {
                            $val1 = 100000.00;
                            $val2 = 130000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="130.000 até 150.000") {
                            $val1 = 130000.00;
                            $val2 = 150000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="150.000...") {
                            $val = 150000.00;
                            $lista = $anuncio->numPage($marca, $modelo, $ano, $tipo, $val, $pagina, $itens_por_pagina);
                        }
                            
                    
                        } else {
                         
                        if (!isset($_POST['marca'])){
                            $marca = "";
                        }else{
                            $marca = strval($_POST['marca']);
                        }

                        if (!isset($_POST['modelo'])){
                            $modelo = "";
                        }else{
                            $modelo = strval($_POST['modelo']);
                        }
                        
                        if (!isset($_POST['ano'])){
                            $ano = "";
                        }else{
                            $ano = strval($_POST['ano']);
                        }

                        if (!isset($_POST['tipo'])){
                            $tipo = "";
                        }else{
                            $tipo = strval($_POST['tipo']);
                        }

                        if (!isset($_POST['preco'])){
                            $valor = "";
                        }else{
                            $valor = strval($_POST['preco']);
                        }
                        if ($valor == ""){
                            $val = 0;
                            $lista = $anuncio->numPage($marca, $modelo, $ano, $tipo, $val, $pagina, $itens_por_pagina);
                        }elseif ($valor =="0 até 5.000") {
                            $val1 = 0;
                            $val2 = 5000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="10.000 até 30.000") {
                            $val1 = 10000.00;
                            $val2 = 30000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="30.000 até 50.000") {
                            $val1 = 30000.00;
                            $val2 = 70000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="50.000 até 70.000") {
                            $val1 = 50000.00;
                            $val2 = 70000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="70.000 até 80.000") {
                            $val1 = 70000.00;
                            $val2 = 80000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="80.000 até 100.000") {
                            $val1 = 80000.00;
                            $val2 = 10000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="100.000 até 130.000") {
                            $val1 = 100000.00;
                            $val2 = 130000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="130.000 até 150.000") {
                            $val1 = 130000.00;
                            $val2 = 150000.00;
                            $lista = $anuncio->numPage2($marca, $modelo, $ano, $tipo, $val1, $val2, $pagina, $itens_por_pagina);
                        }elseif ($valor =="150.000...") {
                            $val = 150000.00;
                            $lista = $anuncio->numPage($marca, $modelo, $ano, $tipo, $val, $pagina, $itens_por_pagina);
                        }
                         }
                        if (count($lista) > 0){
                        foreach ($lista as $linha): ?>
                <div class="col-lg-4 col-md-6 mb-3">
                    <div class="card">
                      <div class="view overlay">
                        <img src="<?php echo $linha['foto'] ?>" class="card-img-top" alt="">
                        <a href="#">
                          <div class="mask rgba-white-slight"></div>
                        </a>
                      </div>
                      <div class="card-body">
                        <h4 class="card-title"><?php echo $linha['marca'].' '.$linha['modelo'] ?></h4>
                        <p class="card-text"><?php echo 'Ano: '.$linha['ano'].'</br>Combustivel: '.$linha['combustivel'].'</br>Cor: '.$linha['cor'].'</br>Valor: '.$linha['valor'] ?></p>
                        <a href="veiw-anuncio.php?id=<?php echo $linha['id_veiculos'] ?>" class="btn btn-indigo">Veja Mais</a>
                      </div>

                    </div>

                </div>
              <?php endforeach; }?>
                </div>
            </form>

          </div>
            <div class="pagination_area" >
                <nav id="pg-navegation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="pesquisa.php?pagina=0&marca=<?php echo $marca;?>&modelo=<?php echo $modelo;?>&ano=<?php echo $ano;?>&valor=<?php echo $valor;?>&tipo=<?php echo $tipo;?>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <?php 
                            for($i=0;$i<$quantidadeDeLinks;$i++){
                                $estilo = "";
                                if($pagina == $i)
                                    $estilo = "class=\"active\"";
                        ?>
                        <li class="page-item" <?php echo $estilo; ?> ><a class="page-link" href="pesquisa.php?pagina=<?php echo $i; ?>&marca=<?php echo $marca;?>&modelo=<?php echo $modelo;?>&ano=<?php echo $ano;?>&valor=<?php echo $valor;?>&tipo=<?php echo $tipo;?>"><?php echo $i+1; ?></a></li>
                                <?php } ?>
                        <li class="page-item">
                            <a class="page-link" href="pesquisa.php?pagina=<?php echo $quantidadeDeLinks-1;?>&marca=<?php echo $marca;?>&modelo=<?php echo $modelo;?>&ano=<?php echo $ano;?>&valor=<?php echo $valor;?>&tipo=<?php echo $tipo;?>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
       
      </article>
<?php require_once 'footer.php' ?>