<?

session_start();

if ($_SESSION['validacao'] == "1" && $_SESSION['user_tipo'] == "1")
{
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
						<div class="texto_p" id="texto">Cadastrar Novo Usuário</div>
					</div>
					<div id="info">
							<form id="cada-user" name="cadastro_usuario" method="post" action="action-usuario.php">
								<fieldset style="height: 340px">
									<legend>Dados Pessoais</legend>
									<br/><br/>
									<div id="cad-user-nome">
										Nome*:<input type="text" name="pnome" id="pnome" height="14px" />
									</div>
									<div id="cad-user-tipo">Tipo de Usuário*:
					      <select name="usuario" id="usuario" type="text" />
											<option value="1">ADMINISTRADOR</option>
											<option value="2">PROFESSOR</option>
											<option value="3">ALUNO</option>          
										</select>
								  </div>
									<div id="cad-user-telefone">
										Telefone:<input name="telefone" type="text" id="telefone" height="14px" size="16" maxlength="13" />
									</div>
									<div id="cad-user-uf">UF:
										<select  name="estado"  id="estado"></select>
									</div>
									<div id="cad-user-nro">Número:
										<input name="numero" type="text" id="numero" height="14px" size="8" />
									</div>
									<div id="cad-user-sexo">Sexo*:
										<input type="radio" name="sexo"id="sexo" value="F" />Feminino
										<input type="radio" name="sexo" id="sexo" value="M" />Masculino
									</div>
									
									<div id="cad-user-end-rua">
										<br/>Endereço<br/>Rua:
											<input name="rua" type="text" id="rua" height="14px"size="43"/>
									</div>
									<div id="cad-user-email">E-mail*:
										<input name="email" type="text" id="email" height="14px" size="31" />
									</div>
									<div id="cad-user-sobrenome">Sobrenome*:
										<input type="text" name="unome" id="unome2" height="14px" />
									</div>
									<div id="cad-user-end-cep">CEP:
										<input name="cep" type="text" id="cep" height="14px" onkeypress="formatar(this, '#####-###')"
												size="16" maxlength="9" />
									</div>
									<div id="cad-user-end-bairro">Bairro:
										<input name="bairro" type="text" id="bairro" height="14px" size="16" />
									</div>
									<div id="cad-user-cidade">Cidade:
										<select name="cidade"  id="cidade"  ></select>
									</div>
									<div id="cad-user-dt-nasc">Data de nascimento*:
                                   <select type="text" name="data1_dia" id="data1_dia"  />
                   <?php
                            $nr = 1;
                            while ($nr<=31){
								
                            echo "<option value='".$nr."'>$nr</option>";
                             $nr++;
                                 }
                    ?>
                    </select>
			        <select type="text" name="data1_mes" id="data1_mes"  />
                   <?php
                            $nr = 1;
                            while ($nr<=12){
								
                            echo "<option value='".$nr."'>$nr</option>";
                             $nr++;
                                 }
                    ?>
                    </select>
			       <select type="text" name="data1_ano" id="data1_ano"  />
                   <?php
                            $nr = 1980;
                            while ($nr<=2012){
								
                            echo "<option value='".$nr."'>$nr</option>";
                             $nr++;
                                 }
                    ?>
                    </select></div>
                    <div id="cad-user-end-comp">Complemento:
										<input name="complemento" type="text" id="complemento" height="14px" size="43" />
									</div>
								</fieldset>
									<fieldset>
										<legend>Dados de Acesso</legend>
										<p>Login*:
											<input name="login" type="text" id="login" height="14px" size="20" />
										Senha*:
											<input name="senha" type="password" id="senha" height="14px" size="20" />
										</p>
										
										<div id="btn-cad-user-confirm">
											<input type="submit" name="cad-user" id="cad-user" value="Cadastrar Usuário" 
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
<?php } else {

?>

<script type="text/javascript">
alert("Você não está logado como Administrador");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
