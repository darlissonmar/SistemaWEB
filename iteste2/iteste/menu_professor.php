<?
require_once('class/class.controller.php');
require_once "banco.con.php";

session_start();

if ($_SESSION['validacao'] == "1" && $_SESSION['user_tipo'] == "2")
{
	$usuario_login = $_SESSION['usuario'];
	
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Menu Principal - Professor</title>
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
      <p><h3>Usuário: <?php echo $_SESSION['usuario_nome'];?> : <?php echo $_SESSION['user_tipo_nome'];?> - <a href="logout.php">Sair</a></h3></p>
        
      </div>
      <nav>
        <ul class="sf-menu" id="nav">
          <li><a href="<?php echo $_SESSION['user_url'];?>">Inicio</a></li>
          <li><a href="#">Cadastrar</a>
            <ul>
             <li><a href="cadastra_questao.php">Questão</a></li>
             <li><a href="cadastra_area.php">Área</a></li>
             <li><a href="cadastra_disciplina.php">Disciplina</a></li>
             <li><a href="cadastra_assunto.php">Assunto</a></li>
              </ul>
          </li>
          <li><a href="#">Resolver Questões</a>
            <ul>
              <li><a href="resolve_teste.php">Resolver Teste</a>
              <li><a href="elabora_prova.php">Resolver Prova</a></li>
              </ul>
          </li>
          <li><a href="#">Alterar Dados</a>
            <ul>
              <li><a href="altera_questao.php">Questão</a></li>
              <li><a href="altera_area.php">Área</a></li>
              <li><a href="altera_disciplina.php">Disciplina</a></li>
              <li><a href="altera_assunto.php">Assunto</a></li>
              
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
          <a  href="cadastra_questao.php">Cadastrar uma nova Questão</a><br></br>
		  <a  href="resolve_teste.php">Realizar um novo Teste</a><br></br>
		  <a  href="elabora_prova.php">Realizar uma nova Prova</a><br></br>
        </div>
        <div class="sidebar">
          <h1>Números</h1>
          <h2>Cadastros</h2>
          <table>
          <tr>
          	<td>Alunos: </td> 
          	<td><?php echo $controller->recuperarQtdeTipoUsuarioDAO('3'); ?></td>
		  </tr>
		   <tr>
		 	 <td>Questões:</td>
		 	 <td><a href="lista_questao.php"> <?php echo $controller->recuperarQtdeQuestaoTodosDAO(); ?></a></td>
		  </tr>
		  <tr>
		  	<td>Áreas:</td>
		  	<td><a href="lista_area.php'"> <?php echo $controller->recuperarQtdeAreaDAO(); ?></a></td>
		  </tr>
		  <tr>
		  	<td>Assuntos:</td>
		  	<td><a href="lista_assunto.php"> <?php echo $controller->recuperarQtdeAssuntoTodosDAO(); ?></a></td>
		  </tr>
		  <tr>
		  	<td>Disciplinas:</td>	
		  	<td><a href="lista_disciplina.php"> <?php echo $controller->recuperarQtdeDisciplinaTodosDAO(); ?></a></td>  
		  </tr>		  
		  </table>
        </div>
        
      </div>
      <div id="content">
        
        <div id="content_item">
          <h1>Olá,<?php printf("%s",$_SESSION['usuario_nome']);?> , Bem vindo ao iTeste 3.0 - Sistema para testes Online </h1>
          <p>Você como Professor:</p>
          <p>Pode cadastrar Questão, Área, Disciplina e Assunto no menu <strong>Cadastrar </strong></p>
          <p>Pode também, Editar ou Remover Questão, Área, Disciplina e Assunto no menu <strong>Alterar Dados</strong></p>
         <p>Além disso, você pode Resolver um teste ou uma prova no Menu <strong>Resolver Questão</strong></p>
          <p>Para alterar seus dados clique aqui <a href="editar_usuario.php?login=<?php echo base64_encode($usuario_login)?>">meus dados</a></p>
        <p>Para alterar sua senha clique aqui <a href="editar_senha.php?login=<?php echo base64_encode($usuario_login)?>">minha senha</a></p>
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
alert("Você não está logado como Professor");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
