<?php require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
	if ($_SESSION['nivel'] < 10){
		echo "<script>alert('Você não tem permissão para acessar está página!');history.back(-1);</script>";
		exit;
	}
 ?>
<?php
	if (!isset($_GET['id'])){
		echo "<script>alert(\"Preencha corretamente!\");history.back(-1);</script>";
		exit;
	}
	$idmodificar = $_GET['id'];
	$idmodificar = trim(addslashes($idmodificar));
	include("include/conecta.php");
	$sqlteste = "SELECT * FROM tipo WHERE id = '$idmodificar'";
	$qryteste = mysql_query($sqlteste, $base);
	$existe_reg = mysql_num_rows($qryteste);
	if ($existe_reg < 1){
		echo "<script>alert('Este TIPO de produto não existe!');location.href = 'criatipo.php';</script>";
		exit;
	}	
	$sql = "SELECT * FROM tipo WHERE id = '$idmodificar'";
	$exe = mysql_query($sql, $base);
	$reg = mysql_fetch_array($exe, MYSQL_ASSOC);
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
        <?php include("include/menu_lateral.php"); ?></td>
      <td colspan="2" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          
          <tr> 
            <td height="307" colspan="3" align="center" valign="top"> <div align="center"> 
              <table width="560" border="0" cellspacing="0" cellpadding="0">
                <tr> 
                  <td colspan="3"><img src="imagens/criatipo.gif"></td>
  </tr>
  <tr> 
    <td width="58">&nbsp;</td>
    <td width="412" rowspan="4"><div align="center">
<p class="font1"><br><br>Alterar Tipo</p>
        <form name="form1" method="post" action="tipomuda.php">
          <font class="font1">Tipo : </font> 
          <input type="text" name="tipoold" value="<?= $reg['nome'] ?>" class="formulario">
		  <input type="hidden" name="idtipo" value="<?= $reg['id'] ?>">
          <input type="submit" value="Alterar" class="formulario">
        </form>
        <p>&nbsp;</p>
      </div></td>
    <td width="90">&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

			</td>
          </tr>
        </table></td>
    <td height="13"></tr>
  </table>

    <?php require("include/rodape.php"); ?>
  
  </div>
</body>
</html>