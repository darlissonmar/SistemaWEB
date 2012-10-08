<!DOCTYPE html>

<html>
<head>
<title>iTeste - Login</title>
<link rel="stylesheet" href="css/flexi-background.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen" />

<meta http-equiv="Content-Type" content="text/html;charset=utf-8" >
</head>
<body>
	<script src="js/flexi-background.js" type="text/javascript" charset="utf-8"></script>
	<div id="box">
		<img src="images/logo.png" class="logo" alt="yourlogo" />
		<h1>Login de Usuário</h1>
		<form action="action/action.php" name="form1" method="post">
			<input type="text" name= "login" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Nome de Usuário':this.value;" value="Nome de Usuário" />
			<input type="password" name= "senha" onclick="this.value='';" onfocus="this.select()" onblur="this.value=!this.value?'Senha':this.value;" value="Senha">
			<input type="submit" name="" value="Entrar" />
		</form>
	</div>
	
</body>
</html>