<h3>Nasze samochody</h3>
<br />

<?php

$kwerenda = "SELECT id, markaID, model, kategoriaID, rokProdukcji, kolorID, skrzyniaID, drzwiID FROM auto_tbl";
$rezultat = mysql_query( $kwerenda );
 if ( ! $rezultat )
 {
 echo("<h3 style=\"color: red;\">Brak pojazdów w bazie!</h3>");
 }
 else
 {
  $id_pojazdu = array();
  $marka_id = array();
  $model = array(); 
  $rok_pordukcji = array(); 
  $kolor_id = array(); 
  $kategoria_id = array();
  $skrzynia_id = array();
  $drzwi_id = array();
  
  $ile_samochodow = 0;
  
  while( $wynik = mysql_fetch_row( $rezultat ) )
  {
  $ile_samochodow++;
  
  $id_pojazdu[]= $wynik[0];
  $marka_id[] = $wynik[1];
  $model[] = $wynik[2]; 
  $kategoria_id[] = $wynik[3];
  $rok_produkcji[] = $wynik[4]; 
  $kolor_id[] = $wynik[5]; 
  $skrzynia_id[] = $wynik[6];
  $drzwi_id[] = $wynik[7];
  }

//pobranie wszystkich nazw marek samochodów do tablicy   
   $kwerenda2 = "SELECT id, marka FROM auto_marka_tbl";
   $rezultat2 = mysql_query( $kwerenda2 );
   $temp1 = array();
   $temp2 = array();
    while ( $wynik2 = mysql_fetch_row( $rezultat2 ) )
    {
    $temp1[] = $wynik2[0];
    $temp2[] = $wynik2[1];
    $marki = array_combine( $temp1, $temp2 );
    } 

//pobranie wszystkich kolorów samochodów do tablicy  
   $kwerenda2 = "SELECT id, kolor FROM auto_kolor_tbl";
   $rezultat2 = mysql_query( $kwerenda2 );
   $temp3 = array();
   $temp4 = array();
    while ( $wynik2 = mysql_fetch_row( $rezultat2 ) )
    {
    $temp3[] = $wynik2[0];
    $temp4[] = $wynik2[1];
    $kolory = array_combine( $temp3, $temp4 );
    } 

//pobranie wszystkich nazw kategorii samochodów do tablicy   
   $kwerenda2 = "SELECT id, nazwaKategorii FROM auto_kategoria_tbl";
   $rezultat2 = mysql_query( $kwerenda2 );
   $temp5 = array();
   $temp6 = array();
    while ( $wynik2 = mysql_fetch_row( $rezultat2 ) )
    {
    $temp5[] = $wynik2[0];
    $temp6[] = $wynik2[1];
    $kategorie = array_combine( $temp5, $temp6 );
    } 
 
//pobranie wszystkich ilo¶ci drzwi samochodów do tablicy   
   $kwerenda2 = "SELECT id, liczbaDrzwi FROM auto_drzwi_tbl";
   $rezultat2 = mysql_query( $kwerenda2 );
   $temp1 = array();
   $temp2 = array();
    while ( $wynik2 = mysql_fetch_row( $rezultat2 ) )
    {
    $temp1[] = $wynik2[0];
    $temp2[] = $wynik2[1];
    $drzwii = array_combine( $temp1, $temp2 );
    } 

//pobranie wszystkich rodzajów skrzyni samochodów do tablicy  
   $kwerenda2 = "SELECT id, typSkrzyni FROM auto_skrzynia_tbl";
   $rezultat2 = mysql_query( $kwerenda2 );
   $temp1 = array();
   $temp2 = array();
    while ( $wynik2 = mysql_fetch_row( $rezultat2 ) )
    {
    $temp1[] = $wynik2[0];
    $temp2[] = $wynik2[1];
    $skrzynie = array_combine( $temp1, $temp2 );
    } 

 //echo("<br />\$ile_samochodow: $ile_samochodow");
 //echo("<br />\$id_pojazdu[0]: $id_pojazdu[0]");
 //echo("<br />\$id_pojazdu[1]: $id_pojazdu[1]<br />");
 
 //wy¶wietlenie samochodów wraz z nazw± kategorii + opsi auta
   for ( $i = 0; $i < $ile_samochodow; $i++ )
   {
   $j = $i + 1;
   $zmienna = $kategoria_id[$i];
   $zmienna2 = $marka_id[$i];
   $zmienna3 = $kolor_id[$i];
   $skrzynia = $skrzynia_id[$i];
   $drzwi = $drzwi_id[$i];
   
   echo("<br /><h4 style=\"color: #82B8FB\">$j. <a href=\"./index.php?cid=$id_pojazdu[$i]\"> $marki[$zmienna2] $model[$i]</a> - kategoria <a href=\"./index.php?kat=$kategoria_id[$i]\">$kategorie[$zmienna]</a></h4>");
   echo("<p class=\"akapit_wezszy\">&nbsp;&nbsp;&nbsp;&nbsp;rok produkcji: <b>$rok_produkcji[$i]</b>, skrzynia: <b> $skrzynie[$skrzynia]</b>, liczba drzwi: <b>$drzwii[$drzwi]</b>, <br />
&nbsp;&nbsp;&nbsp;&nbsp;kolor: <b>$kolory[$zmienna3]</b></p>");
   echo("<br />");
   }
   //echo("<br /><h4 style=\"color: red\">DEBUG: kolory aut... s± niezbyt.</h4>");
   
   unset( $kwerenda, $rezultat, $wynik, $marka, $kolor, $kolor_id, $skrzynia, $markaID, $rok_produkcji, $i, $j );
   unset( $kwerenda2, $rezultat2, $wynik2, $kolory, $marki, $ile_samochodow, $temp1, $temp2,
    $temp3, $temp4 , $temp5, $temp6, $zmienna );
   
 } //if-else-end
?>