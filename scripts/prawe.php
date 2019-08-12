<div class="sekcja_biala">Kategorie pojazdów</div>
 
<?php 


	// kategorie pojazdów 
$kwerenda = "SELECT nazwaKategorii, ID FROM auto_kategoria_tbl ORDER BY ID";
$rezultat = mysql_query( $kwerenda );
$ile_wierszy = mysql_num_rows( $rezultat ); 
 if ( $ile_wierszy > 0 )
 {
  //echo ('<table width="90%" border="0" cellpadding="0" cellspacing="0" bgcolor="#162C8C">');
  while ( $wynik = mysql_fetch_row( $rezultat ) )
  {
  $nazwa_kategorii = $wynik[0];
  $id = $wynik[1];
   if ( $wynik[1] == $_GET['kat'] )
   {  //pogrub atywną kategorię
   echo("<span class=\"kategoria_link\">$nazwa_kategorii</span><br />");  //..<br />");
   }
   else
   {  //wyswietla jako link - kategoia do wyboru
   echo("<a href=\"./index.php?kat=$id\">$nazwa_kategorii</a><br />");
   }
  }
 
 }
 else
 {
 echo("<b>Brak wpisanych kategorii</b>"); 
 } 
echo "<br />"; 

?>

<div class="sekcja_biala">Najpopularniejsze</div>

<?php

$kwerenda = "SELECT `fk_autoID`, COUNT(*) FROM wypozyczenia_tbl GROUP BY `fk_autoID` ORDER BY COUNT(*) DESC LIMIT 3";
//$kwerenda = "SELECT `fk_autoID`, COUNT(SELECT * FROM wypozyczenia_tbl WHERE wypozyczenia_tbl) FROM wypozyczenia_tbl";
$rezultat = mysql_query( $kwerenda );
 
 if ( $rezultat )
 {
 $ile_wierszy = mysql_num_rows( $rezultat ); 
  if ( $ile_wierszy > 0 )
  {
  $ile = 0;
  //echo ('<table width="90%" border="0" cellpadding="0" cellspacing="0" bgcolor="#162C8C">');
   while ( $wynik = mysql_fetch_row( $rezultat ) )
   {
   $ile++;
   $auto_naj = $wynik[0];
   $auto_naj_ile = $wynik[1];


  $kwerenda6 = "SELECT markaID, model FROM auto_tbl WHERE id=$auto_naj";
  $rezultat6 = mysql_query( $kwerenda6 );
   if ( $rezultat6 )
   {
   $wynik6 = mysql_fetch_row( $rezultat6 );
   $markaID_naj = $wynik6[0];
   $model_naj = $wynik6[1];
   }
   else
   echo mysql_error();
   
  $kwerenda6 = "SELECT `marka` FROM `auto_marka_tbl` WHERE `id`=$markaID_naj";
  $rezultat6 = mysql_query( $kwerenda6 );
   if ( $rezultat6 )
   {
   $wynik6 = mysql_fetch_row( $rezultat6 );
   $marka_naj = $wynik6[0]; 
   }
   else
   echo mysql_error();
   
   if ( $_SESSION['rola'] == "administrator" )
   echo("<a href=\"./index.php?cid=$auto_naj\">$ile. $marka_naj $model_naj ($auto_naj_ile)</a> <br />");
   else
   echo("<a href=\"./index.php?cid=$auto_naj\">$ile. $marka_naj $model_naj</a> <br />");
    
   } //while-end
  echo("<br />"); 
  } 
 }

unset(  $kwerenda6, $rezultat6, $wynik6 );
?>

<div class="sekcja_biala">Nowe samochody</div>

<?php

$ostatni = array();
$marki = array();
$modele = array();
$kwerenda2 = "SELECT id, markaID, model FROM auto_tbl ORDER BY id DESC LIMIT 3";
$rezultat2 = mysql_query( $kwerenda2 );

 while ( $wynik2 = mysql_fetch_row( $rezultat2 ) )
 {
 $pojazd = $wynik2[0];
 $marka_id = $wynik2[1];
 $modele[] = $wynik2[2];
 $ostatni[] = $pojazd;
 $ostatni_marka_id[] = $marka_id;
 
 $kwerenda3 = "SELECT marka FROM auto_marka_tbl WHERE id=$marka_id LIMIT 1";
 $rezultat3 = mysql_query( $kwerenda3 );
 $wynik3 = mysql_fetch_row( $rezultat3 );
 $marki[] = $wynik3[0];
// $markaID = 
 }

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
 /*  w 2015 nie ogarniam co robi powyższe (kwarenda2 i potem while) i po co jest ?! */


 for ( $i = 0; $i < 3; $i++ )
 {
 $zmienna = $ostatni[$i];
 echo("<a href=\"./index.php?cid=$zmienna\">".($i+1).". $marki[$i] $modele[$i]</a> <br />");
 }

?>