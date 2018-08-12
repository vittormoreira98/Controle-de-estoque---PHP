<?php
$contadorsql = "SELECT total FROM contador WHERE id = '1'" ;
$qrytotal = mysql_query($contadorsql,$base);
$regcont = mysql_fetch_array($qrytotal, MYSQL_ASSOC);
$num_visita = $regcont['total'];
$mais_um_cont = $num_visita + 1;
$updatecont = "UPDATE contador SET total = '$mais_um_cont' WHERE id = '1'";
mysql_query($updatecont,$base);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr bgcolor="#CCCCCC"> 
    <td width="50%"><font size="2" face="Arial, Helvetica, sans-serif"><strong>Desenvolvido 
      por <a href="mailto:rodurma@hotmail.com"><font color="#333333">Rodrigo Urbinati 
      Maia</font></a></strong></font></td>
    <td width="50%"> 
      <div align="right"><font size="2" face="Arial, Helvetica, sans-serif"><strong><? echo $num_visita; ?></strong></font></div></td>
  </tr>
</table>
