<?
ob_start();

session_start();
unset($_SESSION[usuario]);
unset($_SESSION[usuario_nome]);
unset($_SESSION[validacao]);
unset($_SESSION['user_tipo']);
unset($_SESSION['id_usuario']);
unset($_SESSION['user_tipo_nome']);
unset($_SESSION['user_url']);
session_destroy();

Header("Location: login.php");
?> 