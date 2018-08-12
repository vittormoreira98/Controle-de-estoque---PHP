<?php
	session_start();
	if (! isset($_SESSION['id'])){
header("Location: index.php?erro=1");
exit;
}

	if ($_SESSION['nivel'] < 10){
			echo "<script>alert('Você não tem permissão para acessar está página!');history.back(-1);</script>";
	exit;
	}
	if (! isset($_GET['id'])){
	echo "<script>alert('Tipo não selecionado!'); history.back(-1);</script>";
	exit;
	}
	
	include("include/conecta.php");
	
	$id = $_GET['id'];
	$id = trim(addslashes($id));
	
	//verificando se o tipo existe
	$sql = "SELECT * FROM produtos where id = '$id'";
	$tabela = mysql_query($sql, $base);
	$registros = mysql_fetch_array($tabela);
	$nometipo = $registros['id'];
	if ($registros < 1){
		echo "<script>alert('Este produto não existe!'); location.href = 'intranet.php';</script>";
		exit;
	} else {
	$delete = "DELETE FROM produtos WHERE id = '$id'";
	mysql_query($delete, $base);
	$arquivo = "./dataatualizada/data.txt";
	$texto = date("d/m/Y - H:i:s");
	$abrindo = fopen($arquivo, 'w+');
	fwrite($abrindo, $texto);
	fclose($abrindo);
	echo "<script>alert('Produto deletado com sucesso!'); location.href = 'intranet.php';</script>";
	exit;
	}
	


?>