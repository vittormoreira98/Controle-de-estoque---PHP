<html>
<head>
<title>Controle de Estoque - Desenvolvido por Rodrigo Urbinati Maia - rodurma@yahoo.com.br</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/estilos.css" rel="stylesheet" type="text/css">
<style type="text/css">
#meio {
	position:absolute;
	top:50%;
	left:50%;
	width:250px;
	height:250px;
	margin-left:-125px;
	margin-top:-125px;
	text-align:left;
	border: 1px solid #000000;
	}
</style>

</head>

<body>
<div id="meio">
  <br>
  <p><center><img src="imagens/img_logo.gif" border="0"></center><br>
  </p>
  <center>
<form action="testar.php" method="post" name="formulario">
<font class="font3"><?php if (isset($_GET['errologin'])){ echo "Senha inválida!";}
						   if (isset($_GET['erro'])){ echo "Coloque uma senha válida primeiro!";} 
//aqui cria um log de acesso.		
$arquivo = "./dataatualizada/log.txt";
$linha1 = "[".date("d/m/Y - H:i:s")."]  ";
$linha2 = $_SERVER['REMOTE_ADDR']."  ";
$linha3 = $_SERVER['PHP_SELF']."\n";
$texto  = $linha1.$linha2.$linha3;
$abrindo = fopen($arquivo, 'a+');
fwrite($abrindo, $texto);
fclose($abrindo);
						   ?></font>
<br>
      <p><font class="font1">Senha:</font>
      
        <input type="password" name="senha" class="formulario">
<script language="JavaScript">
	document.formulario.senha.focus();
</script>
        <input type="submit" value="ok" class="formulario">
        <br>
        </p>
    </form>
    <br>
      <font class="font2">Coloque sua senha e clique em ok.</font> </p>
  </center>
</div>

</body>
</html>
