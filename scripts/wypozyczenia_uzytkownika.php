<h3>Wypożyczenia użytkownika</h3>
<br />

<?php

//ID_wypozyczenia 	fk_userID 	fk_autoID 	dataWyp 	dataZwrOczek 	dataZwrRzecz

 if ( SprawdzUprawnieniaAdmina() )
 {
 $id_uzytkownika = $_SESSION['id'];
 $data_teraz = date( "Y-m-j" );
 
 $kwerenda = "SELECT `ID_wypozyczenia`, `fk_autoID`, `dataWyp`, `dataZwrOczek`, `dataZwrRzecz` FROM wypozyczenia_tbl WHERE `fk_userID`=$id_uzytkownika && (`dataWyp`<='$data_teraz' && `dataZwrOczek`>='$data_teraz') ORDER BY `dataWyp` DESC";

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
		echo("<table width=\"450\" align=\"center\" border=\"0\" cellpadding=\"2\" cellspacing=\"2\" bgcolor=\"white\">");
		echo("<tr>");
 		 echo('<td width="40%" bgcolor="#82B8FB" align="center"><b>Marka i model auta</b></td>');
		 echo('<td width="20%" bgcolor="#82B8FB" align="center"><b>Data wypożyczenia</b></td>');
		 echo('<td width="20%" bgcolor="#82B8FB" align="center"><b>Oczekiwana data zwrotu </b></td>');
	     echo('<td width="20%" bgcolor="#82B8FB" align="center"><b>(Rzeczywista data zwrotu)</b></td>');
		echo("</tr>");
		echo("</table>");
        echo("<br />");
   $ile = 0;  
	  while ( $wynik = mysql_fetch_row( $rezultat ) )
	  {
	  $ile++;
	  $nr_rezerwacji = $wynik[0];
	  $auto_id = $wynik[1]; 
	  $data_rezerwacji = $wynik[2];
	  $data_p = $wynik[3];
	  $data_k = $wynik[4];

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
		
		echo("<table width=\"445\" align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"2\" bgcolor=\"#162C8C\">");
		echo("<tr style=\"color: white\">");
 		 echo('<td width="35%">');
		 echo("<b>$ile. <a style=\"color: white;\" href=\"./index.php?cid=$auto_id\">$marka $model</a></b></td>");
		 echo("<td width=\"25%\" align=\"center\"><b> $data_rezerwacji </b></td>");
		 echo("<td  align=\"center\"><b> $data_p</b> - <b> $data_k </b> </td>");
		echo("</tr>");
		echo("</table>");
		echo("<br />");
		}
	  } //while-end
  
  }
  else
  {
  echo ("<h3 style=\"color: red;\">Wystapił błąd!".mysql_error()."</h3>");
  }
 }  

?>