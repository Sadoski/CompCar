<?php session_start(); ?>
<?php require_once 'header.php' ?>
 <article class=" col-md-10 mr-0">
     <div class="container wrapper">
         <form class="form-horizontal" id="pagina-contato" method = "Post" action="envio-contato.php">
            <fieldset>
              <h1>Contato</h1>

              <div class="form-group mt-5">
                <label class="col-md-4 control-label" for="nome">Nome</label>  
                <div class="col-md-8">
                    <input  name="nome" id="nome" placeholder="Digite seu nome completo" class="form-control input-md"  required autofocus  type="text">
                </div>
              </div>

              <div class="form-group ">
                <label class="col-md-4 control-label" for="email">Email</label>  
                <div class="col-md-8">
                    <input  name="email" id="email" placeholder="Digite corretamente seu email" class="form-control input-md" required type="email">
                </div>
              </div>

              <!-- Text input-->
              <div class="form-group">
                <label class="col-md-4 control-label" for="assunto">Assunto</label>  
                <div class="col-md-8">
                  <input id="assunto" name="assunto" placeholder="Digite o assunto" class="form-control input-md" required type="text">
                </div>
              </div>

              <div class="form-group">
                <label class="col-md-4 control-label" for="mensagem">Mensagem</label>
                <div class="col-md-8">                     
                  <textarea class="form-control" id="mensagem" name="mensagem" required placeholder="Digite sua mensagem"></textarea>
                </div>
              </div>

              <!-- Button -->
              <div class="form-group mb-5">
                <label class="col-md-4 control-label" for="singlebutton"></label>
                <div class="col-md-4">
                  <button id="singlebutton" name="singlebutton" class="btn btn-dark">Enviar</button>
                </div>
              </div>

            </fieldset>
          </form>
     </div>
        </article>
<?php require_once 'footer.php' ?>