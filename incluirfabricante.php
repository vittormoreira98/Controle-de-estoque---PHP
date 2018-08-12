<?php
session_start();
	if (! isset($_SESSION['id'])){
		header("Location: index.php?erro=1");
	exit;
	}
if ($_SESSION['nivel'] < 10){
		echo "<script>alert(\"Você não tem permissão para acessar está página!\");history.back(-1);</script>";
		exit;
	}
//verificando se está tudo ok
if (!isset($_POST['nometipo'])){
		echo "<script>alert(\"Fabricante não inserido!\");history.back(-1);</script>";
		exit;
}
$tipo1 = $_POST['nometipo'];
$tipo1 = eregi_replace("\""," ",$tipo1);
if ($tipo1==""){
echo "<script>alert('Você deve inserir um valor no campo Fabricante!');history.back(-1);</script>";
exit;
}

//tratando variavel para não ter furo de segurança
//se tiver acento tb da um trato.
$tipo2 = trim(addslashes(htmlentities($tipo1)));
$tipo2 = eregi_replace("\"","",$tipo2);
//inserindo no banco de dados
include("include/conecta.php");
$sql = "INSERT INTO fabricante (nome) VALUES ('$tipo2')";
mysql_query($sql, $base);
echo "<script>alert(\"Fabricante ".$tipo1." foi cadastrado com sucesso!\"); location.href = \"criafabricante.php\";</script>";
mysql_close();
exit;
?>
