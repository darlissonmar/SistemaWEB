<?	include("conectaBD.php");
	 
	$area_id = $_GET['id_area'];
	
	if (isset($_GET['id_area'])){
	
			if (strlen($_GET['id_area'])>0 && $_GET['id_area']!= -1 ){
		
		$disciplina = mysql_query("SELECT tb_disciplina.tb_disciplina_id,tb_disciplina.tb_disciplina_nome ,
									tb_disciplina_and_tb_area.tb_disciplina_id,tb_disciplina_and_tb_area.tb_area_id
									FROM tb_disciplina,tb_disciplina_and_tb_area
									WHERE tb_disciplina.tb_disciplina_id=tb_disciplina_and_tb_area.tb_disciplina_id 
									AND tb_disciplina_and_tb_area.tb_area_id=".$area_id,$conexao);
		
		if (mysql_num_rows($disciplina)>0){
			echo "<option value='-1'></option>";
			while($disciplina_row = mysql_fetch_array($disciplina)){
				$tb_disciplina_nome=nl2br($disciplina_row['tb_disciplina_nome']);
				$tb_disciplina_id=nl2br($disciplina_row['tb_disciplina_id']);
			echo "<option value='".$tb_disciplina_id."'>$tb_disciplina_nome</option>";
		}
		}else{
		echo "<option value='-1'></option>";
			echo "<option value='-1'>Nenhuma cadastrada</option>";
			
		}
	}
	else{
		echo "<option value='-1'></option>";
		echo "<option value='-1'>Selecione uma  Area</option>";
		}
	}
?>