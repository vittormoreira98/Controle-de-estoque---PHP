<?php
session_start();
	if (! isset($_SESSION['id'])){
		header("Location: index.php?erro=1");
	exit;
	}
if ($_SESSION['nivel'] < 10){
		echo "<script>alert(\"Voc� n�o tem permiss�o para acessar est� p�gina!\");history.back(-1);</script>";
		exit;
	}
//verificando se est� tudo ok
if (!isset($_POST['nometipo'])){
		echo "<script>alert(\"Tipo n�o inserido!\");history.back(-1);</script>";
		exit;
}
$tipo1 = $_POST['nometipo'];
$tipo1 = eregi_replace("\""," ",$tipo1);
if ($tipo1==""){
echo "<script>alert('Voc� deve inserir um valor no campo TIPO!');history.back(-1);</script>";
exit;
}

//tratando variavel para n�o ter furo de seguran�a
//se tiver acento tb da um trato.
$tipo2 = trim(addslashes(htmlentities($tipo1)));
$tipo2 = eregi_replace("\"","",$tipo2);
//inserindo no banco de dados
include("include/conecta.php");
$sql = "INSERT INTO tipo (nome) VALUES ('$tipo2')";
mysql_query($sql, $base);
echo "<script>alert(\"Tipo ".$tipo1." foi cadastrado com sucesso!\"); location.href = \"criatipo.php\";</script>";
mysql_close();
exit;
?>
