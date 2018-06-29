<?php session_start(); 
require 'verifica.php'; ?>
<?php require_once 'header.php' ?>
<article>
<form method = "Post" action="config.php">
    <?php
    require 'Usuarios.php';
    require 'config/banco.php';
    $usuario = new Usuarios();
    $id = $_SESSION['id_usuario'];
    $lista = $usuario->user($id);
    
    ?>
     <div class="container wrapper">
        <h1>Configurações de Usuario</h1>
        <form class="form-group" method = "Post"  action="config.php" >
            
            <div class="form-group mt-5">
                <label class="col-md-4 control-label" for="nome">Nome</label>  
                <div class="col-md-8">
                    <input  name="nome" id="nome" placeholder="Nome" class="form-control input-md"  required autofocus type="text" value = "<?php echo $usuario->nome?>">
                </div>
            </div>
            
            <div class="form-group mb-4">
                <label class="col-md-4 control-label" for="email">E-mail</label>  
                <div class="col-md-8">
                    <input  name="email" id="email" placeholder="E-mail" class="form-control input-md" required  type = "text" value = "<?php echo $usuario->email?>"  disabled>
                </div>
            </div>
            <div class="form-group border border-secondary mt-sm-5 col-lg-8 col-md-4">
                <label class="col-md-4 control-label " >Redefina a Senha</label>
                <div class="container ">
                
                <div class="form-group ">

                    <label class="col-md-4 control-label" for="senhaAtual">Senha Atual</label>
                    <div class="col-md-8">
                    <input  name="senhaAtual" id="senhaAtual" placeholder="Digite a Senha Atual" class="form-control" type="password">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-md-4 control-label" for="password">Nova Senha</label>  
                    <div class="col-md-8">
                        <input  name="password" id="password" placeholder="Digite a nova senha" class="form-control" type="password">
                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-md-4 control-label" for="password-confirm">Repetir Senha</label>  
                    <div class="col-md-8">
                        <input  name="password-confirm" id="confirm_password" placeholder="Digite novamente a senha" class="form-control" type="password">
                    </div>
                </div>
                    </div>
            </div>
            
            
            <div class="form-group mb-5">
                <label class="col-md-4 control-label" for="submit"></label>
                <div class="col-md-4">
                  <button id="submit"  name="Submit" class="btn btn-dark">Atualizar</button>
                </div>
              </div>
            
        </form>
    </div>
    </form>
</article>
<?php require_once 'footer.php' ?>