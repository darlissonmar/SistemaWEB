<?php	
		include("conectaBD.php");
		session_start();
		$codigo= $_SESSION['id_usuario'];
		$tipousuario=$_POST['usuario'];
		$nome =($_POST['pnome']);
		$sobrenome = ($_POST['unome']);
		$email=$_POST['email'];
		$login = ($_POST['login']);
		$senha = md5($_POST['senha']);
		$sexo=$_POST['sexo'];
		$data1_dia = ($_POST['data1_dia']);
		$data1_mes = ($_POST['data1_mes']);
		$data1_ano = ($_POST['data1_ano']);
		$rua= ($_POST['rua']);
		$numero = ($_POST['numero']);
		$estado = ($_POST['estado']);
		$cidade = ($_POST['cidade']);
		$cep = ($_POST['cep']);
		$bairro = ($_POST['bairro']);
		$complemento = ($_POST['complemento']);
		$telefone = ($_POST['telefone']);
					
					$query_valida= "	SELECT * FROM tb_usuarios 
										WHERE tb_user_login 
										LIKE '".$login."'";
					$mysql_result = mysql_query($query_valida,$conexao);
						
						if (($nome =="") || ($email == "") || ($codigo == "") || 
							($sobrenome == "") || ($tipousuario == "") || ($login == "")|| 
							($senha == "") || ($data1_dia == "") || ($data1_mes == "") || 
							($data1_ano == "")  || ($estado == "") || ($cidade == "" )){
								
						echo "<script>alert('Atencão! Todos os campos obrigatórios (*) devem ser preenchidos.!');</script>";
						echo "<script>location.href = 'cadastra_usuario.php';</script>";
						}else{
						
						if(!preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $email)){
							echo "<script>alert('E-mail inválido.!');</script>";
							echo "<script>location.href = 'cadastro_usuario.php';</script>"; 
						}else{
							if(!preg_match('/^[0-9]{5,5}([- ]?[0-9]{3,3})?$/', $cep)) {
								echo "<script>alert('CEP inválido.!');</script>";
								echo "<script>location.href = 'cadastra_usuario.php';</script>"; 
								}else{
										$num_rows= mysql_num_rows($mysql_result);
											if($num_rows!=0){
											echo "<script>alert('Já existe um usuário com esse login!');</script>";
											echo "<script>location.href = 'cadastra_usuario.php';</script>";
											}else{
											
											$query_insert = "INSERT INTO 
															tb_usuarios (tb_user_id_2 ,tb_user_pnome ,	tb_user_unome ,	
															tb_user_login ,tb_user_senha ,	tb_user_tipo ,	tb_user_data_nasc ,
															tb_user_end_rua ,	tb_user_end_numero ,tb_user_end_cidade,
															tb_user_end_uf ,tb_user_end_cep ,	tb_user_end_comp, tb_user_end_bairro,
															tb_user_telefone,tb_user_sexo,tb_user_email)
															VALUES ('$codigo','$nome','$sobrenome','$login','$senha','$tipousuario',
																	'$data1_ano.$data1_mes.$data1_dia','$rua','$numero','$cidade',
																	'$estado','$cep','$complemento','$bairro','$telefone','$sexo','$email')";
											
											if (!mysql_query($query_insert,$conexao)){
											die('Error: ' . mysql_error());
											}else{
												echo "<script>alert('O novo Usuário foi cadastrado com Sucesso!');</script>";
												echo "<script>location.href = 'menu_admin.php';</script>";
											}
									}
								}
							}
					}
?>
