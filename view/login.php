<?php
  require_once("../src/utils/AuthUtils.php");
  require_once("../src/dao/UserDAO.php");
  if(isset($_POST['login'])){
    $userDAO = new UserDAO();

    $email    = $_POST['email'];
    $password = $_POST['password'];

    $logou = 1;

    foreach($userDAO->findAll() as $key => $value):
      //echo $value['email']."  ". $value['password']."<br>";
      if($value['email'] == $email && $value['password'] == $password){
        $msgSuccess = "Logado com sucesso!";
        $_SESSION["logado"] = true;
        header('Refresh: 1;');
      }
    endforeach;
    if($_SESSION["logado"] <> true){
      $msgError = "Usuário ou senha incorretos!";
      //unset($_SESSION["logado"]);
    }
  }
?>
<br>
<br>
<br>
<center><h3>Find My Pet - Login</h3></center>
<br>
<br>
<div class="container">
  <form method="POST">
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="password" placeholder="Senha">
    </div>
    <br>
    <?php
    
    if(isset($msgError)){
      ?>
        <div class="alert alert-danger" align="center">
          <strong>Atenção: </strong><?php echo $msgError;?>
        </div>
      <?php
    }
    if(isset($msgSuccess)){
      ?>
        <div class="alert alert-success" align="center">
          <?php echo $msgSuccess;?>
        </div>
      <?php 
    }
    
    ?>
    <div>
      <center><button type="submit" name="login" class="btn">Logar</button></center>
    </div>
    </form>
</div>


</body>
</html>
