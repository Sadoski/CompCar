
<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Titulo Aba pagina -->
    <title>CompCar</title>

    <!-- Requesito meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta HTTP-EQUIV='refresh'>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Links CSS -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
  </head>
<body>
    <header class="bg-dark text-white">
        <nav class="navbar navbar-expand-lg navbar-dark indigo"> <!-- Sessão Menu -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav" aria-controls="basicExampleNav"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container">
                <?php

                if(!isset($_SESSION["login"])){
                  require_once 'menu-home.php';
                }else{
                  require_once 'menu-session.php';
                }
                ?>
            </div>
        </nav> 
    </header>
<main>