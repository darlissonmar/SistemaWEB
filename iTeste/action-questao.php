<?php

include("conectaBD.php");
		session_start();
		$codigo= $_SESSION['id_usuario'];
		$id_assunto = $_POST['ques-assunto'];
		$area=$_POST['ques-area'];
		$disciplina=$_POST['ques-disci'];
		$questao= $_POST['cad-ques-enun'];
		$opcao1= $_POST['ques-op1'];
		$opcao2= $_POST['ques-op2'];
		$opcao3= $_POST['ques-op3'];
		$opcao4= $_POST['ques-op4'];
		$opcao5= $_POST['ques-op5'];
		$certa= $_POST['ques-op-correta'];
		$nivel= $_POST['ques-dific'];
		
			if (($questao == "") || ($opcao1 == "") || ($opcao2 == "") || ($opcao3 == "") 
				|| ($opcao4 == "") || ($opcao5 == "") || ($certa == "") || ($nivel == "")
				|| ($codigo == "") || ($area == "-1") || ($id_assunto =="-1") || ($disciplina == "-1"))
			{
			echo "<script>alert('Atencão! Todos os campos são obrigatórios e devem ser preenchidos.!');</script>";
			echo "<script>location.href = 'cadastra_questao.php';</script>";
			}
			
			else {
			mysql_query(
			"INSERT INTO tb_questao (
			tb_user_id ,tb_area_id ,tb_disciplina_id ,tb_questao_enunciado ,
			tb_questao_dificuldade ,tb_questao_op_correta ,tb_questao_op_1 ,
			tb_questao_op_2 ,tb_questao_op_3 ,tb_questao_op_4 ,tb_questao_op_5)
			VALUES ('$codigo','$area' ,'$disciplina', '$questao', '$nivel', '$certa', 
					'$opcao1', '$opcao2', '$opcao3','$opcao4','$opcao5');",$conexao);
			
			$sincroniza = mysql_query("INSERT INTO tb_assunto_and_tb_questao(tb_assunto_id, tb_questao_id)
										VALUE ('$id_assunto', LAST_INSERT_ID()",$conexao);
			
			echo "<script>alert('Nova Questão cadastrada com Sucesso!');</script>";
			echo "<script>location.href = 'cadastra_questao.php';</script>";}
?>
	
					
					
					