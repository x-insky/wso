<?php

echo("<h3>Wszystkie wiadomości</h3>");
echo('<br />');

$kwerenda = "SELECT tytul, tresc, autorID, dataTresci, czasTresci, id FROM tresc_tbl WHERE trescRodzaj=1 ORDER BY id DESC";

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
   $kwerenda2 = "SELECT imie, nazwisko FROM user_tbl WHERE ID=$autorID";
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
	echo('<table width="96%" align="center" border="0" cellpadding="1" cellspacing="2" bgcolor="#82B8FB">');
	echo("<tr>");
	echo("<td width=\"88%\"><b>$tytul</b></td>");
	echo("<td align=\"right\">"); 
// !!! mozliwosci ADMINA !!!
	 if ( $_SESSION['rola'] == "administrator" )
	 {
	 //echo('<a style="color: red; text-align: right;" href="./index.php?">modyfikuj</a>');
	 echo("<a style=\"color: red; text-align: right;\" href=\"./index.php?wid=$id_wiadomosci\">modyfikuj</a>");
	 }
     else
	 {
	 echo("&nbsp;");
	 } //end-"admin"

	echo("</td></tr>");
    echo("<tr bgcolor='white'><td colspan=\"2\">$tresc</td>");
	echo("</tr>");
//	echo("<tr><td>Ostatnia modyfikacja dnia: <b>$data</b> &nbsp; Godzina: <b>$czas</b> </td><td>Autor: <b>$autor_imie $autor_nazwisko</b></td></tr>");
	echo("<tr><td colspan=\"2\" align=\"center\">Autor: <b>$autor_imie $autor_nazwisko</b> ostatnia modyfikacja: <b>$data</b> godzina: <b>$czas</b></td></tr>");
	echo("</table>");
	echo("<br />");
	}
  } //while-end
 }
?>