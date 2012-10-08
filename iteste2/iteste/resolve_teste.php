<?
require_once('class/class.controller.php');
require_once "banco.con.php";
session_start();

if ($_SESSION['validacao'] == "1")
{
	$conexao = $banco->conecta();
	
	$questao = mysql_query("	SELECT DISTINCT *
								FROM tb_questao 
								ORDER BY rand();",$conexao);
	
		$lista 					=	 mysql_fetch_array($questao);
		$enunciado 				= 	($lista['tb_questao_enunciado']);
		$tb_questao_op_1		=	($lista['tb_questao_op_1']);
		$tb_questao_op_2		=	($lista['tb_questao_op_2']);
		$tb_questao_op_3		=	($lista['tb_questao_op_3']);
		$tb_questao_op_4		=	($lista['tb_questao_op_4']);
		$tb_questao_op_5		=	($lista['tb_questao_op_5']);
		$tb_questao_op_correta 	=	($lista['tb_questao_op_correta']);
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
		 	 <td><?php echo $controller->recuperarQtdeQuestaoTodosDAO(); ?><td>
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
		  	<td><?php echo $controller->recuperarQtdeDisciplinaTodosDAO(); ?></td>  
		  </tr>		  
		  </table>
        </div>
        
      </div>
      <div id="content">
         <div id="content_item">
         <h1>Resolvendo Teste </h1>
         <h2>Enunciado</h2>	
         <p><?php echo $enunciado; ?></p>
          <h2>Alternativas</h2>	       
	      <div id="options">
			<ul>
				<li id="op1"><input type='radio' name='botao' id='botao' value='1' /><?php echo $tb_questao_op_1;?></li>
				<li id="op2"><input type='radio' name='botao' id='botao' value='2'/><?php echo $tb_questao_op_2;?></li>
				<li id="op3"><input type='radio' name='botao' id='botao' value='3'/><?php echo $tb_questao_op_3;?></li>
				<li id="op4"><input type='radio' name='botao' id='botao'  value='4'/><?php echo $tb_questao_op_4;?></li>
				<li id="op5"><input type='radio' name='botao' id='botao' value='5' /><?php echo$tb_questao_op_5;?></li>
				<li id="resp"><input type='hidden' name='resp' id='resp' value='<?php echo $tb_questao_op_correta;?>'/> </li>
				</ul>
			</div>
		 <p>&nbsp;</p>
        <form>
        <p><div id="mensagem"></div>
        <p>
		<div id="ver"><a id="exibir" href="#">Resposta Correta</a></div>
        </p>
        </p>
        <div class="form_settings">   
              <input style= "margin-left: 80px;" class="submit" type="button" name="name" id="" value="Cancelar" onclick="location.href='<?php echo $_SESSION['user_url'];?>'" />
             <input onclick="location.href='resolve_teste.php'" style= "margin-left: 100px;"class="submit" type="button" name="questao-nova" id="questao-nova"  value="Nova Questão"  />
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
