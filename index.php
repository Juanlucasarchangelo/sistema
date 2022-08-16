<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sistema</title>
    <link rel="stylesheet" href="view/estilo/style.css">
    <link rel="shortcut icon" href="view/img/Logo site preto.png">
  </head>
  <body>

  <?php

if(isset($_SESSION['nao_autenticado'])):

?>

<div class="notification">
  <p>ERRO: Usuário ou senha inválidos.</p>
</div>

<?php

endif;
unset($_SESSION['nao_autenticado']);

?>

<form class="box" action="controller/login.php" method="post">
<img src="view/img/Logo site preto.png" alt="foto de perfil do usúario" width="120px" height="120px">
  <input type="text" name="usuario" placeholder="Usuario">
  <input type="password" name="senha" placeholder="Senha">
  <input type="submit" name="Enviar" value="Login">
  <p><a href="http://localhost/Sistema/view/cadastro.php">Realizar cadastro</a></p>
</form>

  </body>
</html>
