<?	include("conectaBD.php");
	 
	$disciplina_id = $_GET['id_disciplina'];
	
	if (isset($_GET['id_disciplina'])){
	
			if (strlen($_GET['id_disciplina'])>0 && $_GET['id_disciplina']!= -1 ){
		
	$assunto = mysql_query("SELECT tb_assunto.tb_assunto_id,tb_assunto.tb_assunto_nome ,
							tb_assunto_and_tb_disciplina.tb_assunto_id,tb_assunto_and_tb_disciplina.tb_disciplina_id
	                        FROM tb_assunto,tb_assunto_and_tb_disciplina
							WHERE Tb_assunto.tb_assunto_id = tb_assunto_and_tb_disciplina.tb_assunto_id
							AND tb_assunto_and_tb_disciplina.tb_disciplina_id =" .$disciplina_id,$conexao);
		
		if (mysql_num_rows($assunto)>0){
		echo "<option value='-1'></option>";
			while($assunto_row = mysql_fetch_array($assunto)){
					$tb_assunto_nome=nl2br($assunto_row['tb_assunto_nome']);
					$tb_assunto_id=nl2br($assunto_row['tb_assunto_id']);
					echo "<option value='".$tb_assunto_id."'>$tb_assunto_nome</option>";
					
			
		}
		}else{
			echo "<option value='-1'></option>";
			echo "<option value='-1'>Nenhum cadastrado</option>";
			
		}
	}
	else{
		echo "<option value='-1'></option>";
		echo "<option value='-1'>Selecione uma  Disciplina</option>";
		
		}
	}
?>