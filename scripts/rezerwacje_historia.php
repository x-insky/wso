<h3>Historia rezerwacji</h3>
<br />

<?php

 if ( SprawdzUprawnieniaAdmina() )
 {
 $id_uzytkownika = $_SESSION['id'];
 $data_teraz = date( "Y-m-d" ); 	// "d" nie "j" !!!
 
 $kwerenda = "SELECT `ID_rezerwacji`, `fk_autoID`, `dataRez`, `dataPocz`, `dataKonc` FROM rezerwacje_tbl WHERE `fk_userID`=$id_uzytkownika ORDER BY `dataRez` DESC";

$rezultat = mysql_query ( $kwerenda, $db_link );

 if ( $rezultat )
 {
 $ile_wierszy = mysql_num_rows( $rezultat ); 
  if ( ! $ile_wierszy )
  {
  echo("<h4>Brak z�o�onych rezerwacji!</h4>");
  } 
  else
  {
  $ile = 0;  
  
  echo("<table width=\"450\" align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"white\">");
  echo("<tr>");
  echo('<td width="35%" bgcolor="#82B8FB" align="center"><b>Marka i model auta</b></td>');
  echo('<td width="25%" bgcolor="#82B8FB" align="center"><b>Data z�o�enia rezerwacji </b></td>');
  echo('<td bgcolor="#82B8FB" align="center"><b>Termin rezerwacji </b></td>');
  echo("</tr>");
  echo("</table>"); //tabela z nazwami kolumn
  echo("<br />");
	
	  while ( $wynik = mysql_fetch_row( $rezultat ) )
	  {
	  $ile++;
	  $biezace = false;
	  $nr_rezerwacji = $wynik[0];
	  $auto_id = $wynik[1]; 
	  $data_rezerwacji = $wynik[2];
	  $data_p = $wynik[3];
	  $data_k = $wynik[4];
	  
	    if ( ( $data_p >= $data_teraz ) && ( $data_k >= $data_teraz ) )
		{
		$biezace = true;
		}

	   $kwerenda2 = "SELECT `model`, `markaID` FROM auto_tbl WHERE id=$auto_id";
	   $rezultat2 = mysql_query ( $kwerenda2, $db_link );
		if ( ! $rezultat2 )
		{
		echo ("<h4>B��dy:</h4>");
		echo mysql_error();
		}
		else
		{
		$wynik2 = mysql_fetch_row( $rezultat2 );
		$model = $wynik2[0];
		$marka_id = $wynik2[1];
		}
	   
	   $kwerenda3 = "SELECT `marka` FROM `auto_marka_tbl` WHERE `id`=$marka_id";
	   $rezultat3 = mysql_query ( $kwerenda3, $db_link );
		if ( ! $rezultat3 )
		{
		echo ("<h4>B��dy:</h4>");
		echo mysql_error();
		}
		else
		{
		$wynik3 = mysql_fetch_row( $rezultat3 );
		$marka = $wynik3[0];
		}

		 if ( $biezace )
		 {
 		 echo("<table width=\"445\" align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"2\" bgcolor=\"#162C8C\">");
		 echo("<tr style=\"color: white\">");
 		  echo('<td width="35%">');
		  echo("<b>$ile. <a style=\"color: white;\" href=\"./index.php?cid=$auto_id\">$marka $model</a></b></td>");
		  echo("<td width=\"25%\" align=\"center\"><b> $data_rezerwacji </b></td>");
		  echo("<td  align=\"center\"><b> $data_p</b> - <b> $data_k </b> </td>");
		 echo("</tr>");
		 echo('<tr style="background-color: white; height: 26px;">');
		  echo('<td align="right" colspan="3">');
	      echo('<form name="anuluj_rez" method="post" action="./index.php" onsubmit="return  confirm(\'Czy na pewno chcesz odwo�a� rezerwacj�?\')" >');
	
		  echo("<input type=\"hidden\" name=\"anuluj_rez\" value=\"$nr_rezerwacji\" />");					          echo("<input type=\"hidden\" name=\"anuluj_rauto\" value=\"$auto_id\" />");
		  echo("<input type=\"hidden\" name=\"anuluj_rosoba\" value=\"$id_uzytkownika\" />"); 			  
		  
	 	  echo('<input type="submit" value="Anuluj rezerwacj�" class="przycisk2" />');
		  echo("</form>");
		  echo("</td>");
		 echo("</tr>");
		 echo("</table>");

		 }
		 else
		 {
		 echo("<table width=\"445\" align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"2\" bgcolor=\"#82B8FB\">");
		 echo("<tr>");
 		  echo('<td width="35%">');
		  echo("<b>$ile. <a href=\"./index.php?cid=$auto_id\">$marka $model</a></b></td>");
		  echo("<td width=\"25%\" align=\"center\"><b> $data_rezerwacji </b></td>");
		  echo("<td  align=\"center\"><b> $data_p</b> - <b> $data_k </b> </td>");
		 echo("</tr>");
		 echo("</table>");

		 }
		 
		 echo("<br />");
		}
	  } //while-end
  echo('<br />');
  echo('<p class="akapit_prawy_wezszy">');
  echo("<b>Legenda:</b> &nbsp;&nbsp;&nbsp;&nbsp;</p>");
  echo('<table align="center" width="450" border="0" cellpadding="0" cellspacing="0" >');
   echo('<tr>');
    echo('<td width="350">&nbsp;</td>');
	echo('<td style="text-align: center; background-color: #162C8C; color: white; font-weight: bold;  height: 20px">aktywne</td>');
   echo('</tr>');
   echo('<tr><td>&nbsp;</td></tr>');
   echo('<tr>');
    echo('<td>&nbsp;</td>');
	echo('<td style="text-align: center; background-color: #82B8FB; color: black; font-weight: bold;  height: 20px">minione</td>'); 
   echo('</tr>');
  echo('</table>');
  }
  else
  {
  echo ("<h3 style=\"color: red;\">Wystapi� b��d!".mysql_error()."</h3>");
  }
 } 

?>