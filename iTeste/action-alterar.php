<?

include("conectaBD.php");
		session_start();

		$tipousuario=$_POST['usuario'];
		$nome =($_POST['pnome']);
		$sobrenome = ($_POST['unome']);
		$email=$_POST['email'];
		$login = ($_POST['login']);
		$sexo=$_POST['sexo'];
		$data = ($_POST['data']);
		$rua= ($_POST['rua']);
		$numero = ($_POST['numero']);
		$estado = ($_POST['estado']);
		$cidade = ($_POST['cidade']);
		$cep = ($_POST['cep']);
		$bairro = ($_POST['bairro']);
		$complemento = ($_POST['complemento']);
		$telefone = ($_POST['telefone']);
		
		                            if ($tipousuario="ADMINISTRADOR")
										$valor=1;
										else
											if ($tipousuario="PROFESSOR")
										    $valor=2;
										    
										     else 
										       if ($tipousuario="ALUNO")
											   $valor=3;
							
		
		$alterar=mysql_query("UPDATE tb_usuarios SET 
		             tb_user_tipo ='$valor',
		             tb_user_pnome = '$nome',
		             tb_user_unome = '$sobrenome',
		             tb_user_email ='$email',
	                 tb_user_login ='$login',
	                 tb_user_sexo = '$sexo',
	                 tb_user_data_nasc=STR_TO_DATE('$data','%d/%m/%y'),
	                 tb_user_end_rua='$rua' ,
	                 tb_user_end_numero='$numero' ,
	                 tb_user_end_cidade='$cidade', 
	                 tb_user_end_uf='$estado ',
	                 tb_user_end_cep ='$cep',
	                 tb_user_end_comp = '$complemento',
	                 tb_user_end_bairro='$bairro',
	                 tb_user_telefone= '$telefone' 
	                 WHERE tb_user_login = '".$_SESSION['login']."' LIMIT 1 ",$conexao);
	                 
            $_SESSION['login']=NULL;
            
            echo "<script>alert('Operação realizada com Sucesso!');</script>";
            echo "<script>location.href = '".$_SESSION['user_url']."';</script>";
	                        
?>
