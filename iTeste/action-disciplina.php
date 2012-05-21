<?
include("conectaBD.php");
$tb_area_id=$_POST['list-area'];
$titulo=$_POST['cad-disciplina-nome'];
session_start();
$codigo=$_SESSION['id_usuario'];
$url = $_SESSION['user_url'];

  if (($tb_area_id == "") || ($titulo== "")|| ($codigo== "") ){
			echo "<script>alert('Atencão! Todos os campos obrigatórios (*) devem ser preenchidos.!');</script>";
			echo "<script>location.href = 'cadastra_Disciplina.php';</script>";
	}else{
			$duplicacao=mysql_query("SELECT *
									FROM tb_disciplina_and_tb_area
									WHERE tb_disciplina_id IN (
										SELECT tb_disciplina_id
										FROM tb_disciplina
										WHERE tb_disciplina_nome LIKE '".$titulo."')
									AND tb_area_id = '".$tb_area_id."'" ,$conexao);
										    
				if(mysql_num_rows($duplicacao)>=1){
					echo "<script>alert('Esta Disciplina já foi cadastrada');</script>";
					echo "<script>location.href = 'cadastra_disciplina.php';</script>";
		}else{
			$cadastrar=mysql_query(" INSERT into 
									tb_disciplina(tb_user_id ,tb_disciplina_nome)
									VALUE ('$codigo','$titulo')",$conexao);
				$sincroniza=mysql_query(" INSERT into 
										tb_disciplina_and_tb_area(tb_disciplina_id	,tb_area_id)
										VALUE (LAST_INSERT_ID(),'$tb_area_id')",$conexao);
				echo "<script>alert('A nova Disciplina foi cadastrada!');</script>";
				echo "<script>location.href ='$url';</script>";
			}
		}

?>
