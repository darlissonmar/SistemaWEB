<?
require_once('banco.config.php');
require_once('class/class.banco.php');


global $banco;
	try {
		
		$banco = new BancodeDados();
		$conexao = $banco->conecta();
		mysql_set_charset('utf8',$conexao); 
		$controller = new Controller($banco); 
	} catch(Exception $e) { 
		echo $e->getMessage();
		exit;
	}
?>