<!--
<div class="niebieskawe_tlo_prawe">dzi� jest
-->
<p class="tlo_niebieskawe_prawe">dzi� jest
<?php
$data_teraz_rok = date("Y"); 
$data_teraz_miesiac = date("m");
$data_teraz_dzien = date("j");
 switch ( $data_teraz_miesiac )
 {
  case 1: $data_teraz_miesiac_nazwa = "stycze�"; break;
  case 2: $data_teraz_miesiac_nazwa = "luty"; break;
  case 3: $data_teraz_miesiac_nazwa = "marzec"; break;
  case 4: $data_teraz_miesiac_nazwa = "kwiecie�"; break;
  case 5: $data_teraz_miesiac_nazwa = "maj"; break;
  case 6: $data_teraz_miesiac_nazwa = "czerwiec"; break;
  case 7: $data_teraz_miesiac_nazwa = "lipiec"; break;
  case 8: $data_teraz_miesiac_nazwa = "sierpien"; break;
  case 9: $data_teraz_miesiac_nazwa = "wrzesie�"; break;
  case 10: $data_teraz_miesiac_nazwa = "pa�dziernik"; break;
  case 11: $data_teraz_miesiac_nazwa = "listopad"; break;
  case 12: $data_teraz_miesiac_nazwa = "grudzie�"; break;
 }
 
echo("$data_teraz_dzien $data_teraz_miesiac_nazwa $data_teraz_rok"); 
?>
</p>
<!-- </div> --> 
  <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#162C8C">
  <tr>
  <td><img src="img/piksel.gif" alt="" width="50" height="100" border="0" /></td>
  <td> <a href="./index.php?link=main"><img src="img/logo.png" width="350" height="100" border="0" alt="WSO" /></a></td>
  <td><h2 class="nazwa">Wypo�yczalnia Samochod�w Osobowych</h2></td>
  </tr>  
  </table>
  <!-- <img src="img/piksel.gif" alt="" width="900" height="25" /> -->
  <!-- <div class="niebieskawe_tlo">&nbsp;</div> -->
  <table width="100%" height="30" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#ffffff" id="nawigacja_glowna">
  <tr>
  <td width="5%"></td>
  <!-- <td width=170 class=bl onmouseover="onLink(this,'','bla')" onmouseout="offLink(this,'bl')" onclick="document.location='regulamin.php'">Regulamin</td> -->
  <td width="15%" onmouseover="style.background='#ffffff'" onmouseout="style.background='#82B8FB'"><a href="./index.php?link=main">G��wna</a></td>
  <td width="15%" onmouseover="style.background='#ffffff'" onmouseout="style.background='#82B8FB'"><a href="./index.php?link=oferta">Samochody</a></td>  
  <td width="15%" onmouseover="style.background='#ffffff'" onmouseout="style.background='#82B8FB'"><a href="./index.php?link=promocje">Promocje</a></td>  
  <td width="15%" onmouseover="style.background='#ffffff'" onmouseout="style.background='#82B8FB'"><a href="./index.php?link=regulamin">Regulamin</a></td>
  <td width="15%" onmouseover="style.background='#ffffff'" onmouseout="style.background='#82B8FB'"><a href="./index.php?link=o_firmie">O firmie</a></td>
  <td width="15%" onmouseover="style.background='#ffffff'" onmouseout="style.background='#82B8FB'"><a href="./index.php?link=kontakt">Kontakt</a></td>

  <td width="5%"></td>
  </tr>
  </table>
  <div class="granatowe_tlo">&nbsp;</div>
 