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

$novonome = trim(addslashes($_POST['tipoold']));
$id 	  = trim(addslashes($_POST['idtipo']));

$sqlteste = "SELECT * FROM fabricante WHERE id = '$id'";
$qryteste = mysql_query($sqlteste, $base);
$existe_reg = mysql_num_rows($qryteste);
	if ($existe_reg < 1){
		echo "<script>alert('Este FABRICANTE não existe!');location.href = 'criafabricante.php';</script>";
		exit;
	}	

$sql = "UPDATE fabricante SET nome = '$novonome' WHERE id = '$id'"; 
mysql_query($sql, $base);

echo "<script>alert('Fabricante atualizado com sucesso!'); location.href = 'criafabricante.php';</script>";
exit;

?>