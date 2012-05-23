<html>
<?
session_start();
include("conectaBD.php");
     $busca= mysql_query("SELECT *FROM tb_assunto",$conexao);?>

nome das Areas:
<?while($dados=mysql_fetch_array($busca)){?>
<table>
<tr>
  <td><input name="assunto" type="text" id="assunto"  size="30"  value="<?echo $dados['tb_assunto_nome']?>"/></td>
  <td><input type="button" 
      onclick="location.href=
      '<?php echo "{$_SERVER['PHP_SELF']}?action=deletar&id={$dados['tb_assunto_id']}"; ?>'" name="cancel-user" id="cancel-user" value="Remover" /></td>
  <td><input type="button" onclick="location.href=
     '<?php echo "{$_SERVER['PHP_SELF']}?action=editar&id={$dados['tb_assunto_id']}"; ?>'"  name="cancel-user" id="cancel-user" value="Editar" /></td>
</tr>
</table>
<?}

function deletar($id)
  {
  global $connection;
  
  
  $query = "DELETE FROM tb_assunto
           WHERE tb_assunto_id= '$id'";
  
  
  $result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());

      echo "<script>alert('assunto deletado');</script>";
      echo "<script>location.href = 'editar_assunto.php';</script>";
      
  }
  
  
  function editar($id)
  {
  global $connection;
  $submit = $_POST[submit];
  
  if(!$submit)
      {
      
      $query = "SELECT tb_assunto_nome 
                FROM tb_assunto WHERE tb_assunto_id='$id'";
  
      
      $result = mysql_query($query)
               or die 
               ("Error in query: $query. " .mysql_error());
  
      
          if(mysql_num_rows($result) >0)
          {
          
              $dados = mysql_fetch_object($result);
      
          
              ?>
<fieldset>
<p>Editando assunto </p>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>" />
  <div id="titulo" >Nome:</div>
  <div>
    <textarea id="assunto"  name="assunto" ><?php echo $dados->tb_assunto_nome; ?></textarea>
  </div>
  </br>
  <input type="submit"  name="submit" value="salvar!" />
</form>
</div>
</fieldset>
<?php
              echo "\n";
              }
      
      else
          {
              echo "<p>assunto não localizado no banco de dados!</p>";
              }
      }
  
  else
      {
      
      $assunto_nome = $_POST['assunto'];
      
      
      
          $query = "UPDATE tb_assunto 
                     SET tb_assunto_nome = 
                     '$assunto_nome' WHERE 
                      tb_assunto_id = '$id'";
      
  
          $result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
      
      
      echo "<script>alert('Editado com sucesso!');</script>";
      echo "<script>location.href = 'editar_assunto.php';</script>";
      
      }

  }

?>
</html>
<?switch($_GET['action']) 
          {    
              case 'deletar':
              deletar($_GET['id']);
              break;
              
              case 'editar':
              editar($_GET['id']);
              break;
              
              
          }
  
?>
