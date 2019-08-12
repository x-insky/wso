<h3>Historia wypożyczeń użytkownika</h3>
<br />

<?php

 if ( SprawdzUprawnieniaAdmina() )
 {
 $id_uzytkownika = $_SESSION['id'];
 $data_teraz = date( "Y-m-j" );
 
 $kwerenda = "SELECT `ID_wypozyczenia`, `fk_autoID`, `dataWyp`, `dataZwrOczek`, `dataZwrRzecz` FROM wypozyczenia_tbl WHERE `fk_userID`=$id_uzytkownika ORDER BY `dataWyp` DESC";

$rezultat = mysql_query ( $kwerenda, $db_link );

 if ( $rezultat )
 {
 $ile_wierszy = mysql_num_rows( $rezultat ); 
  if ( ! $ile_wierszy )
  {
  echo("<h4>Brak złożonych rezerwacji!</h4>");
  } 
  else
  {
  $ile = 0;  
  
		echo("<table width=\"450\" align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"white\">");
		echo("<tr>");
 		 echo('<td width="37%" bgcolor="#82B8FB" align="center"><b>Marka i model auta</b></td>');
		 echo('<td width="21%" bgcolor="#82B8FB" align="center"><b>Data wypożyczenia</b></td>');
		 echo('<td width="21%" bgcolor="#82B8FB" align="center"><b>Oczekiwana data zwrotu </b></td>');
	     echo('<td width="21%" bgcolor="#82B8FB" align="center"><b>(Rzeczywista data zwrotu)</b></td>');
		echo("</tr>");
		echo("</table>");
        echo("<br />");
 	
	  while ( $wynik = mysql_fetch_row( $rezultat ) )
	  {
	  $ile++;
	  $biezace = false;
	  $nr_rezerwacji = $wynik[0];
	  $auto_id = $wynik[1]; 
	  $data_wypozyczenia = $wynik[2];
	  $data_zwr_ocz = $wynik[3];
	  $data_zwr_rzecz = $wynik[4];

	    if ( ( $data_wypozyczenia <= $data_teraz ) && ( $data_zwr_ocz >= $data_teraz ) )
		{
		$biezace = true;
		}

	   $kwerenda2 = "SELECT `model`, `markaID` FROM auto_tbl WHERE id=$auto_id";
	   $rezultat2 = mysql_query ( $kwerenda2, $db_link );
		if ( ! $rezultat2 )
		{
		echo ("<h4>Błędy:</h4>");
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
		echo ("<h4>Błędy:</h4>");
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
 		  echo('<td width="37%">');
		  echo("<b>$ile. <a style=\"color: white;\" href=\"./index.php?cid=$auto_id\">$marka $model</a></b></td>");
		  echo("<td width=\"20%\" align=\"center\"><b> $data_wypozyczenia </b></td>");
		  echo("<td width=\"20%\" align=\"center\"><b> $data_zwr_ocz </b> </td>");
		   if ( $data_zwr_ocz == $data_zwr_rzecz ) 
		   echo("<td width=\"20%\" align=\"center\"><b>&nbsp;</b> </td>");
		   else
		   echo("<td width=\"20%\" align=\"center\"><b> $data_zwr_rzecz </b> </td>");
		 echo("</tr>");
		 echo("</table>");

		 }
		 else
		 {
		 echo("<table width=\"445\" align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"2\" bgcolor=\"#82B8FB\">");
		 echo("<tr>");
 		  echo('<td width="37%">');
		  echo("<b>$ile. <a href=\"./index.php?cid=$auto_id\">$marka $model</a></b></td>");
		  echo("<td width=\"20%\" align=\"center\"><b> $data_wypozyczenia </b></td>");
		  echo("<td width=\"20%\" align=\"center\"><b> $data_zwr_ocz </b> </td>");
		   if ( $data_zwr_ocz == $data_zwr_rzecz ) 
		   echo("<td width=\"20%\" align=\"center\"><b>&nbsp;</b> </td>");
		   else
		   echo("<td width=\"20%\" align=\"center\"><b> $data_zwr_rzecz </b> </td>");
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
  echo ("<h3 style=\"color: red;\">Wystapił błąd!".mysql_error()."</h3>");
  }
 } 

?>