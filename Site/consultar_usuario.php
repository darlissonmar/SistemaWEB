
<?php

include("conectaBD.php");
       
$usuario= "jsilva";


$busca= mysql_query("select *from tb_usuarios where tb_user_login = '".$usuario."'",$conexao);

if(mysql_num_rows($busca)==0){
	echo "<script>alert('Usuário não cadastrado!');</script>";
	echo "<script>location.href = 'consultaindex.php';</script>";
	}

else{	 	 	 	 		 			 	 	 	 	 	 		 	 	
while($dados=mysql_fetch_array($busca)){
	$codigoadm=$dados['tb_user_id_2'];
	$codigousuario=$dados['tb_user_id'];
	$nome=$dados['tb_user_pnome'];
	$sobrenome=$dados['tb_user_unome'];
	$email=$dados['tb_user_email'];
	$login=$dados['tb_user_login'];
	$tipo=$dados['tb_user_tipo'];
	$sexo=$dados['tb_user_sexo'];
	$nascimento=$dados['tb_user_data_nasc'];
	$rua=$dados['tb_user_end_rua'];
	$numero=$dados['tb_user_end_numero'];
	$cidade=$dados['tb_user_end_cidade'];
	$uf=$dados['tb_user_end_uf'];
	$cep=$dados['tb_user_end_cep'];
	$bairro=$dados['tb_user_end_bairro'];
	$rua=$dados['tb_user_end_rua'];
	$comp=$dados['tb_user_end_comp'];
	$telefone=$dados['tb_user_telefone'];
	
	}
echo $codigoadm;
echo "<br>";
echo	$codigousuario;
echo "<br>";
echo	$nome;
echo "<br>";
echo	$sobrenome;
echo "<br>";
echo	$email;
echo "<br>";
echo	$login;
echo "<br>";
echo	$tipo;
echo "<br>";
echo	$sexo;
echo "<br>";
echo	$nascimento;
echo "<br>";
echo	$rua;
echo "<br>";
echo	$numero;
echo "<br>";
echo	$cidade;
echo "<br>";
echo	$uf;
echo "<br>";
echo	$cep;
echo "<br>";
echo	$bairro;
echo "<br>";
//echo	$rua;
echo "<br>";
echo	$comp;
echo "<br>";
echo	$telefone;
 			  
}

?>





