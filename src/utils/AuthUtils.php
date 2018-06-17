<?php
  session_start();
  //unset($_SESSION["logado"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Find My Pet</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.html">Find My Pet</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="../index.php">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Gerenciar Animais <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="CadastroAnimal.html">Incluir Animal</a></li>
          <li><a href="CodigoRastreador.html">Codigo Rastreador</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="#">Page 2</a></li>
    </ul>
    <?php
      if(!isset($_SESSION["logado"])){
    ?>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../view/cadastro.php"><span class="glyphicon glyphicon-user"></span> Cadastrar</a></li>
      <li><a href="../view/Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    <?php
      }
      if(isset($_SESSION["logado"])){
        ?>
        <ul class="nav navbar-nav navbar-right">
        <li><a href="" name="deslogar" onClick="<?php unset($_SESSION["logado"]);header('Refresh: 1;');?>" </span> Deslogar </a></li>  
        </ul>
        <?php
      }
    ?>
  </div>
</nav>
