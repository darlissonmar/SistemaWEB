﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tela de Login</title>
<style type="text/css">
#apDiv1 {
	position:absolute;
	left:13px;
	top:93px;
	width:456px;
	height:199px;
	z-index:1;
}
#apDiv2 {
	position:absolute;
	left:65px;
	top:32px;
	width:210px;
	height:59px;
	z-index:1;
}
#apDiv3 {
	position:absolute;
	left:361px;
	top:216px;
	width:373px;
	height:146px;
	z-index:1;
}
#apDiv4 {
	position:absolute;
	left:533px;
	top:204px;
	width:331px;
	height:158px;
	z-index:1;
}
#apDiv4 #form1 table tr td {
	color: #41526F;
	font-family: Tahoma, Geneva, sans-serif;
}
.botao {
	background-color: #FFF;
	background-image: url(images/botao.png);
}
</style>
<body marginwidth="150">
<div id="apDiv4">
  <form id="form1" name="form1" method="post" action="action.php">
    <table width="334" height="135" border="0" align="center">
      <tr>
        <td width="114" height="21">&nbsp;</td>
        <td width="9">&nbsp;</td>
        <td width="153">&nbsp;</td>
        <td width="40">&nbsp;</td>
      </tr>
      <tr>
        <td height="28" style="font-size: medium; text-align: right; font-weight: bold;">Usuário:</td>
        <td>&nbsp;</td>
        <td><label>
          <input type="text" name="login" id="login" />
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="33" style="font-size: medium; text-align: right; font-weight: bold;">Senha:</td>
        <td>&nbsp;</td>
        <td><label>
          <input type="password" name="senha" id="senha" />
        </label></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td height="43" style="font-size: medium; text-align: right; font-weight: bold;">&nbsp;</td>
        <td>&nbsp;</td>
        <td><table width="110" height="31" border="0" align="right">
          <tr>
            <td><span style="font-size: medium; text-align: right; font-weight: bold;">
              <input type="image" src="images/botao.png" name="button" id="button" value="Enviar" />
            </span></td>
          </tr>
      </table></td>
        <td>&nbsp;</td>
      </tr>
    </table>

  </form>
</div>
<table width="1048" height="600" border="0" background="images/loginform.png">
  <tr>
    <th height="371" scope="col">&nbsp;</th>
  </tr>
</table>
</body>
</html>
