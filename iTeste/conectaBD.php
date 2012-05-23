<?php

	//ini_set("display_errors",0);
	ini_set('default_charset','UTF-8'); 
	$host_nome="localhost";
	$admin_nome="root";
	$senha="";
	$charset='utf8';
	$nome_banco="trabalho2";
	$conexao = mysql_connect($host_nome,$admin_nome,$senha);
	
	mysql_set_charset($charset,$conexao);
	
	if(!$conexao){
		die('Não foi possível conectar ao Banco de Dados' . mysql_error());
     
		}else{
			mysql_select_db($nome_banco,$conexao);
	 }
?>
