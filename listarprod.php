<?php require("include/arruma_link.php");
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
	if(!isset($_GET['catid'])){
		echo "<script>alert('Escolha uma categoria!');history.back(-1);</script>";
		exit;
	}
	$tipo = normal($_GET['catid']);
if (isset($_GET['order'])){
	$ordena = normal($_GET['order']);
	$sql = "SELECT fabricante.nome as fabri_nome, tipo.nome as tipo_nome, produtos.id, produtos.modelo, produtos.preco, produtos.reserva, produtos.quantidade
FROM fabricante, tipo, produtos
WHERE
fabricante.id = produtos.fabricante AND tipo.id = produtos.tipo ORDER BY '$ordena'";
} else {
$sql = "SELECT fabricante.nome as fabri_nome, tipo.nome as tipo_nome, produtos.id, produtos.modelo, produtos.preco, produtos.reserva, produtos.quantidade
FROM fabricante, tipo, produtos
WHERE
fabricante.id = produtos.fabricante AND tipo.id = produtos.tipo AND produtos.tipo = '$tipo' ORDER BY fabri_nome ASC";
}

$sql = "SELECT * FROM produtos WHERE tipo = '$tipo' ORDER BY modelo ASC"; 
$qry = mysql_query($sql, $base);
$linhas = mysql_num_rows($qry);
	if ($linhas < 1){
	echo "<script>alert('Não existem produtos cadastrados nesta categoria.'); location.href='intranet.php';</script>";
	exit;
	}
 ?>
<html>
<head>
<title>EVOLUTION - INTRANET</title>
<script language="JavaScript">
function checar(pagina,texto) { if (confirm("DELETAR ESTE PRODUTO ?")==true) { window.location=pagina; } }

function abrir(URL) {

   var width = 250;
   var height = 200;

   var left = 99;
   var top = 99;

   window.open(URL,'Descrição', 'width='+width+', height='+height+', top='+top+', left='+left+', scrollbars=yes, status=no, toolbar=no, location=no, directories=no, menubar=no, resizable=no, fullscreen=no');

}

</script>
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
            <td height="3" colspan="3"><img src="file:///C|/www/imagens/pixel.gif" width="2"></td>
          </tr>
          <tr> 
            <td height="307" colspan="3" valign="top"> <div align="center">
			    <table width="590">
                  <tr>
                    <td width="578"><h2><?= $_GET['catnome'] ?> - <font color="#FF0000">Atualizado em 
					<? $filename = "./dataatualizada/data.txt";
						$handle = fopen($filename, "r");
						$conteudo = fread($handle, filesize($filename));
						fclose($handle); 
						echo $conteudo;
					?>
					</font></h2></td>
                  </tr></table>
                <table width="588" border="0" cellspacing="0" cellpadding="0">
				<tr><td></tr>
                  <tr bgcolor="#666666"> 
                    <td width="107"><strong><font color="#FFFFFF" class="font1">Fabricante</font></strong></td>
                    <td width="176"><strong><font color="#FFFFFF" class="font1">Modelo</font></strong></td>
                    <td width="94"><strong><font color="#FFFFFF" class="font1">Preço</font> 
                      </strong></td>
                    <td width="93"> <div align="left"><strong><font color="#FFFFFF" class="font1">Descri&ccedil;&atilde;o</font></strong></div></td>
                    <td width="43"><div align="center"><strong><font color="#FFFFFF" class="font1">Qtde.</font></strong></div></td>
                    <? if($_SESSION['nivel'] >= 10){ echo "<td width=\"38\"></td>"; } ?>
                  </tr>
                  <tr> 
                    <td width="107"><font class="font1">&nbsp;</font></td>
                    <td width="176"><font class="font1">&nbsp;</font></td>
                    <td width="94"><font class="font1">&nbsp;</font> </td>
                    <td width="93"><div align="center"></div></td>
                    <td width="43"><div align="center"></div></td>
                    <td width="75"></td>
                  </tr>
                  <?php

	$i = 0;
	while($reg = mysql_fetch_array($qry, MYSQL_ASSOC)){
?>
                  <tr onMouseOver="this.style.backgroundColor='#C1FFC1'" onMouseOut="this.style.backgroundColor='<?=($i % 2 == 0 ? "#F7F7F7" : "#E6E6E6")?>'" bgcolor="<?=($i % 2 == 0 ? "#F7F7F7" : "#E6E6E6")?>"> 
                    <td width="107"><font class="font1"> 
                      <? 
					  echo $reg['fabri_nome'];
					  ?>
                      </font></td>
                    <td width="176"><font class="font1"> 
                      <?= $reg['modelo'] ?>
                      </font></td>
                    <td width="94"><font class="font1">R$ 
                      <?= $reg['preco'] ?>
                      </font> </td>
                    <td width="93"> <div align="left"><span class="linkes1"><a href="javascript:abrir('mostradesc.php?id=<?= $reg['id'] ?>');">Descri&ccedil;&atilde;o 
                        <?php 
					if ($reg['reserva'] == "S"){
					echo "<img src=\"imagens/reserva.gif\" border=\"0\" alt=\"Reservado\">";
					}
					?>
                        </a></span></div></td>
                    <td width="43"><div align="center"><font class="font1"> 
                        <?= $reg['quantidade'] ?>
                        </font></div></td>
                        <?php 
					if ($_SESSION['nivel'] >= 10){ ?>
					<td width="75" align="center">
<div align="center"> <font class="font1"> 
                        <?php 
					
					echo "<a href=\"controlestoque.php?id=".$reg['id']."&acao=1\"><img alt=\"+1\" src=\"imagens/pracima.gif\" border=\"0\"\"></a> ";
					echo "<a href=\"controlestoque.php?id=".$reg['id']."&acao=2\"><img alt=\"-1\" src=\"imagens/prabaixo.gif\" border=\"0\"\"></a> ";
					echo "<a href=\"javascript:checar('delprod.php?id=".$reg['id']."');\"><img src=\"imagens/delete.gif\" border=\"0\" alt=\"Deletar\"></a> ";
					echo "<a href=\"alteraproduto.php?id=".$reg['id']."\"><img src=\"imagens/atualizar.jpg\" border=\"0\" alt=\"Alterar\"></a>";
					}
					?>
                        </font> </div></td>
                  </tr>
                  <?php
  $i += 1;
  }
  ?>
                </table>
			    <p><img src="imagens/reserva.gif" border="0"><font class="font1"> = Produto reservado. Para Maiores detalhes veja a descrição.</font></p>
              </div></td>
          </tr>
        </table></td>
    </tr>
  </table>

    <?php require("include/rodape.php"); ?>
  
  </div>
</body>
</html>
