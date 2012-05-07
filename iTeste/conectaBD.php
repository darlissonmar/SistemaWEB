<?

$conexao = mysql_connect("localhost","root","");
mysql_set_charset('utf8',$conexao);
if(!$conexao){
	die('Não foi possível conectar ao mysql' . mysql_error());
     
	 }else{
		 mysql_select_db("trabalho2",$conexao);
	 }
?>
