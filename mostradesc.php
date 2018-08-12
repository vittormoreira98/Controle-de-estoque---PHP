<?php 
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
include("include/conecta.php");

function normal($valor){
$valor = trim(addslashes(htmlentities($valor)));
return $valor;
}
$id = normal($_GET['id']);
$sql = "SELECT descricao FROM produtos WHERE id = '$id'";
$qry = mysql_query($sql, $base);
$reg = mysql_fetch_array($qry);
?>
<html>
<head>
<title>Descrição</title>
<style type="text/css">
<!-- 
p.letraG:first-letter {
font-size:250%;
color: #999999;
}
p {
text-indent: 20px;
}

-->
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#666666">
<div align="center"><font color="#FFFFFF" class="font1"><strong>:: Descrição ::</strong></font></div></td>
  </tr>
  <tr>
    <td>
      </td>
  </tr>
  <tr>
    <td><p style="border-top:1px dotted #FF0000">
</p><p class="letraG"><font class="font1">
<?= stripslashes(nl2br($reg['descricao'])) ?></font></p>
	</td>
  </tr>
</table>
</body>
</html>


