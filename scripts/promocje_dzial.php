<h3>Aktualne promocje</h3>
<br />

<?php
$kwerenda = "SELECT tytul, tresc, autorID, dataTresci, czasTresci, id FROM tresc_tbl WHERE trescRodzaj=2 AND aktywne=1 ORDER BY id DESC";

$rezultat = mysql_query ( $kwerenda, $db_link );

 if ( $rezultat )
 {
 
  while ( $wynik = mysql_fetch_row( $rezultat ) )
  {
  $tytul = $wynik[0];
  $tresc = $wynik[1]; 
  $autorID = $wynik[2];
  $data = $wynik[3];
  $czas = $wynik[4];
  $id_wiadomosci = $wynik[5];
  
   $kwerenda2 = "SELECT imie, nazwisko FROM user_tbl WHERE id=$autorID";
   $rezultat2 = mysql_query ( $kwerenda2, $db_link );
    if ( ! $rezultat2 )
	{
	echo ("<h1>Błędy</h1>");
	}
    else
	{
	$wynik2 = mysql_fetch_row( $rezultat2 );
	$autor_imie = $wynik2[0];
	$autor_nazwisko = $wynik2[1];
	echo('<table width="450" align="center" border="0" cellpadding="1" cellspacing="2" bgcolor="#162C8C">');
/*	echo("<tr><td><b>$tytul</b></td></tr>");
    echo("<tr bgcolor='white'><td>$tresc</td></tr>");
	echo("<tr><td align=\"center\">Dodał <b>$autor_imie $autor_nazwisko</b>&nbsp;&nbsp; Dnia: <b>$data</b> &nbsp; Godzina: <b>$czas</b></td></tr>"); */
	echo('<tr style="color: white;">');
	echo("<td width=\"88%\"><b>$tytul</b></td>");
	echo("<td align=\"right\">"); 

// !!! mozliwosci ADMINA !!!
	 if ( $_SESSION['rola'] == "administrator" )
	 {
	 echo("<a style=\"color: red; text-align: right;\" href=\"./index.php?wid=$id_wiadomosci\">modyfikuj</a>");
	 }
     else
	 {
	 echo("&nbsp;");
	 } //end-"admin"
	  
	echo("</td></tr>");
	nl2br( $tresc );
    echo("<tr bgcolor='white'><td colspan=\"2\">$tresc</td>");
	echo("</tr>");
//	echo("<tr><td>Ostatnia modyfikacja dnia: <b>$data</b> &nbsp; Godzina: <b>$czas</b> </td><td>Autor: <b>$autor_imie $autor_nazwisko</b></td></tr>");
	echo('<tr style="color: white;">');
	echo("<td colspan=\"2\" align=\"center\">Napisał: <b>$autor_imie $autor_nazwisko</b> w dniu: <b>$data</b> o godzinie: <b>$czas</b></td></tr>");
	
	echo("</table>");
	echo("<br />");
	}
  } //while-end
 
  
 echo("<br />");
 
  if ( ( $_SESSION['rola'] == "administrator" ) || ( $_SESSION['rola'] == "pracownik" ) )
  {
  $odnosnik = '<a href="./index.php?menu=alldiscounts">'; 
  echo("<p class=\"akapit_prawy_wezszy\">$odnosnik"."Wszystkie rabaty</a><p>");
  }
  else
  {
  //echo("<p class=\"akapit_prawy_wezszy\">Zalogowani użytkownicy mogą obejrzeć wszystkie wiadomości.<p>");
  }
 }

?>