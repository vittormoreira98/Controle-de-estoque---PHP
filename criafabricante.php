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
<html>
<head>
<title>EVOLUTION - INTRANET</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/estilos.css" rel="stylesheet" type="text/css">
<script>function checar(pagina,texto) { if (confirm("DELETAR ESTE FABRICANTE ?")==true) { window.location=pagina; } }</script>
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
<script language="JavaScript">
	function mudacelula(){
		var cor = "#FFFF75";
		var elemento = document.getElementById("teste");
		elemento.style.backgroundColor = cor;
	}
</script>
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
            <td height="307" colspan="3" valign="top"><div align="center">
                <table width="560" height="97" border="0" cellpadding="0" cellspacing="0">
                  <tr> 
                    <td height="19" valign="top"><img src="imagens/fabricante.gif"></td>
  </tr>
  <tr> 
    <td height="53"> <div align="center"> 
        <form name="form1" method="post" action="incluirfabricante.php">
          <p>&nbsp;</p>
          <p><font class="font1">Fabricante :</font> 
            <input type="text" name="nometipo" class="formulario">
            <input type="submit" value="CRIAR" class="formulario">
          </p>
        </form>
      </div></td>
  </tr>
  <tr> 
    <td height="19"> 
      <?php
	include("include/conecta.php");
	$sql = "SELECT * FROM fabricante ORDER BY id ASC";
	$qry = mysql_query($sql, $base);
	$totalreg = mysql_num_rows($qry);
	$i = 0; 
	?>
      <div align="center"> 
                        <table width="440" border="0" cellpadding="0" cellspacing="0">
            <?php
			if ($totalreg < 1){
			echo "<tr><td width=\"440\"><div align=\"center\"><font class=\"font1\"><i><br><br>Nenhum <u>Fabricante</u> cadastrado!</i></font></div></td></tr>";
			} else {
			
	while ($reg = mysql_fetch_array($qry, MYSQL_ASSOC)){
	?>
	
           <tr id="teste" onMouseOver="this.style.backgroundColor='#C1FFC1'" onMouseOut="this.style.backgroundColor='<?=($i % 2 == 0 ? "#F7F7F7" : "#E6E6E6")?>'" bgcolor="<?=($i % 2 == 0 ? "#F7F7F7" : "#E6E6E6")?>"> 
            <td width="358" height="19"><font class="font1"><?php echo $reg['nome']; ?></font></td>
            <td width="36"><div align="center"><a href="alterfabricante.php?id=<?= $reg['id'] ?>"><img src="imagens/atualizar.jpg" border="0" alt="Alterar"></a></div></td>
            <td width="36"><div align="center"><a href="javascript:checar('delfabricante.php?id=<?= $reg['id'] ?>');"><img src="imagens/delete.gif" border="0" alt="Deletar"></a></div></td>
          </tr>
          <?php
	$i++;
		}
	}
	?>
        </table><p></p>
      </div></td>
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