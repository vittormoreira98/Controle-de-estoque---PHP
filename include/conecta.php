<?php
	//include com os dados para conectar com o mysql

	
	@ $base = mysql_connect('localhost','masterdobaile','chicao');
	if (mysql_errno()){
	echo "ERRO : " . mysql_errno() . "</body></html>";
	exit;
	}
	
	mysql_select_db("bdgrp_mod3c_03", $base);

?>















