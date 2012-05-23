							
<?

session_start();

if ($_SESSION['validacao'] == "1" && $_SESSION['user_tipo'] == "1")
{

?>


<?
include("conectaBD.php");
$busca= mysql_query( "	SELECT tb_user_id ,tb_user_id_2,
	                        tb_user_pnome ,tb_user_unome ,tb_user_email
	                        ,tb_user_login ,tb_user_senha ,tb_user_tipo ,tb_user_sexo ,DATE_FORMAT(tb_user_data_nasc,'%d/%m/%y') as data,
	                         tb_user_end_rua ,tb_user_end_numero ,
	                        tb_user_end_cidade, tb_user_end_uf ,tb_user_end_cep ,
	                        tb_user_end_comp ,tb_user_end_bairro,tb_user_telefone 
	                        FROM tb_usuarios 
							WHERE tb_user_login = '".$_SESSION['login']."'",$conexao);


?>



<?php
		while($dados=mysql_fetch_array($busca)){
			
		?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cadastrar Novo Usuário</title>
<link rel="stylesheet" type="text/css" href="css/style_2.css">
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
</head>
<script language="javascript">
function formatar(src, mask){
  var i = src.value.length;
  var saida = mask.substring(0,1);
  var texto = mask.substring(i)
if (texto.substring(0,1) != saida)
  {
    src.value += texto.substring(0,1);
  }
}
</script>
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
						<div class="texto_p" id="texto">Alterar Usuário</div>
					</div>
					<div id="info">
							<form id="cada-user" name="cadastro_usuario" method="post" action="action-alterar.php">
								<fieldset style="height: 340px">
									<legend>Dados Pessoais</legend>
									<br/><br/>
									<div id="cad-user-nome">
										Nome*:<input type="text" name="pnome" id="pnome" height="14px" value="<?echo $dados['tb_user_pnome']?>" />
									</div>
									<div id="cad-user-tipo">Tipo de Usuário*:
									<?
									if ($dados['tb_user_tipo']=1)
										$valor="ADMINISTRADOR";
										else	
										if ($dados['tb_user_tipo']=2)
										    $valor="PROFESSOR";
										else    
										    if ($dados['tb_user_tipo']=3)
											$valor="ALUNO";	
											
										
									?>
					      <input name="usuario" id="usuario" type="text" value="<?echo $valor ?>" />
					      
								  </div>
									<div id="cad-user-telefone">
										Telefone:<input name="telefone" value="<?echo $dados['tb_user_telefone']?>" type="text" id="telefone" height="14px" size="16" maxlength="13" />
									</div>
									<div id="cad-user-uf">UF:
										<input  name="estado"  id="estado" value="<?echo $dados['tb_user_end_uf']?>"/>
									</div>
									<div id="cad-user-nro">Número:
										<input name="numero" type="text" id="numero" height="14px" size="8" value="<?echo $dados['tb_user_end_numero']?>"/>
									</div>
									<div id="cad-user-sexo">Sexo*:
									<?
									if($dados['tb_user_sexo']= "M")
									$sexo="Masculino";
									
									if ($dados['tb_user_sexo']= "F")
									$sexo="Feminino";
									?>
									   
										<input type="text" name="sexo" id="sexo" value="<?echo $sexo?>"/>
										
									</div>
									
									<div id="cad-user-end-rua">
										<br/>Endereço<br/>Rua:
											<input name="rua" type="text" id="rua" height="14px"size="43" value="<?echo $dados['tb_user_end_rua']?>"/>
									</div>
									<div id="cad-user-email">E-mail*:
										<input name="email" type="text" id="email" height="14px" size="31" value="<?echo $dados['tb_user_email']?>"/>
									</div>
									<div id="cad-user-sobrenome">Sobrenome*:
										<input type="text" name="unome" id="unome2" height="14px" value="<?echo $dados['tb_user_unome']?>"/>
									</div>
									<div id="cad-user-end-cep">CEP:
										<input name="cep" type="text" id="cep" height="14px" onkeypress="formatar(this, '#####-###')"
												size="16" maxlength="9"  value="<?echo $dados['tb_user_end_cep']?>" />
									</div>
									<div id="cad-user-end-bairro">Bairro:
										<input name="bairro" type="text" id="bairro" height="14px" size="16" value="<?echo $dados['tb_user_end_bairro']?>"/>
									</div>
									<div id="cad-user-cidade">Cidade:
										<input name="cidade"  id="cidade" value="<?echo $dados['tb_user_end_cidade']?>" />
									</div>
									<div id="cad-user-dt-nasc">Data de nascimento*:
                                   <input  name="data" id="data" value="<?echo $dados['data']?>"/>
                                     </div>
											
									<div id="cad-user-end-comp">Complemento:
										<input name="complemento" type="text" id="complemento" height="14px" size="43" value="<?echo$dados['tb_user_end_comp']?>"/>
									</div>
								</fieldset>
																					
										<fieldset>
										<legend>Dados de Acesso</legend>
										<p>Login*:
											<input name="login" type="text" id="login" height="14px" size="20" value="<?echo $dados['tb_user_login']?>" />
										
										</p>
										
										<div id="btn-cad-user-confirm">
											<input type="submit" name="cad-user" id="cad-user" value="Salvar" 
												style="width: 150px; height: 40px"/>
										</div>
											<div id="btn-cad-user-cancel"><input type="button" onclick="location.href='<?php echo $_SESSION['user_url'];?>'" name="cancel-user" id="cancel-user" 
													value="Cancelar" style="width: 150px; height: 40px"/>
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
<?php }} else {

?>

<script type="text/javascript">
alert("Você não está logado como Administrador");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
