<?php
require_once('class/class.controller.php');
require_once "banco.con.php";
session_start();

if ($_SESSION['validacao'] == "1" && $_SESSION['user_tipo'] == "1" || $_SESSION['user_tipo'] == "2" ||
							$_SESSION['user_tipo'] == "3" )
{
	
	$usuario_login = base64_decode($_GET['login']);
	$_SESSION['usuario_login'] = $usuario_login;
	$usuario = new Usuario();
	$usuario = $controller->recuperarUsuario($usuario_login);	
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Menu Alterar - editar Senha</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>

</head>

<body>
  <div id="main">
    <header>
      <div id="logo">
        <!-- class="logo_colour", allows you to change the colour of the text -->
        <h1><a href="<?php echo $_SESSION['user_url'];?>"><span class="logo_colour">i</span>Teste v 3.0</a></h1>
      <p><h3>Usuário: <?php echo $_SESSION['usuario_nome'];?> : <?php echo $_SESSION['user_tipo_nome'];?> - <a href="logout.php">Sair</a></h3> </p>
        
      </div>
      <nav>
        <ul class="sf-menu" id="nav">
          <li><a href="<?php echo $_SESSION['user_url'];?>">Inicio</a></li>
          
          <li><a href="#">Resolver Questões</a>
            <ul>
              <li><a href="resolve_teste.php">Resolver Teste</a>
              <li><a href="elabora_prova.php">Resolver Prova</a></li>
              </ul>
          </li>
                  
          </ul>
      </nav>
    </header>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <h1>O que você deseja fazer?</h1>
          <h2>Acesso rápido</h2>
           <a  href="resolve_teste.php">Realizar um novo Teste</a><br></br>
		  <a  href="elabora_prova.php">Realizar uma nova Prova</a><br></br>
        </div>
        <div class="sidebar">
          <h1>Números</h1>
          <h2>Cadastros</h2>
          <table>
          <tr>
		 	 <td>Questões:</td>
		 	 <td><?php echo $controller->recuperarQtdeQuestaoTodosDAO(); ?></td>
		  </tr>
		  <tr>
		  	<td>Áreas:</td>
		  	<td><?php echo $controller->recuperarQtdeAreaDAO(); ?></td>
		  </tr>
		  <tr>
		  	<td>Assuntos:</td>
		  	<td><?php echo $controller->recuperarQtdeAssuntoTodosDAO(); ?></td>
		  </tr>
		  <tr>
		  	<td>Disciplinas:</td>	
		  	<td> <?php echo $controller->recuperarQtdeDisciplinaTodosDAO(); ?></td>  
		  </tr>		  
		  </table>
        </div>
        
      </div>
      <div id="content">
        
        <div id="content_item">
         <h1>Editar dados da senha </h1>
          <form name="form1" action="action/alterar_senha.php" method="post" >
            <div class="form_settings">
             <p><h4>Olá, <?php echo $usuario->getNome()." ". $usuario->getSobreNome(); ?><h4></h4></p>
               <fieldset><legend>Dados de Acesso</legend><p></p>
                <p> <span>Senha Atual*:</span></p><p><input type="password" name="senha-atual" value="" /></p>
                <p> <span>Nova Senha*:</span></p><p><input type="password" name="senha-nova" value="" /></p>
                <p> <span>Confirmar Senha*:</span></p><p><input type="password" name="senha-confir" value="" /></p>
              </fieldset>
              <p>&nbsp;</p>
             <input style= "margin-left: 205px;" class="submit" type="button" name="name" value="Cancelar" onclick="location.href='<?php echo $_SESSION['user_url'];?>'" />
             <input style= "margin-left: 100px;"class="submit" type="submit" name="name" value="Atualizar"  />
            </div>
          </form>


        </div>
      </div>
    </div>
    <footer>
      <p><a href="<?php echo $_SESSION['user_url'];?>">Inicio</a> || <a href="logout.php">Sair</a></p>
      <p>Copyright &copy; CSS3_three | <a href="http://www.css3templates.co.uk">design from css3templates.co.uk</a></p>
    </footer>
    
  </div>
  
  <!-- javascript at the bottom for fast page loading -->
  
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script CHARSET="ISO-8859-1" type="text/javascript" src="js/cidades-estados-v0.2.js"></script> 
  <script charset="utf-8" type="text/javascript" language="JavaScript">
    window.onload = function() {
        new dgCidadesEstados( 
            document.getElementById('estado'), 
            document.getElementById('cidade'), 
            true
        );
    }
</script>
		<script language="javascript">
			function formatar(src, mask){
  			var i = src.value.length;
 			var saida = mask.substring(0,1);
 			var texto = mask.substring(i);
			if (texto.substring(0,1) != saida)
  			{
  				  src.value += texto.substring(0,1);
 			 }
			}
</script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>

<?php } else {
ini_set('default_charset','UTF-8');
?>

<script type="text/javascript">
alert("Você não está logado como Administrador");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
