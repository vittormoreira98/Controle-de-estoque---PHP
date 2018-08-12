<?php
		function normal($valor){
			$valor = trim(addslashes(htmlentities($valor)));
			return $valor;
		}

		session_start();
		if (! isset($_SESSION['id'])){
			header("Location: index.php?erro=1");
			exit;
		}
		if ($_SESSION['nivel'] < 10){
			echo "<script>alert('Você não tem permissão para acessar está página!');history.back(-1);</script>";
			exit;
		}
		
		if (!isset($_GET['id'])){
			echo "<script>alert('Primeiro escolha um produto!');history.back(-1);</script>";
			exit;
		}
		if (!isset($_GET['acao'])){
			echo "<script>alert('Escolha uma ação!');history.back(-1);</script>";
			exit;
		}
		//verifica existencia do produto
		$id = normal($_GET['id']);
		$acao = normal($_GET['acao']);
		
		
		include("include/conecta.php");
		$versetem = "SELECT quantidade FROM produtos WHERE id = '$id'";
		$qryteste = mysql_query($versetem, $base);
		$existe = mysql_num_rows($qryteste);
		if($existe < 1){
			echo "<script>alert('Este produto não existe!');history.back(-1);</script>";
			exit;
		} else {
			$reg = mysql_fetch_array($qryteste, MYSQL_ASSOC);
			if(($reg['quantidade'] == 0) && $acao == 2){
			echo "<script>alert('Este produto está com estoque zerado! Ação cancelada.');history.back(-1);</script>";
			exit;
			}
			if($acao == 1){
				$reg['quantidade'] += 1;
				$reg = $reg['quantidade'];
				$update = "UPDATE produtos SET quantidade = '$reg' WHERE id = '$id'";
				mysql_query($update, $base);
				$arquivo = "./dataatualizada/data.txt";
				$texto = date("d/m/Y - H:i:s");
				$abrindo = fopen($arquivo, 'w+');
				fwrite($abrindo, $texto);
				fclose($abrindo);
				echo "<script>alert('Produto atualizado!');history.back(-1);</script>";
				exit;
			} elseif ($acao == 2)  {
					$reg['quantidade'] -= 1;
				$reg = $reg['quantidade'];
				$update = "UPDATE produtos SET quantidade = '$reg' WHERE id = '$id'";
				mysql_query($update, $base);
				$arquivo = "./dataatualizada/data.txt";
				$texto = date("d/m/Y - H:i:s");
				$abrindo = fopen($arquivo, 'w+');
				fwrite($abrindo, $texto);
				fclose($abrindo);
				echo "<script>alert('Produto atualizado!');history.back(-1);</script>";
				exit;
			} else {
			
		echo "<script>alert('Ação Errada!');history.back(-1);</script>";
				exit;
			}
			
			
		} 



?>