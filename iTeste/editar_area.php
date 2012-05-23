<html>
<?
session_start();
	
include("conectaBD.php");
     $busca= mysql_query("SELECT *FROM tb_area",$conexao);?>

Nome das Áreas:
<?while($dados=mysql_fetch_array($busca)){?>
<table>
<tr>
  <td><input name="area" type="text" id="area"  size="30"  value="<?echo $dados['tb_area_nome']?>"/></td>
  <td><input type="button" 
      onclick="location.href=
      '<?php echo "{$_SERVER['PHP_SELF']}?action=deletar&id={$dados['tb_area_id']}"; ?>'" name="cancel-user" id="cancel-user" value="Remover" /></td>
  <td><input type="button" onclick="location.href=
     '<?php echo "{$_SERVER['PHP_SELF']}?action=editar&id={$dados['tb_area_id']}"; ?>'"  name="cancel-user" id="cancel-user" value="Editar" /></td>
</tr>
</table>
<?}

function deletar($id)
  {
  global $connection;
  
  
  $query = "DELETE FROM tb_area
           WHERE tb_area_id= '$id'";
  
  
  $result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());

      echo "<script>alert('area deletada');</script>";
      echo "<script>location.href = 'editar_area.php';</script>";
      
  }
  
  
  function editar($id)
  {
  global $connection;
  $submit = $_POST[submit];
  
  if(!$submit)
      {
      
      $query = "SELECT tb_area_nome 
                FROM tb_area WHERE tb_area_id='$id'";
  
      
      $result = mysql_query($query)
               or die 
               ("Error in query: $query. " .mysql_error());
  
      
          if(mysql_num_rows($result) >0)
          {
          
              $dados = mysql_fetch_object($result);
      
          
              ?>
<fieldset>
<p>Editando area </p>
<form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>" />
  <div id="titulo" >Nome:</div>
  <div>
    <textarea id="area"  name="area" ><?php echo $dados->tb_area_nome; ?></textarea>
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
              echo "<p>area não localizado no banco de dados!</p>";
              }
      }
  
  else
      {
      
      $area_nome = $_POST['area'];
      
      
      
          $query = "UPDATE tb_area 
                     SET tb_area_nome = 
                     '$area_nome' WHERE 
                      tb_area_id = '$id'";
      
  
          $result = mysql_query($query) or die ("Error in query: $query. " .mysql_error());
      
      
      echo "<script>alert('Editado com sucesso!');</script>";
      echo "<script>location.href = 'editar_area.php';</script>";
      
      }

  }

?>
</html>
<?
		switch($_GET['action']) 
          {    
              case 'deletar':
              deletar($_GET['id']);
              break;
              
              case 'editar':
              editar($_GET['id']);
              break;
              
              
          }
  
?>
