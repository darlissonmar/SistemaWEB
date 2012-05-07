<?php
include("conectaBD.php");
	$titulo=$_POST['area'];
	session_start();
	$codigo= $_SESSION['id_usuario'];
	$query_cadastra= mysql_query( " SELECT * FROM tb_area 
									WHERE tb_area_nome 
									LIKE '".$titulo."'",$conexao);
									
			if (($titulo == "")){
				echo "<script>alert('Aten\u00e7\u00e3o! Os campos obrigat\u00f3rios (*) devem ser preenchidos!');</script>";
				echo "<script>location.href = 'cadastra_area.php';</script>";
			}else{
				if(mysql_num_rows($query_cadastra)>=1){
					echo "<script>alert('Essa \u00e1rea j\u00e1 foi cadastrada')</script>";
					echo "<script>location.href = 'cadastra_area.php';</script>";
				}else{
						$cadastrar=mysql_query("	INSERT into tb_area(tb_user_id,tb_area_nome) 
										VALUE ('$codigo','$titulo')",$conexao);
									echo "<script>alert('Nova \u00e1rea cadastrada!');</script>";
									echo "<script>location.href = 'cadastra_area.php';</script>";
			}
	}
	
	
	/*SELECT * FROM  tb_usuarios WHERE ".$codigo."
									IN ( SELECT tb_user_id FROM tb_usuarios) 
									AND*/
?>
