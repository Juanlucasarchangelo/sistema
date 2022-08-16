<?php

define('HOST', 'localhost'); // sem id de bd
define('USUARIO', 'juanarch_sistema');
define('SENHA', 'Click123@mkt');
define('DB', 'juanarch_sistema');

/*define('HOST', 'localhost'); // sem id de bd
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'sistema');*/

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die('Não foi possivel conectar!');

?>