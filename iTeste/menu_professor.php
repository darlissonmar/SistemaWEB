<?

session_start();

if ($_SESSION['validacao'] == "1" && $_SESSION['user_tipo'] == "2")
{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Menu Principal - PROFESSOR</title>
<link rel="stylesheet" type="text/css" href="css/style_2.css">
</head>

<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />

<body background="images/fundo.jpg" >
<div id="tudo">
	<div id="topo">
		<div id="logo"></div>
		<div id="titulo">
  			<p>Sistema para Testes Online v 1.0</p>
		</div>
		<div id="dados-user">Olá,<?php echo "<b><font color='#17EC29'>". $_SESSION['usuario']."</font></b>";?> : <?php echo "<b><font color='#17EC29'>".  $_SESSION['user_tipo_nome']."</font></b>";?>, Seja bem vindo (<a href="logout.php">sair</a>)</div>
	</div>

	<div id="body">
  		<div id="menu-user" >
    		<ul id="MenuBar1" class="MenuBarHorizontal">
            <li><a class="MenuBarItemSubmenu" href="#">Cadastrar</a>
     			 <ul>
      				 <li><a  href="cadastra_questao.php">Questão</a></li>
  				     <li><a  href="cadastra_Disciplina.php">Disciplina</a></li>
        			 <li><a  href="cadastra_area.php">Área</a></li>
     				 <li><a  href="cadastra_assunto.php">Assunto</a></li>
            	</ul>
  	 		</li>
         <li><a href="#" class="MenuBarItemSubmenu">Resolver Questões </a>
     		<ul>
        		<li><a href="resolve_teste.php">Livres</a></li>
        		<li><a href="elabora_prova.php">Prova</a></li>    
      		</ul>
        </li>
	
  </ul>
	</div>
		<div id="info">Informações</div>
	</div>

	<div id="rodape"><p align="center">Desenvolvido por Darlisson Marinho e Iasmim Cunha</p></div>
	</div>
	<script type="text/javascript">
	var MenuBar1 = new Spry.Widget.MenuBar("MenuBar1", {imgDown:"SpryAssets/SpryMenuBarDownHover.gif", imgRight:"SpryAssets/SpryMenuBarRightHover.gif"});
	</script>
	</body>
</html>

<?php } else {

?>

<script type="text/javascript">
alert("Você não está logado como Professor");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
