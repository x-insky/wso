<h3>Samochód - szczegó³y</h3>
<br />

<?php
  // $autoID = $_GET['cid'];
 $kwerenda = "SELECT markaID, model, rokProdukcji, nrRejestracyjny, statusPojazdu, kategoriaID, pojemnosc, moc, skrzyniaID, paliwoID, nadwozieID, drzwiID, kolorID, metalik, wyposazenieID FROM auto_tbl WHERE id=$autoID LIMIT 1";

 $rezultat = mysql_query( $kwerenda );
 $wynik = mysql_fetch_row( $rezultat );
  
 $markaID = $wynik[0];
 $model = $wynik[1];
 $rokProdukcji = $wynik[2];
 $nrRejestracyjny = $wynik[3];
 $statusPojazdu = $wynik[4];
 $kategoriaID = $wynik[5];
 $pojemnosc = $wynik[6];
 $moc = $wynik[7];
 $skrzyniaID = $wynik[8];
 $paliwoID = $wynik[9];
 $nadwozieID = $wynik[10];
 $drzwiID = $wynik[11];
 $kolorID = $wynik[12];
 $metalik = $wynik[13];
 $wyposazenieID = $wynik[14];

 //przypisanie w mairê prostych wyników
  if ( $metalik == 1 ) $metalik = "tak"; 
  else $metalik = "nie";
 $wyposazenie = $wyposazenieID; // ?

//podzapytania:
 $kwerenda2 = "SELECT marka FROM auto_marka_tbl WHERE id=$markaID LIMIT 1";
 $rezultat2 = mysql_query( $kwerenda2 );
 $wynik2 = mysql_fetch_row( $rezultat2 );
 $marka = $wynik2[0];

 $kwerenda2 = "SELECT nazwaKategorii FROM auto_kategoria_tbl WHERE id=$kategoriaID LIMIT 1";
 $rezultat2 = mysql_query( $kwerenda2 );
 $wynik2 = mysql_fetch_row( $rezultat2 );
 $kategoria = $wynik2[0];

 $kwerenda2 = "SELECT typSkrzyni FROM auto_skrzynia_tbl WHERE id=$skrzyniaID LIMIT 1";
 $rezultat2 = mysql_query( $kwerenda2 );
 $wynik2 = mysql_fetch_row( $rezultat2 );
 $skrzynia = $wynik2[0];

 $kwerenda2 = "SELECT paliwo FROM auto_paliwo_tbl WHERE id=$paliwoID LIMIT 1";
 $rezultat2 = mysql_query( $kwerenda2 );
 $wynik2 = mysql_fetch_row( $rezultat2 );
 $paliwo = $wynik2[0];

 $kwerenda2 = "SELECT typNadwozia FROM auto_nadwozie_tbl WHERE id=$nadwozieID LIMIT 1";
 $rezultat2 = mysql_query( $kwerenda2 );
 $wynik2 = mysql_fetch_row( $rezultat2 );
 $nadwozie = $wynik2[0];

 $kwerenda2 = "SELECT liczbaDrzwi FROM auto_drzwi_tbl WHERE id=$drzwiID LIMIT 1";
 $rezultat2 = mysql_query( $kwerenda2 );
 $wynik2 = mysql_fetch_row( $rezultat2 );
 $drzwi = $wynik2[0];

 $kwerenda2 = "SELECT kolor FROM auto_kolor_tbl WHERE id=$kolorID LIMIT 1";
 $rezultat2 = mysql_query( $kwerenda2 );
 $wynik2 = mysql_fetch_row( $rezultat2 );
 $kolor = $wynik2[0];

 $kwerenda2 = "SELECT marka FROM auto_marka_tbl WHERE id=$markaID LIMIT 1";
 $rezultat2 = mysql_query( $kwerenda2 );
 $wynik2 = mysql_fetch_row( $rezultat2 );
 $marka = $wynik2[0];

// + wyszukiwanie adresó zdjêc pojazdu z bazy
 $czy_sa_zdjecia = false;
 $ile_zdjec = 0;
 $adres_zdjecia = array();
 
 $kwerenda2 = "SELECT zdjecieID FROM auto_zdjecia_tbl WHERE autoID=$autoID";
 $rezultat2 = mysql_query( $kwerenda2 );
 while ( $wynik2 = mysql_fetch_row( $rezultat2 ) )
 {
 $ile_zdjec++;
 $czy_sa_zdjecia = true;
 $zmienna = $wynik2[0];
   
   $kwerenda3 = "SELECT url FROM zdjecia_tbl WHERE ID=$zmienna";
   $rezultat3 = mysql_query( $kwerenda3 );
   $wynik3 = mysql_fetch_row( $rezultat3 );
   $zdjecie_url = $upload_dir.$wynik3[0];
   $adres[] = $zdjecie_url;
 }
 
 if ( ( $_SESSION['rola'] == "administrator" ) || ( $_SESSION['rola'] == "pracownik" ) )
 {
 $uprawniony == true;
 }
