<?

session_start();

if ($_SESSION['validacao'] == "1")
{
?>
<?php

include("conectaBD.php");	
				$questao = mysql_query("	SELECT DISTINCT *
											FROM tb_questao 
											ORDER BY rand();",$conexao);
	?>
		
	<?php
		$lista=mysql_fetch_array($questao);
		$enunciado= nl2br($lista['tb_questao_enunciado']);
		$tb_questao_op_1=($lista['tb_questao_op_1']);
		$tb_questao_op_2=($lista['tb_questao_op_2']);
		$tb_questao_op_3=($lista['tb_questao_op_3']);
		$tb_questao_op_4=($lista['tb_questao_op_4']);
		$tb_questao_op_5=($lista['tb_questao_op_5']);
		$tb_questao_op_correta =($lista['tb_questao_op_correta']);
	?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resolve Teste</title>
<link rel="stylesheet" type="text/css" href="css/style_2.css">
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script type="text/javascript">

$(document).ready(function() {
			
				$('#tes-btn-confirmar').click(function() 
				{    
					//$("#teste-op1").css('backgroundColor','#c00'); 
					
					var valor = "";
					
					$('input:radio[name=botao]').each(function()
					{
						if ($(this).is(':checked'))
						{
							valor = parseInt($(this).val());
					}})
					corrige(valor,$('#resp').val());
				})
				$('a#exibir').click(function(){
				var correto = parseInt($('#resp').val());
				switch(correto){
							case 1:$("#teste-op1").css('backgroundColor','#0c3'); break; 
							case 2:$("#teste-op2").css('backgroundColor','#0c3');break; 
							case 3:$("#teste-op3").css('backgroundColor','#0c3'); break; 
							case 4:$("#teste-op4").css('backgroundColor','#0c3'); break; 
							case 5: $("#teste-op5").css('backgroundColor','#0c3'); break; 
				}
				//$('#body').slideUp(600).delay(600).slideDown(600);
      	   })
			
		
			
			})
			
	function corrige( valor,correto){
		if(valor == correto){
		
		$('#mensagem').text('Resposta Correta!');
		$('#mensagem').css('color', 'green');
		switch(valor){
							case 1:$("#teste-op1").css('backgroundColor','#0c3'); break; 
							case 2:$("#teste-op2").css('backgroundColor','#0c3');break; 
							case 3:$("#teste-op3").css('backgroundColor','#0c3'); break; 
							case 4:$("#teste-op4").css('backgroundColor','#0c3'); break; 
							case 5: $("#teste-op5").css('backgroundColor','#0c3'); break; 
							}
							
		return 0;
			}
						
		else{
		
		switch(valor){
							case 1:$("#teste-op1").css('backgroundColor','#c00'); break; 
							case 2:$("#teste-op2").css('backgroundColor','#c00');break; 
							case 3:$("#teste-op3").css('backgroundColor','#c00');break; 
							case 4:$("#teste-op4").css('backgroundColor','#c00'); break; 
							case 5: $("#teste-op5").css('backgroundColor','#c00');break; 
							}
		$('#mensagem').text('Resposta Incorreta!');
		$('#mensagem').css('color', 'red');
		$('#ver').css('visibility','visible');
			}
		}

			
			
			
</script>

<style type="text/css">
#mensagem {
	position:absolute;
	left:282px;
	top:366px;
	width:286px;
	height:27px;
	z-index:1;
	font-weight: bold;
}
#ver {
	position:absolute;
	left:604px;
	top:370px;
	width:132px;
	height:21px;
	color: #09F;
	text-align: center;
	visibility: hidden;
}
</style>
</head>

<body background="images/fundo.jpg" >
<div id="tudo">
		<div id="topo">
			<div id="logo"></div>
			<div id="titulo">
			<p>Sistema para Testes Online v 2.0</p>
			</div>
		<div id="dados-user">Olá, <?php echo "<b><font color='#17EC29'>". $_SESSION['usuario']."</font></b>";?> : <?php echo "<b><font color='#17EC29'>".  $_SESSION['user_tipo_nome']."</font></b>";?>, Seja bem vindo(<a href="logout.php">sair</a>)</div>
		</div>
		
	<div id="body">
<div id="link-home"><a href="<?php echo $_SESSION['user_url'];?>">Menu Principal</a></div>
				<div id="menu" >
					<div class="texto_p" id="texto">Resolver Teste</div>
				</div>
			<div id="info">
			  <form id="form1" name="form1" method="post" >
					<div id="teste-enun" ><?php echo $enunciado; ?></div>
					<div id="teste-op1" ><input type='radio' name='botao' id='botao' value='1' /> 
					<?php echo $tb_questao_op_1;?></div>
				  <div id="teste-op2"  ><input type='radio' name='botao' id='botao' value='2'/> 
				  <?php echo $tb_questao_op_2;?></div>
				  <div id="teste-op3" ><input type='radio' name='botao' id='botao' value='3'/> 
				    <?php echo $tb_questao_op_3;?></div>
          <div id="teste-op4"><input type='radio' name='botao' id='botao'  value='4'/> 
            <?php echo $tb_questao_op_4;?></div>
		      <div id="teste-op5"><input type='radio' name='botao'  id='botao' value='5' /> 
		        <?php echo$tb_questao_op_5;?></div>							
<input type='hidden' name='resp' id='resp' value='<?php echo $tb_questao_op_correta;?>'/>
					<div id="teste-nova-questao"><input type="button" name="tes-btn-confirmar" id="tes-btn-confirmar"value="Corrigir" style="height: 28px; width:120px"/>
				  </div>
				<div id="teste-nova"><input type="button" onclick="location.href='resolve_teste.php'"name="tes-btn-nova-questao" id="tes-btn-nova"value="Nova Questão" style="height: 28px; width:120px"/>
			    </div>
					<div id="teste-cancela">
						<input type="button" onclick="location.href='<?php echo $_SESSION['user_url'];?>'" name="teses-btn-cancelar" id="teses-btn-cancelar" value="Sair" style="height: 28px; width: 120px" />
</div>
								
              </form>
				<div id="mensagem"></div>
                <div id="ver"><a id="exibir" href="#">Ver a Resposta Correta</a></div>				
			</div>
  </div>
	
			<div id="rodape">
			  <p align="center">Desenvolvido por Darlisson Marinho e Iasmim Cunha</p>
			</div>
		</div>
    


</body>
</html>

<?php } else {

?>

<script type="text/javascript">
alert("Você precisa estar logado para realizar o teste");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
