<?

session_start();

if ($_SESSION['validacao'] == "1" )
{
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resolve Prova</title>
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
				<div class="texto_p" id="texto">Resolver Prova</div>
			</div>
			
			<div id="info">	
				<form id="form1" name="form1" method="post" action="">
					<fieldset style="height: 240px">
						<legend>Dados da Prova</legend>
							<div id="prova-area">Área:
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
							
							<div id="prova-disciplina">Disciplina:
								<select name="ques-disci" size="1" id="ques-disci">
									<option>Selecione a Disciplina</option>
								</select>
							</div>
						
							<div id="prova-assunto">Assunto:
								<select name="ques-assunto" id="ques-assunto">
									<option>Selecione o Assunto</option>
								</select>
							</div>
							<div id="prova-dificuldade">Nível de Dificuldade:
								<select name="ques-dific" size="1" id="ques-dific">
									<option>Dificuldade da Prova</option>
									<option value="1">MUITO FÁCIL</option>
									<option value="2">FÁCIL</option>
									<option value="3">NORMAL</option>
									<option value="4">DIFÍCIL</option>
									<option value="5">MUITO DIFÍCIL</option>
								</select>
							</div>
							<div id="btn-confirm-ques-prova">
								<input type="submit" name="prova-btn-confirmar" id="prova-btn-confirmar" 
								value="Iniciar" style="height: 28px; width:120px"/>
							</div>
							
							<div id="btn-cancelar-prova">
								<input type="button" onclick="location.href='<?php echo $_SESSION['user_url'];?>'" name="prova-btn-cancelar" id="prova-btn-cancelar" value="Cancelar" 
								style="height: 28px; width: 120px" />
							</div>        

							<div id="prova-nro-ques">Número de Questões:
								<select name="prova-nro" size="1" id="prova-nro">
									<option>Número de questões</option>
									<option value="5">5 Questões</option>
									<option value="10">10 Questões</option>
									<option value="15">15 Questões</option>
								</select>
							</div>
						</fieldset>
					</form>
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
alert("Somente usuários logados podem realizar a prova");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
