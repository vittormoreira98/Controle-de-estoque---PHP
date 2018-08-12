<?php
require("include/arruma_link.php");
session_start();
if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}
if ($_SESSION['nivel'] < 10){
	echo "<script>alert('Você não tem permissão para acessar está página!');history.back(-1);</script>";
	exit;
}
include("include/conecta.php");
if ((!isset($_POST['tipoold'])) || !isset($_POST['idtipo'])){
		echo "<script>alert(\"Preencha corretamente!\");history.back(-1);</script>";
		exit;
}
$novonome = trim(addslashes($_POST['tipoold']));
$id 	  = trim(addslashes($_POST['idtipo']));

$sqlteste = "SELECT * FROM tipo WHERE id = '$id'";
$qryteste = mysql_query($sqlteste, $base);
$existe_reg = mysql_num_rows($qryteste);
	if ($existe_reg < 1){
		echo "<script>alert('Este TIPO de produto não existe!');location.href = 'criatipo.php';</script>";
		exit;
	}	

$sql = "UPDATE tipo SET nome = '$novonome' WHERE id = '$id'"; 
mysql_query($sql, $base);

echo "<script>alert('Tipo de Produto atualizado com sucesso!'); location.href = 'criatipo.php';</script>";
exit;

?>