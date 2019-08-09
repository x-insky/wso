<?php

echo ("<h3>Strona g³ówna</h3>");
echo ("<p class=\"akapit_wezszy\">Proponujemy Pañstwu wynajem samochodów osobowych.
Profesjonalna obs³uga, uproszczona procedura najmu oraz niska stawka dobowa to nasze g³ówne atuty. Oferujemy wy³±cznie nowe samochody z bogatym wyposa¿eniem.<br /><br />"); 
echo("Nasz± misj± jest zapewnienie mo¿liwo¶ci wypo¿yczenia samochodu dla praktycznie ka¿dej, najmniejszej nawet Firmy, czy osoby indywidualnej. Niskie koszty w³asne oraz wspó³praca z najlepszymi na rynku motoryzacyjnym przek³adaj± siê na atrakcyjn± cenê dla naszych Klientów."); 
echo("<br /><br />Jeste¶my do Pañstwa dyspozycji 24 godziny na dobê.<br /><br /></p>");
/*
$kwerenda = "SELECT id, nazwaFirmy FROM firma_tbl WHERE id";
$rezultat = mysql_query( $kwerenda );
$firmy_numery = array();
$firmy_nazwy = array();
 while ( $wynik = mysql_fetch_row( $rezultat ) )
 {
 $firmy_numery[] = $wynik[0];
 $firmy_nazwy[] = $wynik[1];
 $firmy = array_combine( $firmy_numery, $firmy_nazwy );
 }

 foreach( $firmy as $klucz => $firma )
 {
 echo("Firma [$klucz]: $firma<br />");
 }
*/
echo("<h3>Ostatnie wiadomo¶ci</h3>");

$kwerenda = "SELECT tytul, tresc, autorID, dataTresci, czasTresci, id FROM tresc_tbl WHERE trescRodzaj=1 ORDER BY id DESC LIMIT 3";

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
	echo ("<h1>B³êdy</h1>");
	}
    else
	{
	$wynik2 = mysql_fetch_row( $rezultat2 );
	$autor_imie = $wynik2[0];
	$autor_nazwisko = $wynik2[1];
	echo('<table width="450" align="center" border="0" cellpadding="1" cellspacing="2" bgcolor="#82B8FB">');
/*	echo("<tr><td><b>$tytul</b></td></tr>");
    echo("<tr bgcolor='white'><td>$tresc</td></tr>");
	echo("<tr><td align=\"center\">Doda³ <b>$autor_imie $autor_nazwisko</b>&nbsp;&nbsp; Dnia: <b>$data</b> &nbsp; Godzina: <b>$czas</b></td></tr>"); */
	echo('<tr>');
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
	echo("<tr><td colspan=\"2\" align=\"center\">Napisa³: <b>$autor_imie $autor_nazwisko</b> w dniu: <b>$data</b> o godzinie: <b>$czas</b></td></tr>");
	
	echo("</table>");
	echo("<br />");
	}
  } //while-end
 
  
 echo("<br />");
 
  if ( isSet( $_SESSION['zalogowany'] ) )
  {
  $odnosnik = '<a href="./index.php?menu=allnews">'; 
  echo("<p class=\"akapit_prawy_wezszy\">$odnosnik"."Wszystkie wiadomo¶ci</a><p>");
  }
  else
  {
  echo("<p class=\"akapit_prawy_wezszy\">Zalogowani u¿ytkownicy mog± obejrzeæ wszystkie wiadomo¶ci.<p>");
  }
 }

?>