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
//Arquivo que envia not�cia pra extranet
include("include/conecta.php");
//verificando os campos do formul�rio
if(!isset($_POST['texto'])){
echo "<script>alert('Preencha todos os Campos!');history.back(-1);</script>";
exit;
}
if(empty($_POST['texto'])){
echo "<script>alert('Preencha todos os Campos!');history.back(-1);</script>";
exit;
}
if(!isset($_POST['link'])){
echo "<script>alert('Preencha todos os Campos!');history.back(-1);</script>";
exit;
}
if(empty($_POST['link'])){
echo "<script>alert('Preencha todos os Campos!');history.back(-1);</script>";
exit;
}
$texto = trim(addslashes(htmlentities($_POST['texto'])));
$link  = trim(addslashes(htmlentities($_POST['link'])));
$data1  = date("d/m");
$data2  = date("H:i");
$datajunta = "[".$data1." - ".$data2."]";
$sql = "INSERT INTO noticias (data,texto,link) VALUES ('$datajunta','$texto','$link')";
mysql_query($sql,$base);
echo "<script>alert('Not�cia cadastrada com sucesso!');history.back(-1);</script>";
exit;
?>