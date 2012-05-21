<?

session_start();

if ($_SESSION['validacao'] == "1" && $_SESSION['user_tipo'] == "1")
{
?>


<?php
include("conectaBD.php");

	$usuario= $_POST["busca_usuario"];
	$busca= mysql_query( "	SELECT tb_user_id ,tb_user_id_2,
	                        tb_user_pnome ,tb_user_unome ,tb_user_email
	                        ,tb_user_login ,tb_user_senha ,tb_user_tipo ,
							IF ( tb_user_sexo = 'M', 'Masculino', 'Feminino') as sexo ,
	                        DATE_FORMAT(tb_user_data_nasc, '%d/%m/%y') as data ,tb_user_end_rua ,tb_user_end_numero ,
	                        tb_user_end_cidade, tb_user_end_uf ,tb_user_end_cep ,
	                        tb_user_end_comp ,tb_user_end_bairro,tb_user_telefone 
	                        FROM tb_usuarios 
							WHERE tb_user_login = '".$usuario."'",$conexao);
	
	if(mysql_num_rows($busca)==0){
			echo "<script>alert('Esse usu\u00e1rio n\u00e3o est\u00e1 cadastrado!');</script>";
			echo "<script>location.href = 'consulta_usuario.php';</script>";
		}
?>
	
	
<?php
		while($dados=mysql_fetch_array($busca)){
		$tipo_user = $dados['tb_user_tipo'];
		
		switch($tipo_user){
		case 1:
		$tipo_user_desc = 'Administrador';
		case 2:
		$tipo_user_desc = 'Professor';
		
		case 3:
		$tipo_user_desc = 'Aluno';
		}
		
		?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Resultado da busca</title>
<link rel="stylesheet" type="text/css" href="css/style_2.css">
<style type="text/css">
#tudo #body #info #cada-user fieldset {
	color: #000;
}
</style>
</head>

<body background="images/fundo.jpg" >
		<div id="tudo">
			<div id="topo">
				<div id="logo"></div>
				<div id="titulo"><p>Sistema para Testes Online v 1.0</p></div>
		<div id="dados-user">Olá, <?php echo "<b><font color='#17EC29' >". $_SESSION['usuario']."</font></b>";?> : <?php echo "<b><font color='#17EC29'>".  $_SESSION['user_tipo_nome']."</font></b>";?>, Seja bem vindo(<a href="logout.php"> sair </a>)</div>
			</div>
			
			<div id="body">
				<div id="link-home"><a href="<?php echo $_SESSION['user_url'];?>">Menu Principal</a></div>
				<div id="menu" >
					<div class="texto_p" id="texto">Resultado da busca: <?php echo "<b><font color='#FF0000'>".$usuario."</font></b>";?> </div>
				</div>
				
				<div id="info">	
						<form id="cada-user" name="cadastro_usuario" method="post" action="">
							<fieldset style="height: 360px; color: #000;">
								<legend>Dados Pessoais</legend>
								<div id="consulta-nome">Nome:<?php echo "<b><font color='#FF0000'>".$dados['tb_user_pnome']."</font></b>";?> </div>
								<div id="consulta-tipo">Tipo de Usuário:<?php echo "<b><font color='#FF0000'>".$tipo_user_desc."</font></b>";?></div>
								<div id="consulta-telefone">Telefone:<?php echo "<b><font color='#FF0000'>".$dados['tb_user_telefone']."</font></b>";?></div>
							  <div id="consulta-uf">UF: <?php echo "<b><font color='#FF0000'>".$dados['tb_user_end_uf']."</font></b>";?></div>
  <div id="consulta-end-nro">Número: <?php echo "<b><font color='#FF0000'>".$dados['tb_user_end_numero']."</font></b>";?></div>
								<div id="consulta-sexo">Sexo: <?php echo "<b><font color='#FF0000'>".$dados['sexo']."</font></b>";?> </div>
								<div id="consulta-end-rua">
								<br/>Endereço<br/>Rua:<?php echo "<b><font color='#FF0000'>".$dados['tb_user_end_rua']."</font></b>";?></div>
								<div id="consulta-email">E-mail: <?php echo "<b><font color='#FF0000'>".$dados['tb_user_email']."</font></b>";?></div>
								<div id="consulta-sobrenome">Sobrenome: <?php echo "<b><font color='#FF0000'>".$dados['tb_user_unome']."</font></b>";?></div>
								<div id="consulta-cep">CEP: <?php echo "<b><font color='#FF0000'>".$dados['tb_user_end_cep']."</font></b>";?></div>
								<div id="consulta-bairro">Bairro:<?php echo "<b><font color='#FF0000'>".$dados['tb_user_end_bairro']."</font></b>";?></div>
								<div id="consulta-cidade">
								Cidade:<?php echo "<b><font color='#FF0000'>".$dados['tb_user_end_cidade']."</font></b>";?></div>
          <div id="consulta-dt-nasc">Data de nascimento: <?php echo "<b><font color='#FF0000'>".$dados['data']."</font></b>";?></div>
								<div id="consulta-end-comp">Complemento:<?php echo "<b><font color='#FF0000'>".$dados['tb_user_end_comp']."</font></b>";?></div>
								<div id="consulta-codigo"> Codigo: <?php echo "<b><font color='#FF0000'>".$dados['tb_user_id']."</font></b>";?></div>
							</fieldset>
							
							<fieldset><legend>Dados de Acesso</legend>
Login: <?php echo "<b><font color='#FF0000'>".$dados['tb_user_login']."</font></b>";?>
								</fieldset>
								<div id="btn-nova-busca">
									<input type="button" onclick= "window.open('consulta_usuario.php')"  name="nova-busca" id="nova-busca" value="Nova Consulta" style=" height: 32px ; width: 100px"/>
								</div>
						</form>
						<?php } ?>
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
alert("Somente Administradores podem fazer consultas");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
