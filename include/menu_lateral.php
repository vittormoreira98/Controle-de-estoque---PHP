<div id="menubv"> 
  <ul>
<?php 
	if ($_SESSION['nivel'] == 10){ 
		echo "<li><a href=\"cadastroproduto.php\" title=\"Verificar, alterar Pre�os\">Cadastrar Produto</a></li>";
		echo "<li><a href=\"criatipo.php\" title=\"Verificar, alterar Pre�os\">Verificar Tipos</a></li>"; 
		echo "<li><a href=\"criafabricante.php\" title=\"Verificar, alterar Pre�os\">Verificar Fabricante</a></li>";
		echo "<li><a href=\"noticia.php\" title=\"Incluir Not�cias\">Not�cias</a></li>";
		echo "</ul><br><br>";
	} 
	
	echo "<ul>";
	include("include/conecta.php");
	$sqlmenu = "SELECT * FROM tipo ORDER BY nome ASC";
	$executa = mysql_query($sqlmenu, $base);
	while ($regmenu = mysql_fetch_array($executa, MYSQL_ASSOC)){
	echo "<li><a href=\"listarprod.php?catid=".$regmenu['id']."&catnome=".$regmenu['nome']."\">".$regmenu['nome']."</a></li>";
	}
	echo "</ul><br><br>";
?>
<ul>
<li>
<a href="sair.php" title="Sair da �rea Administrativa da Intranet">Sair</a>
</li>
</ul>
</div>
