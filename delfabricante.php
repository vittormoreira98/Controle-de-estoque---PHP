<?php
	session_start();
	if (! isset($_SESSION['id'])){
		header("Location: index.php?erro=1");
		exit;
	}
	if ($_SESSION['nivel'] < 10){
			echo "<script>alert('Voc� n�o tem permiss�o para acessar est� p�gina!');history.back(-1);</script>";
	exit;
	}
	if (! isset($_GET['id'])){
	echo "<script>alert('Fabricante n�o selecionado!'); location.href = 'criafabricante.php';</script>";
	exit;
	}
	
	include("include/conecta.php");
	
	$id = $_GET['id'];
	$id = trim(addslashes($id));
	
	//verificando se o fabricante existe
	$sql = "SELECT * FROM fabricante where id = '$id'";
	$tabela = mysql_query($sql, $base);
	$registros = mysql_fetch_array($tabela);
	$nometipo = $registros['id'];
	if ($registros < 1){
		echo "<script>alert('Este Fabricante n�o existe!'); location.href = 'criafabricante.php';</script>";
		exit;
	} else {
	$verifica = "SELECT * FROM produtos WHERE fabricante = '$nometipo'";
	$qry2 = mysql_query($verifica, $base);
	$numero_de_linhas = mysql_num_rows($qry2);
	if($numero_de_linhas < 1){
	$delete = "DELETE FROM fabricante WHERE id = '$id'";
	mysql_query($delete, $base);
	echo "<script>alert('Fabricante deletado com sucesso!'); location.href = 'criafabricante.php';</script>";
	exit;
	} else {
	echo "<script>alert('Este fabricante n�o pode ser deletado. Ele est� vinculado com algum produto!'); location.href = 'criafabricante.php';</script>";
	exit;
	}
	}
	


?>