<?php require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
if ($_SESSION['nivel'] < 10){
echo "<script>alert(\"Você não tem permissão para acessar está página!\");history.back(-1);</script>";
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
<link href="file:///C|/www/css/estilos.css" rel="stylesheet" type="text/css">
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
            <td height="3" colspan="3"><img src="file:///C|/www/imagens/pixel.gif" width="2"></td>
          </tr>
          <tr> 
            <td height="307" colspan="3" valign="top"> <div align="center">
			<form method="post" action="envianoticia.php">
                  <table width="557" border="0" cellspacing="0" cellpadding="0">
                    <tr> 
                    <td colspan="2"><img src="imagens/noticias_topo.gif" width="570" height="24"></td>
                  </tr>
                  <tr> 
                    <td width="234">&nbsp;</td>
                    <td width="336">&nbsp;</td>
                  </tr>
                  <tr> 
                      <td height="31" align="right"><font class="font1">Texto : </font></td>
                    <td><input name="texto" type="text" class="formulario" id="texto"></td>
                  </tr>
                  <tr> 
                      <td height="28" align="right"><font class="font1">Link : </font></td>
                    <td><input name="link" type="text" class="formulario" id="link" value="http://"></td>
                  </tr>
                  <tr> 
                    <td>&nbsp;</td>
                    <td><input type="submit" value="Enviar" class="formulario"></td>
                  </tr>
                </table>
              </form></div></td>
          </tr>
        </table></td>
    </tr>
  </table>

    <?php require("include/rodape.php"); ?>
  
  </div>
</body>
</html>