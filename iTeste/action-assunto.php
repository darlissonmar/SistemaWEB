<?php 
	include("conectaBD.php");
	$tb_disciplina_id=$_POST['list-disc'];
	$titulo=$_POST['nome-assunto'];
	
	session_start();
	$codigo=$_SESSION['id_usuario'];
	$url = $_SESSION['user_url'];
	
		if (($tb_disciplina_id == "")|| ($titulo== "")|| ($codigo== "") ){
			echo "<script>alert('Atencão! Todos os campos obrigatórios (*) devem ser preenchidos.!');</script>";
			echo "<script>location.href = 'cadastra_assunto.php';</script>";
			}else{	
				
				$duplicacao=mysql_query("SELECT *
										FROM tb_assunto_and_tb_disciplina
										WHERE tb_assunto_id IN (
											SELECT tb_assunto_id
											FROM tb_assunto
											WHERE tb_assunto_nome LIKE '".$titulo."')
										AND tb_disciplina_id = '".$tb_disciplina_id."'" ,$conexao);
										    
				if(mysql_num_rows($duplicacao)>=1){
						echo "<script>alert('Este Assunto já foi cadastrado!');</script>";
						echo "<script>location.href = 'cadastra_assunto.php';</script>";
					}else{
						$cadastrar=mysql_query(" INSERT into
												tb_assunto(tb_user_id ,tb_assunto_nome)
												VALUE ('$codigo','$titulo')",$conexao);
										
						$sincroniza=mysql_query("	INSERT into
												tb_assunto_and_tb_disciplina(tb_assunto_id ,tb_disciplina_id)
												VALUE (LAST_INSERT_ID(),'$tb_disciplina_id')",$conexao);
											
							echo "<script>alert('O novo Assunto foi cadastrado!');</script>";
							echo "<script>location.href = '$url';</script>";
			}	
		}

?>
