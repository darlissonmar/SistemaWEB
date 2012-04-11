<?php

        include("conectaBD.php");
       
        $usuario= $_POST["login"];
        $senha= $_POST["senha"];

		 $busca= "select *from tb_usuarios where tb_user_email LIKE '".$usuario."' and tb_user_senha LIKE '".$senha."' ";
		 $sql=mysql_query($busca,$conexao) or die (mysql_erro());
		 
		 while($linha= mysql_fetch_array($sql)){
			 $nome=$linha['tb_user_pnome'];
			 $tipo_de_conta=$linha['tb_user_tipo'];
			 }
  if (substr_count($usuario,'@')==0||substr_count($usuario,'.')==0){
	  echo "<script>alert('Não foi possível Logar: Login e/ou Senha inválido');</script>";
      echo "<script>location.href = 'login.php';</script>";
	 
	 }
	 
	if ($tipo_de_conta == 1){
	$tipo = "ADMINISTRADOR";
	} 
 if (mysql_num_rows($sql)!=0){
	    
		echo "<script>alert('Bem Vindo: <$nome> : <$tipo> ');</script>";
        echo "<script>location.href = 'principal.html';</script>";
		  }
		  
		  else{
			  echo "<script>alert('Não foi possível Logar: Login e/ou Senha inválido');</script>";
              echo "<script>location.href = 'login.php';</script>";
			  }

?>
