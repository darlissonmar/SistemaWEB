<?
require_once('class/class.controller.php');
require_once "banco.con.php";
session_start();

if ($_SESSION['validacao'] == "1")
{
	$conexao = $banco->conecta();
		
	$area 		  =	$_SESSION['area'];	
	$disciplina   =	$_SESSION['disciplina'];	
	$assunto 	  =	$_SESSION['assunto'];
	$dificuldade  = $_SESSION['dificuldade'];
	$nro_questoes = $_SESSION['nro_questoes'];
	
		$maximo = 1;
 		$pagina = $_GET["pagina"];
		if($pagina == "") {
 		   $pagina = "1";
		}
 
		$inicio = $pagina - 1;
		$inicio = $maximo * $inicio;
 		$total = $nro_questoes;
  
		$questao = mysql_query("SELECT *
							FROM tb_questao 
							WHERE tb_area_id =".$area."
							AND tb_disciplina_id = ".$disciplina."
							AND tb_questao_dificuldade = ".$dificuldade."
							AND tb_disciplina_id IN ( SELECT tb_disciplina_id 
													FROM tb_assunto_and_tb_disciplina
													WHERE tb_assunto_id = ".$assunto.") LIMIT $inicio,$maximo;",$conexao);
		
		?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Resolve Questão - realiza Teste</title>
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
		  	<td> <?php echo $controller->recuperarQtdeAssuntoTodosDAO(); ?></td>
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
         <h1>Resolvendo Prova </h1>
         <h2>Questões</h2>	       
	      <div id="options">
			<ul>
				<?php 
						while($row = mysql_fetch_array($questao, MYSQL_ASSOC)){
						echo "<br>";
						echo "<h4>Questão ".($inicio + 1)." de ".$total."</h4>";
						echo "<li>".$row["tb_questao_enunciado"]."</li>";
						echo "<br>";
						echo "<li id= 'op1'"."'><input value='1' type='radio' name='botao' /> ".$row["tb_questao_op_1"]."</li>";
						echo "<li id= 'op2'"."'><input value='2' type='radio' name='botao' /> ".$row["tb_questao_op_2"]."</li>";
						echo "<li id= 'op3'"."'><input value='3' type='radio' name='botao' />".$row["tb_questao_op_3"]."</li>";
						echo "<li id= 'op4'"."'><input value='4' type='radio' name='botao' />".$row["tb_questao_op_4"]."</li>";
						echo "<li id= 'op5'"."'><input value='5' type='radio' name='botao' />".$row["tb_questao_op_5"]."</li>";
						echo "<li id='resp' ><input type='hidden' name='resp' id='resp' value='".$row["tb_questao_op_correta"]."'/> </li>";
						}
 		$menos = $pagina - 1;
		$mais = $pagina + 1;
		$pgs = ceil($total / $maximo);
		if($pgs > 1 ) {
			echo "<br />";
    		if($menos > 0) {
				echo "<a href=".$_SERVER['PHP_SELF']."?pagina=$menos>anterior</a>&nbsp; ";
   			 }
				for($i=1;$i <= $pgs;$i++) {
				if($i != $pagina) {
					echo " <a href=".$_SERVER['PHP_SELF']."?pagina=".($i).">$i</a> | ";
				} else {
					echo " <strong>".$i."</strong> | ";
				}
			}
			if($mais <= $pgs) {
				echo " <a href=".$_SERVER['PHP_SELF']."?pagina=$mais>próxima</a>";
	}
}
?>	
			</ul>
			</div>
		
        <form>
        <p><div id="mensagem"></div>
        <p>
		<div id="ver"><a id="exibir" href="#">Resposta Correta</a></div>
        </p>
        </p>
        <div class="form_settings">   
              <input style= "margin-left: 80px;" class="submit" type="button" name="name" id="" value="Sair" onclick="location.href='<?php echo $_SESSION['user_url'];?>'" />
             <input onclick="location.href='elabora_prova.php'" style= "margin-left: 100px;"class="submit" type="button" name="prova-nova" id="prova-nova"  value="Nova Prova"  />
             <input  style= "margin-left: 100px;"class="submit" type="button" name="botao-confirmar" id="botao-confirmar" value="Corrigir"  />
        		
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

			$(document).ready(function() {
			
				$('#botao-confirmar').click(function() 
				{    
				var valor = "";
				$('input:radio[name=botao]').each(function()
				{
				if ($(this).is(':checked'))
				{
				valor = parseInt($(this).val());
				}
				});
			
				corrige(valor,$('input:hidden[id=resp]').val());
				});
				$('a#exibir').click(function(){
				var correto = parseInt($('input:hidden[id=resp]').val());
				switch(correto){
					case 1:$("li[id=op1]").css('backgroundColor','#0c3').fadeOut(0).delay(100).fadeIn(600); break; 
					case 2:$("li[id=op2]").css('backgroundColor','#0c3').fadeOut(0).delay(100).fadeIn(600);break; 
					case 3:$("li[id=op3]").css('backgroundColor','#0c3').fadeOut(0).delay(100).fadeIn(600); break; 
					case 4:$("li[id=op4]").css('backgroundColor','#0c3').fadeOut(0).delay(100).fadeIn(600); break; 
					case 5:$("li[id=op5]").css('backgroundColor','#0c3').fadeOut(0).delay(100).fadeIn(600); break; 
				}
				//$('#body').slideDown(600).delay(600).slideDown(600);
      	   });
	});
			
	function corrige( valor,correto){
		$('#botao-confirmar').hide();
	
		if(valor == correto){
		$('#mensagem').text('Resposta Correta!');
		$('#mensagem').css('color', 'green');
		switch(valor){
				case 1:$("li[id=op1]").css('backgroundColor','#0c3').fadeOut(0).delay(100).fadeIn(600); break; 
				case 2:$("li[id=op2]").css('backgroundColor','#0c3').fadeOut(0).delay(100).fadeIn(600); break; 
				case 3:$("li[id=op3]").css('backgroundColor','#0c3').fadeOut(0).delay(100).fadeIn(600); break; 
				case 4:$("li[id=op4]").css('backgroundColor','#0c3').fadeOut(0).delay(100).fadeIn(600); break; 
				case 5:$("li[id=op5]").css('backgroundColor','#0c3').fadeOut(0).delay(100).fadeIn(600); break; 
				}
							
		return 0;
			}
						
		else{
		switch(valor){
				case 1:$("li[id=op1]").css('backgroundColor','#c00').fadeOut(0).delay(100).fadeIn(600); break; 
				case 2:$("li[id=op2]").css('backgroundColor','#c00').fadeOut(0).delay(100).fadeIn(600); break; 
				case 3:$("li[id=op3]").css('backgroundColor','#c00').fadeOut(0).delay(100).fadeIn(600); break; 
				case 4:$("li[id=op4]").css('backgroundColor','#c00').fadeOut(0).delay(100).fadeIn(600); break; 
				case 5:$("li[id=op5]").css('backgroundColor','#c00').fadeOut(0).delay(100).fadeIn(600); break;  
				}
		$('#mensagem').text('Resposta Incorreta!');
		$('#mensagem').css('color', 'red');
		$('#ver').css('visibility','visible');
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
alert("Você precisa estar logado para realizar o teste");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>