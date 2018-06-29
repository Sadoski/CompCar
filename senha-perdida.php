<?php require_once 'header.php' ?>

<form class="form-group mt-5 mb-5" name="form1" method="post" action="gerar-nova-senha.php">
<div class="container wrapper">
Por favor digite o seu email para redefinir a senha;<br /><br />

<div class="form-row">
    <div class="col-12 col-md-9 mb-2 mb-md-0">
        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="E-mail" required autofocus>
    </div>
    <div class="col-12 col-md-3">
        <button type="submit" name="Submit" class="btn btn-block btn-lg btn-primary">Recuperar</button>
    </div>
</div>
</div>
</form>

<?php require_once 'footer.php' ?>
