<?php require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
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
                <table width="607" border="0" cellspacing="0" cellpadding="0">
                  <tr> 
                    <td width="399" rowspan="2" valign="top"><img src="imagens/informacoes.jpg" width="395" height="18"><br>
                    </td>
                    <td valign="top" bgcolor="#C3C3C3"><div align="left"><img src="imagens/noticia.jpg" width="208" height="18"><br>
                        <marquee direction="up" scrollamount="1" width="208" height="165">
                        <?php
                      $sqlnoticia = "SELECT * FROM noticias ORDER BY id DESC LIMIT 0,10"; 
					  $qrynot = mysql_query($sqlnoticia,$base);
					  while($regnot = mysql_fetch_array($qrynot, MYSQL_ASSOC)){
					  echo "<span  class='linkes2'><a href='".$regnot['link']."' target='_blank'>";
					  echo $regnot['data']." ".stripslashes($regnot['texto']);
					  echo "</a></span><br><br>";
					  }
					  ?>
                        </marquee>
                      </div></td>
                  </tr>
                  <tr> 
                    <td width="208" height="108" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
                      <p>&nbsp;</p></td>
                  </tr>
                </table>
              </div></td>
          </tr>
        </table></td>
    </tr>
  </table>

    <?php require("include/rodape.php"); ?>
  
  </div>
</body>
</html>
