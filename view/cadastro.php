<?php
require_once("../src/utils/AuthUtils.php");
require_once("../src/dao/UserDAO.php");

if(isset($_POST['insert'])){
  $userDAO = new UserDAO();
  
  $name            = $_POST['name'];
  $email           = $_POST['email'];
  $password        = $_POST['password'];
  $passwordConfirm = $_POST['passwordConfirm'];
  $phone           = $_POST['phone'];
  $msg = '';

  if($name == ''){
    $msg = "<br>Favor inserir nome! ";
  }
  if($email == ''){
    $msg = $msg . "<br>Favor inserir email ";
  }
  if($password <> $passwordConfirm){
    $msg = $msg . "<br>As senhas não são iguais ";
  }
  if($phone == ''){
    $msg = $msg . "<br>Favor inserir telefone! ";
  }
  if($msg != ''){
    $callError = $msg;
  }else{
    
    $userDAO->setUser($name);
    $userDAO->setEmail($email);
    $userDAO->setPassword($password); 
    $userDAO->setPhone($phone);

    if($userDAO->insert()){
      $callSuccess = "Cadastro efetuado com sucesso!";
    }
  }
  foreach($userDAO->findAll() as $key => $value ){
    echo $value->email;
  }
 
}
?>
<br>
<br>
<br>
<center><h3>Find My Pet - Cadastro</h3></center>
<br>
<br>
<div class="container">
  <form method="POST" name="insert">
      <div class="input-group">
          <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
          <input id="name" type="text" class="form-control" name="name" placeholder="Nome Completo">
        </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="text" class="form-control" name="email" placeholder="Email">
    </div>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
      <input id="password" type="password" class="form-control" name="password" placeholder="Senha">
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="passwordConfirm" type="password" class="form-control" name="passwordConfirm" placeholder="Confirmação da senha">
    </div>
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
        <input id="phone" type="text" class="form-control" name="phone" placeholder="(99) 9999-99999">
    </div>
    <br>
    <?php
      if(isset($callError)){
        ?>
        <div class="alert alert-danger" align="center">
          <strong>Atenção:</strong><?php echo $callError;?>
        </div>
      <?php  
      }
      if(isset($callSuccess)){
        ?>
        <div class="alert alert-success" align="center">
          <?php echo $callSuccess;?>
        </div>
      <?php    
      }
    ?>
    <div>
      <center><button type="submit" name = "insert" class="btn">Cadastrar</button></center>
    </div>
    </form>
</div>
</body>
</html>