?> 

<table width="440" border="0" align="center" cellpadding="0" cellspacing="2" >

<?php
 if ( ( $_SESSION['rola'] == "administrator" ) || ( $_SESSION['rola'] == "pracownik" ) )
 {
 echo('<tr>');
 echo(" <td class=\"tab_nazwa_kolumny2\">Numer pojazdu</td>");
 echo(" <td class=\"tab_dane_kolumny\">$autoID</td>");
 echo('</tr>');
 }
?>  
 <tr>
  <td class="tab_nazwa_kolumny2">Marka</td>
  <td class="tab_dane_kolumny">
<?php  
echo("$marka");
?>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Model</td>
  <td class="tab_dane_kolumny">
<?php  
echo("$model");
?>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Rok produkcji</td>
  <td class="tab_dane_kolumny">
<?php  
echo("$rokProdukcji");
?>  
  </td>
 </tr>
<?php
 if ( ( $_SESSION['rola'] == "administrator" ) || ( $_SESSION['rola'] == "pracownik" ) )
 {
 echo('<tr>');
 echo(' <td class="tab_nazwa_kolumny2">Numer rejestracyjny</td>');
 echo(' <td class="tab_dane_kolumny">');
echo("$nrRejestracyjny");
 echo(' </td>');
 echo('</tr>');
 echo('<tr>');
 echo(' <td class="tab_nazwa_kolumny2">Status pojazdu</td>');
 echo(' <td class="tab_dane_kolumny">');
echo("$statusPojazdu");
 echo(' </td>');
 echo('</tr>');
}
?> 
 <tr>
  <td class="tab_nazwa_kolumny2">Kategoria pojazdu</td>
  <td class="tab_dane_kolumny">
<?php  
echo("$kategoria");
?>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Pojemno¶æ [cm^3]</td>
  <td class="tab_dane_kolumny">
<?php  
echo("$pojemnosc");
?>  
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Moc [KM]</td>
  <td class="tab_dane_kolumny">
<?php  
echo("$moc");
?>  
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Skrzynia biegów</td>
  <td class="tab_dane_kolumny">
<?php
echo("$skrzynia");  
?>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Paliwo</td>
  <td class="tab_dane_kolumny">
<?php  
echo("$paliwo"); 
?>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Typ nadwozia</td>
  <td class="tab_dane_kolumny">
<?php  
echo("$nadwozie"); 
?>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Liczba drzwi</td>
  <td class="tab_dane_kolumny">
<?php  
echo("$drzwi"); 
?>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Wyposa¿enie</td>
  <td class="tab_dane_kolumny">
<?php  
echo("$wyposazenie"); 
?>  
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Kolor</td>
  <td class="tab_dane_kolumny">  
<?php  
echo("$kolor"); 
?>
  </td>
 </tr>
 <tr>
  <td class="tab_nazwa_kolumny2">Metalik</td>
  <td class="tab_dane_kolumny">
<?php  
echo("$metalik"); 
?>  
  </td>
 </tr>
 <tr>
  <td>&nbsp;</td>
  <td>&nbsp;</td>
 </tr>
 </table>
<?php

 if ( ( $ile_zdjec >= 1 ) && ( $ile_zdjec <= 4 ) )
 {
 echo('<table width="440" border="0" align="center" cellpadding="0" cellspacing="2" >');
 echo('<tr>');
 $max_y = 101;
 $max_x = 101;
  for ( $i = 0; $i < $ile_zdjec; $i++ )
  {
  $parametry = getimagesize( $adres[$i] );  //sprawdzenie szerokosæi wczytaego zdjecia
  $szer = $parametry['0'];
  $wys = $parametry['1'];
   
   if ( $szer >= $wys )
   {
   $szerokosc = $max_x; 
   $wysokosc = round( $wys * $max_y / $szer );
   } 
   if ( $szer < $wys )
   {
   $szerokosc = round( $szer * $max_x / $wys ); 
   $wysokosc = $max_y;
   }
  echo('<td class="tab_dane_kolumny2">');     //promorcjonane zmiejszenie oryginaa³u
  echo("<a href=\"$adres[$i]\"><img src=\"$adres[$i]\" width=\"$szerokosc\" height=\"$wysokosc\" border=\"0\" alt=\"\" /></a>"); 
  echo('</td>');
  }  //for-end 

 echo('</tr>');
 echo('</table>'); 
 }


