<?php session_start(); 
require 'verifica-login.php';
?>
<?php require_once 'header.php'?>

<article class="col-md-12"> <!-- Sessão Conteudo -->
        <div class="wrapper">
          <form class="form-sign" method = "Post" action="login-usuario.php">       
            <h2 class="form-sign-heading">Login</h2>
            <input type="email" class="form-control" name="email" placeholder="E-mail" required autofocus />
            <input type="password" class="form-control" name="password" placeholder="Senha" required/>      
            <label class="checkbox mt-3">
              <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Lembrar-me
            </label>
            <button class="btn btn-lg btn btn-dark btn-block" type="submit">Login</button> <div class="mt-2">
                <a href="senha-perdida.php" class="mr-4 col-md-8" >Esqueceu a Senha?</a>
                <a href="singup.php" class="col-md-6" >Registrar &rarr;</a>
              </div>
          </form>
        </div>
        
</article>

<?php require_once 'footer.php' ?>