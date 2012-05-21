<?

session_start();

if ($_SESSION['validacao'] == "1" && ($_SESSION['user_tipo'] == "1" || $_SESSION['user_tipo'] == "2" ))
{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastrar Nova Questão</title>
<link rel="stylesheet" type="text/css" href="css/style_2.css">
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(
		function(){
            $('#ques-area').change(
			function(){
			$('#ques-disci').load('busca_disciplina.php?id_area='+$('#ques-area').val() );
			 $('#ques-assunto').html('<option value="">Selecione uma Disciplina</option>');
			});
			
			$('#ques-disci').change(
			function(){
                $('#ques-assunto').load('busca_assunto.php?id_disciplina='+$('#ques-disci').val() );

            });
	
        });

    </script>


</head>

<body background="images/fundo.jpg" >
		<div id="tudo">
			<div id="topo">
				<div id="logo"></div>
				<div id="titulo"><p>Sistema para Testes Online v 1.0</p></div>
		<div id="dados-user">Olá, <?php echo "<b><font color='#17EC29'>". $_SESSION['usuario']."</font></b>";?> : <?php echo "<b><font color='#17EC29'>".  $_SESSION['user_tipo_nome']."</font></b>";?>, Seja bem vindo(<a href="logout.php">sair</a>)</div>
			</div>
		<div id="body">
				<div id="link-home"><a href="<?php echo $_SESSION['user_url'];?>">Menu Principal</a></div>
				<div id="menu" >
					<div class="texto_p" id="texto">Cadastrar Nova Questão</div>
				</div>
				
				<div id="info">
						<form id="form1" name="form1" method="post" action="action-questao.php">
							<fieldset>
								<legend>Dados da Questão</legend>
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								<p>Enunciado*:</p>
								<p>&nbsp;</p>
								<p>&nbsp;</p>
								<p>Alternativa 1*:</p>
								<p>Alternativa 2*:</p>
								<p>Alternativa 3*:</p>
								<p>Alternativa 4*:</p>
								<p>Alternativa 5*:</p>
								<p>&nbsp;</p>
								
							
								<div id="cad-questao-area">Área:
									 <select name="ques-area" size="1" id="ques-area">
									 <option value='-1'>Selecione uma Área</option>
                                     <?	include("conectaBD.php");
									  $area = mysql_query("SELECT * FROM tb_area",$conexao);
									
									 if (mysql_num_rows($area)>0){
									 
									 while($area_row=mysql_fetch_array($area)){
									 $tb_area_nome=nl2br($area_row['tb_area_nome']);
									 $tb_area_id=$area_row['tb_area_id'];
									 echo "<option value='".$tb_area_id."'>$tb_area_nome</option>";
									 }									 
									 }else{
									 echo "<option value=''>Nenhuma Area Cadastrada</option>";
									 } ?>
									 <option></option>
									</select>
								</div>
							
								<div id="cad-questao-disciplina">Disciplina:
<select name="ques-disci" size="1" id="ques-disci">
										<option value='-1'>Selecione a Disciplina</option>
										 <option></option>
								  </select>
						    </div>
							
								<div id="cad-questao-assunto">Assunto:
									<select name="ques-assunto" id="ques-assunto">
										<option value '-1'>Selecione o Assunto</option>
										 <option></option>
									</select>
								</div>
							
								<div id="cad-questao-enun">
<p>
										<textarea name="cad-ques-enun" cols="60" rows="3" id="ques-enun"></textarea>
									</p>
								</div>
							
								<div id="cad-questao-op1">
									<input name="ques-op1" type="text" id="ques-op1" value="" size="60"/>
								</div>
							
								<div id="cad-questao-op2">
									<input name="ques-op2" type="text" id="ques-op2" value="" size="60"/>
								</div>
							
								<div id="cad-questao-op3">
									<input name="ques-op3" type="text" id="ques-op3" value="" size="60"/>
								</div>
							
								<div id="cad-questao-op4">
									<input name="ques-op4" type="text" id="ques-op4" value="" size="60" />
								</div>
							
								<div id="cad-questao-op5">
									<input name="ques-op5" type="text" id="ques-op5" value="" size="60" />
								</div>
							
								<div id="cad-questao-opCorreta">Alternativa Correta:
									<select name="ques-op-correta" size="1" id="ques-op-correta">
										<option>Alternativa Correta</option>
										<option value="1">ALTERNATIVA 1</option>
										<option value="2">ALTERNATIVA 2</option>
										<option value="3">ALTERNATIVA 3</option>
										<option value="4">ALTERNATIVA 4</option>
										<option value="5">ALTERNATIVA 5</option>
									</select>
								</div>
							
								<div id="cad-questao-dificuldade">Nível de Dificuldade:
									<select name="ques-dific" size="1" id="ques-dific">
										<option>Dificuldade da Questão</option>
										<option value="1">MUITO FÁCIL</option>
										<option value="2">FÁCIL</option>
										<option value="3">NORMAL</option>
										<option value="4">DIFÍCIL</option>
										<option value="5">MUITO DIFÍCIL</option>
									</select>
								</div>
							</fieldset>
				
							<div id="btn-confirm-cad-ques">
								<input type="submit" name="ques-btn-confirmar" id="ques-btn-confirmar" 
									value="Cadastrar" style="width: 150px; height: 40px"/>
							</div>
							<div id="btn-cancel-cad-ques">
								<input type="button"  onclick="location.href='<?php echo $_SESSION['user_url'];?>'" name="ques-btn-cancelar" id="ques-btn-cancelar" 
									value="Cancelar" style="width: 150px; height: 40px" />
							</div>
						</form>
					</div>
				</div>
			<div id="rodape"><p align="center">Desenvolvido por Darlisson Marinho e Iasmim Cunha</p>
		</div>
	</div>
</body>
</html>

<?php } else {

?>

<script type="text/javascript">
alert("Você não possui permisão para essa operação!");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>