<!--
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
  <td align="center" class="granatowe_tlo"> 
   <span class="tekst_bialy">
   2007 &copy; Wypo¿yczalnia Samochodów Osobowych
   </span>
   </td>
  </tr>
</table>
-->

<?php

echo('<p class="tlo_granat">2007-' . date(Y) . ' &copy; Wypo¿yczalnia Samochodów Osobowych</p>');

?>


<?php
							//zakoñcznie po³¹czenia z BD
mysql_close( $db_link );

?>