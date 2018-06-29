<?php session_start(); 
require 'verifica.php'; ?>
<?php require_once 'header.php' ?>
<article>
    <div class="container wrapper">
        <h1>Edição de Anúncio</h1>
        <form class="form-group" method = "Post" enctype="multipart/form-data" action="edit-anuncio.php" >
            <?php
            require 'anuncios.php';
            require 'config/banco.php';
            $anuncio = new Anuncios();
            $id = $_GET['id'];
            $lista = $anuncio->ediAnuncios($id);

            ?>                 
                <div class="col-md-8">
                    <input  name="id" id="id" placeholder="Id" class="form-control input-md"  required type="hidden" value = "<?php echo $anuncio->id?>">
                </div>
            
            <div class="form-group mt-5">
                <label class="col-md-4 control-label" for="imagem">Imagem</label>  
                <div class="col-md-8">
                    <input  name="imagem" id="imagem" accept="image/jpeg, image/png, image/gif" value='Selecione a Imagem' class="file-chooser input-md"  type="file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                    <img class="border border-dark" id="blah" width="100" height="100" src="<?php echo $anuncio->img?>"/>

                </div>
            </div>
            
            <div class="form-group mt-5">
                <label class="col-md-4 control-label" for="marca">Marca</label>  
                <div class="col-md-8">
                    <input  name="marca" id="marca" placeholder="Digite a marca" class="form-control input-md"  required autofocus  type="text" value = "<?php echo $anuncio->marca?>">
                </div>
            </div>
            
            <div class="form-group ">
                <label class="col-md-4 control-label" for="modelo">Modelo</label>  
                <div class="col-md-8">
                    <input  name="modelo" id="modelo" placeholder="Digite o modelo" class="form-control input-md" required type="text" value = "<?php echo $anuncio->modelo?>">
                </div>
            </div>
            
            <div class="form-group ">
                <label class="col-md-4 control-label" for="combustivel">Combustivel</label>  
                <div class="col-md-8">
                    <input  name="combustivel" id="combustivel" placeholder="Digite o combustivel" class="form-control input-md" required type="text" value = "<?php echo $anuncio->combustivel?>">
                </div>
            </div>
            
            <div class="form-group ">
                <label class="col-md-4 control-label" for="cor">Cor</label>  
                <div class="col-md-8">
                    <input  name="cor" id="cor" placeholder="Digite o cor" class="form-control input-md" required type="text" value = "<?php echo $anuncio->cor?>">
                </div>
            </div>
            
            <div class="form-group ">
                <label class="col-md-4 control-label" for="tipo">Tipo</label>  
                <div class="col-md-8">
                    <input  name="tipo" id="tipo" placeholder="Digite o tipo" class="form-control input-md" required type="text" value = "<?php echo $anuncio->tipo?>">
                </div>
            </div>
            
            <div class="form-group ">
                <label class="col-md-4 control-label" for="km">KM</label>  
                <div class="col-md-3">
                    <input  name="km" id="km" placeholder="Digite o KM" class="form-control input-md" required type="number" value = "<?php echo $anuncio->km?>">
                </div>
            </div>
            
            <div class="form-group ">
                <label class="col-md-4 control-label" for="ano">Ano</label>  
                <div class="col-md-2">
                    <input  name="ano" id="cor" placeholder="Digite o ano" class="form-control input-md" required type="number" value = "<?php echo $anuncio->ano?>" >
                </div>
            </div>
            
            <div class="form-group ">
                <label class="col-md-4 control-label" for="valor">Valor</label>  
                <div class="col-md-2">
                    <input  name="valor" id="valor" class="form-control money" required type="text" value = "<?php $source = array('.', '.'); $replace = array('.', ','); $valor = str_replace($source, $replace, $anuncio->valor); echo $valor?>">
                    
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-md-4 control-label" for="adicionais">Adicionais</label>
                <div class="col-md-8">                     
                  <textarea class="form-control" id="adicionais" name="adicionais" required placeholder="Digite itens adicionais"><?php echo $anuncio->adicionais?></textarea>
                </div>
            </div>
            
            <div class="form-group mb-5">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                  <button id="submit"  name="Submit" class="btn btn-dark">Editar</button>
                </div>
              </div>
            
        </form>
    </div>
</article>

<?php require_once 'footer.php' ?>