<?php

include("conectaBD.php");
       
$usuario= $_POST["login"];
$senha= $_POST["senha"];

$busca= "select *from tb_usuarios where tb_user_login = '".$usuario."' and tb_user_senha ='".$senha."' LIMIT 1";
$sql=mysql_query($busca,$conexao) or die (mysql_erro());
$f = mysql_fetch_object($sql);

 if (mysql_num_rows($sql)==1){
$pnome = $f->tb_user_pnome;
$nivel = $f->tb_user_tipo;
$login = $f->tb_user_login;

 	if ($nivel == 1){
	$tipo = "ADMINISTRADOR";
	} 
		echo "<script>alert('Bem Vindo: <$pnome> : <$tipo> ');</script>";
        echo "<script>location.href = 'principal.html';</script>";
  }
		  
else{
 echo "<script>alert('2Não foi possível Logar: Login e/ou Senha inválido');</script>";
 echo "<script>location.href = 'index.php';</script>";
}

?>
