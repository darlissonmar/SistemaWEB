<?
require_once('class/class.controller.php');
require_once "banco.con.php";
session_start();

if ($_SESSION['validacao'] == "1" && $_SESSION['user_tipo'] == "1")
{
?>

<!DOCTYPE HTML>
<html>

<head>
  <title>Menu Cadastrar - novo Usuário</title>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <!-- modernizr enables HTML5 elements and feature detects -->
  <script type="text/javascript" src="js/modernizr-1.5.min.js"></script>

</head>

<body>
  <div id="main">
    <header>
      <div id="logo">
        <!-- class="logo_colour", allows you to change the colour of the text -->
        <h1><a href="<?php echo $_SESSION['user_url'];?>"><span class="logo_colour">i</span>Teste v 3.0</a></h1>
      <p><h3>Usuário: <?php echo $_SESSION['usuario_nome'];?> : <?php echo $_SESSION['user_tipo_nome'];?> - <a href="logout.php">Sair</a></h3> </p>
        
      </div>
      <nav>
        <ul class="sf-menu" id="nav">
          <li><a href="<?php echo $_SESSION['user_url'];?>">Inicio</a></li>
          <li><a href="#">Cadastrar</a>
            <ul>
              <li><a href="cadastra_usuario.php">Usuário</a></li>
             <li><a href="cadastra_questao.php">Questão</a></li>
             <li><a href="cadastra_area.php">Área</a></li>
             <li><a href="cadastra_disciplina.php">Disciplina</a></li>
             <li><a href="cadastra_assunto.php">Assunto</a></li>
              </ul>
          </li>
          <li><a href="#">Resolver Questões</a>
            <ul>
              <li><a href="resolve_teste.php">Resolver Teste</a>
              <li><a href="elabora_prova.php">Resolver Prova</a></li>
              </ul>
          </li>
          <li><a href="#">Alterar Dados</a>
            <ul>
              <li><a href="altera_usuario.php">Usuário</a></li>
              <li><a href="altera_questao.php">Questão</a></li>
              <li><a href="altera_area.php">Área</a></li>
              <li><a href="altera_disciplina.php">Disciplina</a></li>
              <li><a href="altera_assunto.php">Assunto</a></li>
              
              </ul>
          </li>
          <li><a href="buscar_usuario.php">Buscar Usuário</a></li>
          </ul>
      </nav>
    </header>
    <div id="site_content">
      <div id="sidebar_container">
        <div class="sidebar">
          <h1>O que você deseja fazer?</h1>
          <h2>Acesso rápido</h2>
          <a  href="cadastra_usuario.php">Cadastrar um novo Usuário</a><br></br>
		  <a  href="cadastra_questao.php">Cadastrar uma nova Questão</a><br></br>
		  <a  href="resolve_teste.php">Realizar um novo Teste</a><br></br>
		  <a  href="elabora_prova.php">Realizar uma nova Prova</a><br></br>
        </div>
        <div class="sidebar">
          <h1>Números</h1>
          <h2>Cadastros</h2>
          <table>
          <tr>
          	<td>Alunos: </td> 
          	<td><a href="lista_usuarios?tipo='3'"><?php echo $controller->recuperarQtdeTipoUsuarioDAO('3'); ?></a></td>
		  </tr>
		  <tr>
		  	<td>Professores:</td>
		 	 <td><a href="lista_usuarios?tipo='2'"> <?php echo $controller->recuperarQtdeTipoUsuarioDAO('2'); ?></a></td>
		  </tr>
		  <tr>
		 	 <td>Questões:</td>
		 	 <td><a href=""> <?php echo $controller->recuperarQtdeQuestaoTodosDAO(); ?></a></td>
		  </tr>
		  <tr>
		  	<td>Áreas:</td>
		  	<td><a href="'"> <?php echo $controller->recuperarQtdeAreaDAO(); ?></a></td>
		  </tr>
		  <tr>
		  	<td>Assuntos:</td>
		  	<td><a href=""> <?php echo $controller->recuperarQtdeAssuntoTodosDAO(); ?></a></td>
		  </tr>
		  <tr>
		  	<td>Disciplinas:</td>	
		  	<td><a href=""> <?php echo $controller->recuperarQtdeDisciplinaTodosDAO(); ?></a></td>  
		  </tr>		  
		  </table>
        </div>
        
      </div>
      <div id="content">
        
        <div id="content_item">
         <h1>Cadastro de novo usuário</h1>
          <form name="form1" action="action/action_user.php" method="post" >
            <div class="form_settings">
              <fieldset><legend>Dados Pessoais</legend><p></p><p></p>
              <p><span>Tipo de Usuário*: </span>
                <select id="id" name="tipo_user">
                  <option value="3">Aluno</option>
                  <option value="2">Professor</option>
                  <option value="1">Administrador</option>

                </select></p>
              <p><span>Nome*:</span><input type="text"  name="pnome" value="" /></p>
               <p><span>Sobrenome*:</span><input type="text" name="unome" value="" /></p>
               <p><span>E-mail*:</span><input type="text" name="email" value="" /></p>
                <p><span>Data de Nascimento*:
               
               </span>
               <select type="text" name="data1_dia" id="data1_dia" style="width:80px;"  />
					<?php
					$nr = 1;
					while ($nr<=31){
					echo "<option value='".$nr."'>$nr</option>";
							$nr++;
					}?>
				</select>
				<select type="text" name="data1_mes" id="data1_mes" style="width:80px;"  />
					<?php
					$nr = 1;
					while ($nr<=12){
					echo "<option value='".$nr."'>$nr</option>";
						$nr++;
					}?>
				</select>
				<select type="text" name="data1_ano" id="data1_ano" style="width:80px;" />
				<?php
				$nr = 1980;
				while ($nr<=2012){
				echo "<option value='".$nr."'>$nr</option>";
				$nr++;
				}?>
				</select>(ex: 21/10/1981)
             </p>
               
               <p><span>Sexo*:</span><input class= "checkbox" type="radio" name="sexo" id="sexo" value="F" />Feminino
                <input class= "checkbox" type="radio" name="sexo" id="sexo" value="M" checked="" />Masculino</p>
                </fieldset>
                <p></p><p></p>
                <fieldset><legend>Endereço</legend><p></p><p></p>
                <p> <span>Rua*:</span></p><p><input type="text" name="rua" value="" /></p>
                <p> <span>Número*:</span></p><p><input type="text" name="numero" value="" /></p>
                <p> <span>Complemento*:</span></p><p><input type="text" name="complemento" value="" /></p>
                <p> <span>CEP*:</span></p><p><input type="text" name="cep" value="" onkeypress="formatar(this, '#####-###')"
												maxlength="9"/></p>
                <p> <span>Bairro*:</span></p><p><input type="text" name="bairro" value="" /></p>
                <p> <span>UF*:</span></p><p><select  name="estado"  id="estado"></select></p>
                <p> <span>Cidade*:</span></p><p><select name="cidade"  id="cidade"  ></select></p>
                <p> <span>Telefone*:</span></p><p><input type="text" name="telefone" value="" onkeypress="formatar(this, '##-####-####')" maxlength="13"/></p>
                </fieldset><p></p>
                <fieldset><legend>Dados de Acesso</legend><p></p>
                <p> <span>Login*:</span></p><p><input type="text" name="login" value="" /></p>
                <p> <span>Senha*:</span></p><p><input type="password" name="senha" value="" /></p>
                <p> <span>Confirmar Senha*:</span></p><p><input type="password" name="senha-confir" value="" /></p>
              </fieldset>
              <p>&nbsp;</p>
             <input style= "margin-left: 205px;" class="submit" type="button" name="name" value="Cancelar" onclick="location.href='<?php echo $_SESSION['user_url'];?>'" />
             <input style= "margin-left: 100px;"class="submit" type="submit" name="name" value="Cadastrar"  />
            </div>
          </form>


        </div>
      </div>
    </div>
    <footer>
      <p><a href="<?php echo $_SESSION['user_url'];?>">Inicio</a> || <a href="logout.php">Sair</a></p>
      <p>Copyright &copy; CSS3_three | <a href="http://www.css3templates.co.uk">design from css3templates.co.uk</a></p>
    </footer>
    
  </div>
  
  <!-- javascript at the bottom for fast page loading -->
  
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/jquery.easing-sooper.js"></script>
  <script type="text/javascript" src="js/jquery.sooperfish.js"></script>
  <script CHARSET="ISO-8859-1" type="text/javascript" src="js/cidades-estados-v0.2.js"></script> 
  <script charset="utf-8" type="text/javascript" language="JavaScript">
    window.onload = function() {
        new dgCidadesEstados( 
            document.getElementById('estado'), 
            document.getElementById('cidade'), 
            true
        );
    }
</script>
		<script language="javascript">
			function formatar(src, mask){
  			var i = src.value.length;
 			var saida = mask.substring(0,1);
 			var texto = mask.substring(i);
			if (texto.substring(0,1) != saida)
  			{
  				  src.value += texto.substring(0,1);
 			 }
			}
</script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('ul.sf-menu').sooperfish();
    });
  </script>
</body>
</html>

<?php } else {
ini_set('default_charset','UTF-8');
?>

<script type="text/javascript">
alert("Você não está logado como Administrador");
</script>

<?
echo "<script>location.href = 'login.php';</script>";
}
?>
