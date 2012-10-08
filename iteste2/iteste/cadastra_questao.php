<?
require_once('class/class.controller.php');
require_once "banco.con.php";
session_start();

if ($_SESSION['validacao'] == "1" && ($_SESSION['user_tipo'] == "1" || $_SESSION['user_tipo'] == "2" ))
{
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Menu Cadastrar - nova Questão</title>
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
          <a  href="cadastra_questao.php">Cadastrar uma nova Questão</a><br></br>
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
		  	<td> <?php echo $controller->recuperarQtdeAreaDAO(); ?></td>
		  </tr>
		  <tr>
		  	<td>Assuntos:</td>
		  	<td> <?php echo $controller->recuperarQtdeAssuntoTodosDAO(); ?></td>
		  </tr>
		  <tr>
		  	<td>Disciplinas:</td>	
		  	<td><?php echo $controller->recuperarQtdeDisciplinaTodosDAO(); ?></td>  
		  </tr>		  
		  </table>
        </div>
        
      </div>
      <div id="content">
        
        <div id="content_item">
         <h1>Cadastro de nova questão</h1>
          <form name="form1" action="action/action_questao.php" method="post" >
            <div class="form_settings">
              <fieldset><legend>Dados da questão </legend><p></p><p></p>
              <p><span>Selecione a área*:</span><select name="id_area" id="id_area" >
              	<?php
              	echo "<option value='0'> Selecione uma área</option>"; 
              	$conexao = $banco->conecta();
				$areas = $controller->recuperarAreaTodosDAO();
              	if(count(areas)> 0 ){
				for ($i = 0; $i < count($areas); $i++){
              		$tb_area_nome = $areas[$i]->getNome();
					$tb_area_id = $areas[$i]->getId();
					echo "<option value='".$tb_area_id."'>$tb_area_nome</option>";
	           	}
              }else{
              	echo "<option value='0'> Nenhuma área cadastrada</option>";
              	}        
			?>
			             	
              	</select>
              </p>
               <p><span>Selecione a Disciplina*:</span><select name="id_disciplina" id="id_disciplina" >
              	
              	</select>
              </p>
               <p><span>Selecione o Assunto *:</span><select name="id_assunto" id="id_assunto">
              	
				</select>
              </p>
                  
               <p><span>Enuciado*:</span><textarea rows="6" cols="50" name="enunciado"></textarea></p>
               <p><span>Alternativa 1*:</span><textarea rows="4" cols="50" name="opcao1"></textarea></p>
               <p><span>Alternativa 2*:</span><textarea rows="4" cols="50" name="opcao2"></textarea></p>
               <p><span>Alternativa 3*:</span><textarea rows="4" cols="50" name="opcao3"></textarea></p>
               <p><span>Alternativa 4*:</span><textarea rows="4" cols="50" name="opcao4"></textarea></p>
               <p><span>Alternativa 5*:</span><textarea rows="4" cols="50" name="opcao5"></textarea></p>
               
                <p><span>Alternativa Correta *: </span>
                <select id="id" name="alternativa-correta">
                	<option value="">Alternativa Correta</option>
                	<option value="1">Alternativa 1</option>
					<option value="2">Alternativa 2</option>
					<option value="3">Alternativa 3</option>
					<option value="4">Alternativa 4</option>
					<option value="5">Alternativa 5</option>
                </select></p>
                
               							
				<p><span>Dificuldade da Questão*: </span>
                <select id="id" name="dificuldade">
                <option value="">Dificuldade da Questão</option>
				<option value="1">Muito Fácil</option>
				<option value="2">Fácil </option>
				<option value="3">Normal</option>
				<option value="4">Difícil</option>
				<option value="5">Muito Díficil</option>
                </select></p>          
               </fieldset>         
                        
              <p>&nbsp;</p>
             <input style= "margin-left: 205px;" class="submit" type="button" name="name" value="Cancelar" onclick="location.href='<?php echo $_SESSION['user_url'];?>'" />
             <input style= "margin-left: 100px;"class="submit" type="submit" name="name" value="Cadastrar"  />
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

<script type="text/javascript">

$(document).ready(
function(){
	
	$('#id_disciplina').change(function() {
		 if($(this).val() == 0) {
		      alert('Você precisa informar uma disciplina !');
		      $(this).focus();
		    } else {
		    $('#id_assunto').load('busca_assunto.php?id_disciplina='+ $('#id_disciplina').val());
		    }
		  });

	$('#id_area').change(function() {
	 if($(this).val() == 0) {
	      alert('Você precisa informar uma área!');
	      $(this).focus();
	    } else {
	    $('#id_disciplina').load('busca_disciplina.php?id_area='+ $('#id_area').val());
	    $('#id_assunto').html('<option value="">Selecione uma Disciplina</option>');
	    }
	  });
});


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
alert("Você não possui permisão para essa operação!");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
