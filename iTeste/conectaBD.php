<?php

	$host_nome="localhost";
	$admin_nome="root";
	$senha="";
	$charset='utf8';
	$nome_banco="trabalho2";
	$conexao = mysql_connect($host_nome,$admin_nome,$senha);
	
	mysql_set_charset($charset,$conexao);
	
	if(!$conexao){
		die('N�o foi poss�vel conectar ao Banco de Dados' . mysql_error());
     
		}else{
			mysql_select_db($nome_banco,$conexao);
	 }
?>
