<?php require_once 'header.php' ?>
<article class="col-md-12"> <!-- Sessão Conteudo -->
        <div class="wrapper">
            <form class="form-sign" method = "Post" action="registrar-usuario.php">       
                <h2 class="form-sign-heading mt-4">Registrar</h2>
                <div class="form-group">
                  <div class="input-group">
                    <div class="input-group-addon imge-sing">
                      <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <input type="text" class="form-control mb-3" name="nome" placeholder="Digite seu Nome" required autofocus/>
                  </div>
                  <div class="input-group">
                    <div class="input-group-addon imge-sing">
                      <i class="fa fa-envelope" aria-hidden="true"></i>
                    </div>
                    <input type="email" class="form-control mb-3" name="email" placeholder="Digite seu E-mail" required="" autofocus/>
                  </div>
                  <div class="input-group">
                    <div class="input-group-addon imge-sing">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                    <input type="password" class="form-control mb-3" name="password" id="password" placeholder="Digite uma Senha" required/>  
                  </div> 
                  <div class="input-group">
                    <div class="input-group-addon imge-sing">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                    <input type="password" class="form-control mb-3" name="password-confirm" id="confirm_password" placeholder="Digite Novamente a Senha" required/>  
                  </div>    
                <label class="checkbox">
                    <input type="checkbox" value="Terms" id="rememberMe" name="Terms" required> Aceito os <a href="" data-toggle="modal" data-target="#myModal">Termos de Uso</a>
                </label>
                <button class="btn btn-lg btn btn-dark btn-block" type="submit">Registrar</button> 
            </div>
          </form>
            <!-- The Modal -->
        <div class="modal" id="myModal">
          <div class="modal-dialog">
            <div class="modal-content">

              <!-- Modal Header -->
              <div class="modal-header">
                <h4 class="modal-title">Termos de Uso</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button >
              </div >

              <!-- Modal body -->
              <div class="modal-body">
                Selecione sua foto
              </div>

              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Aceito</button>
              </div>

            </div>
          </div>
        </div>
</article>
<?php require_once 'footer.php' ?>