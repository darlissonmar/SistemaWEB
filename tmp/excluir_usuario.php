	<?php
 session_start();
	include("conectaBD.php");
		$deleta = mysql_query
		          ("DELETE FROM 
		           tb_usuarios WHERE 
		           tb_user_login = '".$_SESSION['login']."'") or die (mysql_error());
		          
		           $_SESSION['login']=NULL;
        echo "<script>alert('Operação realizada com Sucesso!');</script>";
        echo "<script>location.href ='".$_SESSION['user_url']."';</script>";
 ?>
