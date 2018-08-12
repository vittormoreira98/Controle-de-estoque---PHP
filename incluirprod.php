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
	if ((!isset($_POST['tipo'])) || (!isset($_POST['fabricante'])) || (!isset($_POST['modelo'])) || (!isset($_POST['preco'])) || (!isset($_POST['descricao'])) || (!isset($_POST['quantidade']))){
		echo "<script>alert('Preencha todos os campos!');history.back(-1);</script>";
		exit;
	}
	if (($_POST['tipo'] == "") || ($_POST['fabricante'] == "") || ($_POST['modelo'] == "") || ($_POST['preco'] == "") || ($_POST['descricao'] == "") || ($_POST['quantidade'] == "")){
		echo "<script>alert('Preencha todos os campos!');history.back(-1);</script>";
		exit;
	}
	if (!is_numeric($_POST['preco'])){
		echo "<script>alert('Campo Preço deve ser numérico! \\n Verifique se utilizou , no lugar de . para separar centavos.');history.back(-1);</script>";
		exit;
	}
		if (!is_numeric($_POST['quantidade'])){
		echo "<script>alert('Campo Quantidade deve ser numérico!');history.back(-1);</script>";
		exit;
	}
	if ($_POST['quantidade'] < 1){
		echo "<script>alert('Campo Quantidade deve ser Positivo!');history.back(-1);</script>";
		exit;
	}	
	
	function normal($valor){
	$valor = trim(addslashes(htmlentities($valor)));
	return $valor;
	}
	//Pegando as variáveis etc.
	$tipo       = normal($_POST['tipo']);
	$fabricante = normal($_POST['fabricante']);
	$modelo     = normal($_POST['modelo']);
	$preco      = normal($_POST['preco']);
	$descricao  = normal($_POST['descricao']);
	$quantidade = normal($_POST['quantidade']);
	$preco      = ereg_replace(",", ".", $preco);
	@$id         = normal($_POST['id']);
	
	
	include("include/conecta.php");
	if (!isset($_GET['acao'])){
		if((isset($_POST['reserva'])) AND ($_POST['reserva'] == 1)){
			$sql = "INSERT INTO produtos (tipo, fabricante, modelo, preco, descricao, reserva, quantidade) VALUES ('$tipo','$fabricante','$modelo','$preco','$descricao','S','$quantidade')";
		} else {
	$sql = "INSERT INTO produtos (tipo, fabricante, modelo, preco, descricao, quantidade) VALUES ('$tipo','$fabricante','$modelo','$preco','$descricao','$quantidade')";
	}
	mysql_query($sql, $base);
	$arquivo = "./dataatualizada/data.txt";
	$texto = date("d/m/Y - H:i:s");
	$abrindo = fopen($arquivo, 'w+');
	fwrite($abrindo, $texto);
	fclose($abrindo);
	echo "<script>alert('Produto cadastrado com sucesso!');history.back(-1);</script>";
	} else {
	if((isset($_POST['reserva'])) AND ($_POST['reserva'] == 1)){
	$sqlupdate = "UPDATE produtos SET tipo = '$tipo', fabricante = '$fabricante', modelo = '$modelo', preco = '$preco', descricao = '$descricao', reserva = 'S', quantidade = '$quantidade' WHERE id = '$id'";
	} else {
	$sqlupdate = "UPDATE produtos SET tipo = '$tipo', fabricante = '$fabricante', modelo = '$modelo', preco = '$preco', descricao = '$descricao',  reserva = 'N',quantidade = '$quantidade' WHERE id = '$id'";
	}
	mysql_query($sqlupdate, $base);
	$arquivo = "./dataatualizada/data.txt";
	$texto = date("d/m/Y - H:i:s");
	$abrindo = fopen($arquivo, 'w+');
	fwrite($abrindo, $texto);
	fclose($abrindo);
	echo "<script>alert('Produto alterado com sucesso!');history.back(-1);</script>";
	}
?>