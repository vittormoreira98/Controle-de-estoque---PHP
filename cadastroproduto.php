<?php require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
	if ($_SESSION['nivel'] < 10){
		echo "<script>alert('Voc� n�o tem permiss�o para acessar est� p�gina!');history.back(-1);</script>";
		exit;
	}
 ?>
<html>
<head>
<title>EVOLUTION - INTRANET</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
body {
text-align:center;
}
#geral {
width:760px;
margin:0 auto;
text-align:left; 
}
-->
</style>
<link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="geral">
<?php require("include/cima.php"); ?>
<?php require("include/menu_cima.php"); ?>
  <table width="760" border="0" cellspacing="0" cellpadding="0">
    <tr> 
      <td width="147">&nbsp;</td>
      <td width="359">&nbsp;</td>
      <td width="254">&nbsp;</td>
    </tr>
    <tr> 
      <td height="296" valign="top"> 
        <?php require("include/menu_lateral.php"); ?></td>
      <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td height="3" colspan="3"><img src="imagens/pixel.gif" width="2"></td>
          </tr>
          <tr> 
            <td height="307" colspan="3" valign="top">
<form action="incluirprod.php" method="post" name="cadprod">
  <table width="611" border="0" cellspacing="0" cellpadding="0">
    <tr bgcolor="#FFFFFF"> 
      <td colspan="4"><div align="center"><img src="imagens/cadprod.gif" width="570" height="24"></div></td>
    </tr>
    <tr bgcolor="#FFFFFF">
      <td>&nbsp;</td>
      <td colspan="2">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="107">&nbsp;</td>
      <td colspan="2"><span class="font1">Tipo :</span> <select name="tipo" class="formulario" id="select">
          <option value="">Selecione</option>
          <?php
	  $sqltipo   = "SELECT * FROM tipo ORDER BY nome ASC";
	  $listatipo = mysql_query($sqltipo, $base);
	  while ($tipos = mysql_fetch_array($listatipo, MYSQL_ASSOC)){
	  	echo "<option class=\"formulario\" value=\"".$tipos['id']."\">".$tipos['nome']."</option>\n";
	  }
	  ?>
        </select></td>
      <td width="249"><span class="font1">Fabricante :</span> <select name="fabricante" class="formulario" id="fabricante">
          <option value="">Selecione</option>
          <?php
	  $sqlfabricante   = "SELECT * FROM fabricante ORDER BY nome ASC";
	  $listafabricante = mysql_query($sqlfabricante, $base);
	  while ($fabricantes = mysql_fetch_array($listafabricante, MYSQL_ASSOC)){
			echo "<option value=\"".$fabricantes['id']."\">".$fabricantes['nome']."</option>\n";
	 } 
	  ?>
        </select></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>&nbsp;</td>
      <td width="150">&nbsp;</td>
      <td width="105">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>&nbsp;</td>
      <td><span class="font1">Modelo :</span><br> <input name="modelo" type="text" class="formulario" id="modelo2" maxlength="100"></td>
      <td>&nbsp;</td>
      <td><span class="font1">Pre&ccedil;o :</span><br> <input name="preco" type="text" class="formulario" id="preco2" size="24" maxlength="100"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td colspan="4"> <table width="549" border="0" cellspacing="0" cellpadding="0">
          <tr> 
            <td width="21%">&nbsp;</td>
            <td width="74%"><div align="left"><span class="font1">Descri&ccedil;&atilde;o 
                :</span><br>
                <textarea name="descricao" cols="57" rows="5" class="formulario" id="textarea4"></textarea>
              </div></td>
            <td width="5%">&nbsp;</td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><div align="left"><span class="font1">Quantidade :</span> 
          <input name="quantidade" type="text" class="formulario" id="quantidade" size="3" maxlength="3">
        </div></td>
                    <td><span class="font1">Reservado : 
                      <input type="checkbox" name="reserva" value="1">
                      </span></td>
      <td><input name="submit" type="submit" class="formulario" value="Cadastrar"></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>

</form>
			</td>
          </tr>
        </table></td>
    </tr>
  </table>

    <?php require("include/rodape.php"); ?>
  
  </div>
</body>
</html>