<?
$conexao = mysql_connect("localhost","root","") or die (mysql_error);

$db=mysql_select_db("trabalho",$conexao);
if(!$db){
	echo"erro no banco selecionado";
	exit;
	}
?>
