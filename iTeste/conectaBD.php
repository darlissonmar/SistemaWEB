<?

$conexao = mysql_connect("localhost","root","");
mysql_set_charset('utf8',$conexao);
if(!$conexao){
	die('N�o foi poss�vel conectar ao mysql' . mysql_error());
     
	 }else{
		 mysql_select_db("trabalho2",$conexao);
	 }
?>
