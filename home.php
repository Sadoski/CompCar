<?php
require 'config/banco.php';
require 'anuncios.php';
$anuncio = new Anuncios(); ?>
<article class="masthead text-white text-center">
    <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Um dos maiores site de publicação e venda de seu veiculo novos ou seminovos!</h1>
          </div>
          <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
            <form  class="form-group" method = "Post" enctype="multipart/form-data" action="pesquisa.php" >
              <div class="form-row">
               <center><div class="form-group" >
                    <select class="mb-3" onChange="" name="marca" style="width:180px">
                        <option value=""></option>
                        <?php
                        
                        
                        $lista = $anuncio->pesquisarMarca();
                        if (count($lista) > 0){
                        foreach ($lista as $linha): 
                         {?>
                            <option value="<?php echo $linha['marca'] ?>"><?php echo $linha['marca'] ?></option>
                        <?php } endforeach; }?>
                    </select> 
                    <select class="mb-3" onChange="" name="modelo" style="width:180px">
                        <option  value=""></option>
                        <?php
                        
                        $lista = $anuncio->pesquisarModelo();
                        if (count($lista) > 0){
                        foreach ($lista as $linha): ?>
                            <option  value="<?php echo $linha['modelo'] ?>"><?php echo $linha['modelo'] ?></option>
                        <?php endforeach; }?>
                    </select> 
                    <select  class="mb-3" onChange="" name="ano" style="width:180px">
                        <option  value=""></option>
                        <?php
                        
                        $lista = $anuncio->pesquisarAno();
                        if (count($lista) > 0){
                        foreach ($lista as $linha): ?>
                            <option value="<?php echo $linha['ano'] ?>"><?php echo $linha['ano'] ?></option>
                        <?php endforeach; }?>
                    </select>
                    <select class="mb-3" onChange="" name="preco" style="width:180px">
                        <option  value=""></option>
                        <option  value="0 até 5.000">0 até 5.000</option>
                        <option  value="10.000 até 30.000">10.000 até 30.000</option>
                        <option  value="30.000 até 50.000">30.000 até 50.000</option>
                        <option  value="50.000 até 70.000">50.000 até 70.000</option>
                        <option  value="70.000 até 80.000">70.000 até 80.000</option>
                        <option  value="80.000 até 100.000">80.000 até 100.000</option>
                        <option  value="100.000 até 130.000">100.000 até 130.000</option>
                        <option  value="130.000 até 150.000">130.000 até 150.000</option>
                        <option  value="">150.000...</option>
                    </select>
                    <select class="mb-3" onChange="" name="tipo" style="width:180px">
                        <option  value=""></option>
                        <?php
                        
                        $lista = $anuncio->pesquisarTipo();
                        if (count($lista) > 0){
                        foreach ($lista as $linha): ?>
                            <option  value="<?php echo $linha['tipo'] ?>"><?php echo $linha['tipo'] ?></option>
                        <?php endforeach; }?>
                    </select>
                <div class="col-12 col-md-3">
                  <button type="submit" class="btn btn-block btn-lg btn-primary">Pesquisar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
</article>