$auto_id = $autoID;  // $autoID - w kwerendzie na górze strony
$osoba_id = $_SESSION['id'];
echo('<table width="440" border="0" align="center" cellpadding="0" cellspacing="0" >');
echo('<tr>'); 

 if ( $_SESSION['zalogowany'] == "" )
 {
 echo('<td>');
 echo("<h5>Zalogowani u¿ytkownicy mog± zarezerwowaæ auto na wybrany okres</h5>");
 echo("<p style=\"color: red;\">DEBUG: niezalogowany</p>");
 echo('</td></tr>');
 }
 
 if ( $_SESSION['rola'] == "klient" )
 {

  echo('<td class="komorka_lewa">');
  echo('<form name = "rezerwuj_auto" action = "./index.php" method = "post" 
       onsubmit="return sprawdz_formularz_rezerwuj_auto(this)" >');
//  echo('<form name = "rezerwuj_auto" action = "./index.php" method = "post" 
//       onsubmit="return pokaz()" >');


  echo('<h4>Data pocz±tkowa:</h4>');
  echo('<p class="akapit_wezszy">&nbsp;&nbsp;&nbsp; dzieñ &nbsp;-&nbsp;&nbsp; miesi±c &nbsp;&nbsp;-&nbsp;&nbsp; rok</p>');
  echo('</td>');
  echo('<td class="komorka_prawa"> <h4>Data koñcowa:</h4>');
  echo('<p class="akapit_prawy_wezszy"> dzieñ &nbsp;-&nbsp;&nbsp; miesi±c &nbsp;&nbsp;-&nbsp;&nbsp; rok&nbsp;&nbsp;&nbsp;</p>');
  echo('</td>');
 echo('</tr>');

 echo('<tr>');
  
  				// -------------------------------------------------------- od kiedy rezerwacja
  echo('<td class="komorka_lewa">');
//dzien pocz±tkowy rezerwacji  
  echo '<select name="dzien_pocz">';
   for ( $dzien_teraz = 1; $dzien_teraz <= 31; $dzien_teraz++ )
   {
    if ( date( 'j' ) == $dzien_teraz )
	{
	 if ( $dzien_teraz < 10 )
	 echo "<option selected value=\"0".$dzien_teraz."\"> $dzien_teraz </option>";
     else
	 echo "<option selected value=\"$dzien_teraz\"> $dzien_teraz </option>";
	}
	else
    {
  	 if ( $dzien_teraz < 10 )
	 echo "<option value=\"0".$dzien_teraz."\"> $dzien_teraz </option>";
	 else
	 echo "<option value=\"$dzien_teraz\"> $dzien_teraz </option>";
    }
   }
  echo "</select>";

//miesi±c pocz±tkowy rezerwacji  
  echo('-<select name="miesiac_pocz" class="formularz_dodaj5" >');
    for ( $miesiac = 1; $miesiac <= 12; $miesiac++ )
    {
     switch ( $miesiac )
     {  
     case 1:  $miesiac_nazwa = "styczeñ"; break;
     case 2:  $miesiac_nazwa = "luty"; break;
     case 3:  $miesiac_nazwa = "marzec"; break;
     case 4:  $miesiac_nazwa = "kwiecieñ"; break;
     case 5:  $miesiac_nazwa = "maj"; break;
     case 6:  $miesiac_nazwa = "czerwiec"; break;
     case 7:  $miesiac_nazwa = "lipiec"; break;
     case 8:  $miesiac_nazwa = "sierpieñ"; break;
     case 9:  $miesiac_nazwa = "wrzesieñ"; break;
     case 10: $miesiac_nazwa = "pa¼dziernik"; break;
     case 11: $miesiac_nazwa = "listopad"; break;
     case 12: $miesiac_nazwa = "grudzieñ"; break;
     } 
    $miesiac_teraz = date( 'm' );
     if ( $miesiac == $miesiac_teraz )
	 {
	  if ( $miesiac < 10 )
	  echo("<option selected value=\"0".$miesiac."\"> $miesiac_nazwa </option>");
	  else
	  echo("<option selected value=\"$miesiac\"> $miesiac_nazwa </option>");
     }
	 else
	 {
	  if ( $miesiac < 10 )
	  echo("<option value=\"0".$miesiac."\"> $miesiac_nazwa </option>");
	  else
	  echo("<option value=\"$miesiac\"> $miesiac_nazwa </option>");
     }
    }    
  echo('</select>');

//rok pocz±tkowy rezerwacji   
    echo '-<select name="rok_pocz">';
     for ( $rok_teraz = 2008; $rok_teraz < 2013; $rok_teraz++ )
     {
      if ( date( 'Y' ) == $rok_teraz )
      echo "<option selected value=\"$rok_teraz\"> $rok_teraz </option>";
      else
      echo "<option value=\"$rok_teraz\"> $rok_teraz </option>";
     }
    echo "</select><br />";
    echo('</td>'); 
 
			// -------------------------------------------------------- do kiedy rezerwacja
   echo('<td class="komorka_prawa">');
//dzien koncowy rezerwacji  
   echo '<select name="dzien_kon">';
    for ( $dzien_teraz = 1; $dzien_teraz <= 31; $dzien_teraz++ )
    {
     if ( date( 'j' ) == $dzien_teraz )
 	 {
	  if ( $dzien_teraz < 10 )
	  echo "<option selected value=\"0".$dzien_teraz."\"> $dzien_teraz </option>";
      else
	  echo "<option selected value=\"$dzien_teraz\"> $dzien_teraz </option>";
	 }
	 else
     {
  	  if ( $dzien_teraz < 10 )
	  echo "<option value=\"0".$dzien_teraz."\"> $dzien_teraz </option>";
	  else
	  echo "<option value=\"$dzien_teraz\"> $dzien_teraz </option>";
     }
    }
   echo "</select>";

//miesi±c koñcowy rezerwacji  
   echo('-<select name="miesiac_kon" class="formularz_dodaj5" >');
    for ( $miesiac = 1; $miesiac <= 12; $miesiac++ )
    {
     switch ( $miesiac )
     {  
     case 1:  $miesiac_nazwa = "styczeñ"; break;
     case 2:  $miesiac_nazwa = "luty"; break;
     case 3:  $miesiac_nazwa = "marzec"; break;
     case 4:  $miesiac_nazwa = "kwiecieñ"; break;
     case 5:  $miesiac_nazwa = "maj"; break;
     case 6:  $miesiac_nazwa = "czerwiec"; break;
     case 7:  $miesiac_nazwa = "lipiec"; break;
     case 8:  $miesiac_nazwa = "sierpieñ"; break;
     case 9:  $miesiac_nazwa = "wrzesieñ"; break;
     case 10: $miesiac_nazwa = "pa¼dziernik"; break;
     case 11: $miesiac_nazwa = "listopad"; break;
     case 12: $miesiac_nazwa = "grudzieñ"; break;
     } 
    $miesiac_teraz = date( 'm' );
     if ( $miesiac == $miesiac_teraz )
	 {
	  if ( $miesiac < 10 )
	  echo("<option selected value=\"0".$miesiac."\"> $miesiac_nazwa </option>");
	  else
	  echo("<option selected value=\"$miesiac\"> $miesiac_nazwa </option>");
     }
	 else
	 {
	  if ( $miesiac < 10 )
	  echo("<option value=\"0".$miesiac."\"> $miesiac_nazwa </option>");
	  else
	  echo("<option value=\"$miesiac\"> $miesiac_nazwa </option>");
     }
	}    
   echo('</select> ');

//rok koncowy rezerwacji   
  echo '-<select name="rok_kon">';
   for ( $rok_teraz = 2008; $rok_teraz < 2013; $rok_teraz++ )
   {
    if ( date( 'Y' ) == $rok_teraz )
    echo "<option selected value=\"$rok_teraz\"> $rok_teraz </option>";
    else
    echo "<option value=\"$rok_teraz\"> $rok_teraz </option>";
   }
  echo "</select>";

   echo('</td>'); 
 echo('</tr>');

 echo('<tr>');
   echo('<td class="komorka_lewa">&nbsp;</td>');
   echo('<td class="komorka_prawa">&nbsp;</td>');
 echo('</tr>');

 echo('<tr>');
 echo('<td class="komorka_lewa">');
 echo("<input type=\"hidden\" name=\"rezerwuj_1_auto_id\" value=\"$auto_id\" />");
 echo("<input type=\"hidden\" name=\"rezerwuj_1_osoba_id\" value=\"$osoba_id\" />");
 echo("<input type=\"submit\" name=\"rezerwuj_1_auto\" value=\"Sprawd¼ termin\" class=\"przycisk1\" />");
  
 echo('</form>');
 echo('</td>');

 echo('</tr>');
 //echo("<h5>Zalogowani u¿ytkownicy mog± zarezerwowaæ auto na wybrany okres</h5>");
 //echo("<p style=\"color: red;\">DEBUG: niezalogowany</p>");
 }
 
 echo("</table>");
 echo("<br />");
unset( $markaID, $marka, $model, $rokProdukcji, $nrRejestracyjny, $statusPojazdu, $kategoriaID,
$kategoria, $pojemnosc, $moc, $skrzyniaID, $skrzynia, $paliwoID, $paliwo, $nadwozieID, $nadwozie,
$drzwiID, $drzwi, $kolorID, $kolor, $metalik, $zdjeciaID, $wyposazenieID, $wyposazenie );
?>