<?php
				 //dopisać każdego używanego GETa i POSTa !!!     
 if ( ( ! isSet( $_GET['link'] ) ) && ( ! isSet( $_GET['kat'] ) ) && ( ! isSet( $_GET['menu'] ) )
 && ( ! isSet( $_GET['wid'] ) ) && ( ! isSet( $_GET['uid'] ) ) && ( ! isSet( $_GET['cid'] ) )
 && ( ! isSet( $_POST['rodzaj_uzytkownikow'] ) ) && ( ! isSet( $_POST['dzialanie'] ) ) 
 && ( ! isSet( $_POST['marka'] ) ) && ( ! isSet( $_POST['szukaj'] ) ) && ( ! isSet( $_POST['rezerwuj_1_auto_id'] ) ) && ( ! isSet( $_POST['rezerwuj_2_auto_id'] ) ) && ( ! isSet( $_POST['anuluj_rez'] ) ) )
 
				 //dopisać każdego używanego GETa i POSTa !!!
 {
 //echo("<h2 style=\"color: red;\">DEBUG: link pusty!</h2>"); // debug
 include("./scripts/glowna_dzial.php");
 }

//a strona głowna?

// ------------------------------------------------------------------------------------------

// menu GŁÓWNE - nagłówek
 if ( isSet( $_GET['link'] ) )
 {
  switch ( $_GET['link'] ) // menu "publiczne"
  {
  //case "":
  //  echo("<h2>link pusty!</h2>");
  // include("./scripts/glowna_dzial.php");
  // break; 
  
  case "main":		 //główna !
    include("./scripts/glowna_dzial.php");
   break; 

  case "oferta":     //samochody
    include("./scripts/samochody_dzial.php");
   break; 

  case "promocje":   //promocje
    include("./scripts/promocje_dzial.php");
   break;

  case "regulamin":  //regulamin
    include("./scripts/regulamin_dzial.php");
   break; 

  case "o_firmie":  //o firmie
    include("./scripts/o_firmie_dzial.php");
   break; 

  case "kontakt":	//kontakt
    include("./scripts/kontakt_dzial.php");
   break;
   
  case "register":  //rejestracja użytkownika - PRZENIESIONO
	include("./scripts/uzytkownicy_rejestruj.php"); 
   break;

  } // switch-end
 } // "link" end

// ------------------------------------------------------------------------------------------

 if ( isSet( $_GET['kat'] ) )  //menu PUBLICZNE
 {
 $kategoriaID = $_GET['kat'];
  // sprawdzenie jakie są nazwy kategorii dla przekazanego ID kategorii

 $kwerenda = "SELECT nazwaKategorii, opisKategorii FROM auto_kategoria_tbl WHERE id=$kategoriaID LIMIT 1";
 $rezultat = mysql_query( $kwerenda );
  if ( ! $rezultat )
  {
  echo("<h3 style=\"color: red;\">Brak kategorii pojazdów w bazie danych lub błędny odnośnik.</h3>");
  }
  else
  {
  $wynik = mysql_fetch_row( $rezultat );
  $nazwa_kategorii = $wynik[0];
  $opis = $wynik[1]; 
 
 //wyświetlenie nazwy kategorii z opisem + auta w kategorii
  echo("<h3>$nazwa_kategorii</h3>");
  echo("<p class=\"akapit_wezszy\">");
  echo nl2br( $opis );   // wyświetlenie opisu wraz z nowymi liniami (o ile te zanki znajdują się w opisie danego auta w BD)
  echo "<br /><br /></p>";
      //echo("$opis</p>");
  //echo("<br />id=$kategoriaID");
  echo("<h3>Samochody w tej kategorii:</h3>");

$kwerenda2 = "SELECT id, markaID, model, rokProdukcji, kolorID, skrzyniaID, drzwiID FROM auto_tbl WHERE kategoriaID=$kategoriaID";
$rezultat2 = mysql_query( $kwerenda2 );
 if ( ! $rezultat2 )
 {
 echo("<h3 style=\"color: red;\">Brak pojazdów w bazie dla tej kategorii!</h3>");
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
  
  while( $wynik = mysql_fetch_row( $rezultat2 ) )
  {
  $ile_samochodow++;
  
  $id_pojazdu[]= $wynik[0];
  $marka_id[] = $wynik[1];
  $model[] = $wynik[2]; 
  $rok_produkcji[] = $wynik[3]; 
  $kolor_id[] = $wynik[4]; 
  $skrzynia_id[] = $wynik[5];
  $drzwi_id[] = $wynik[6];
  }

//pobranie wszystkich nazw marek samochodów do tablicy   
   $kwerenda3 = "SELECT id, marka FROM auto_marka_tbl";
   $rezultat3 = mysql_query( $kwerenda3 );
   $temp1 = array();
   $temp2 = array();
    while ( $wynik3 = mysql_fetch_row( $rezultat3 ) )
    {
    $temp1[] = $wynik3[0];
    $temp2[] = $wynik3[1];
    $marki = array_combine( $temp1, $temp2 );
    } 

//pobranie wszystkich kolorów samochodów do tablicy  
   $kwerenda3 = "SELECT id, kolor FROM auto_kolor_tbl";
   $rezultat3 = mysql_query( $kwerenda3 );
   $temp3 = array();
   $temp4 = array();
    while ( $wynik3 = mysql_fetch_row( $rezultat3 ) )
    {
    $temp3[] = $wynik3[0];
    $temp4[] = $wynik3[1];
    $kolory = array_combine( $temp3, $temp4 );
    } 

//pobranie wszystkich ilości drzwi samochodów do tablicy   
   $kwerenda3 = "SELECT id, liczbaDrzwi FROM auto_drzwi_tbl";
   $rezultat3 = mysql_query( $kwerenda3 );
   $temp1 = array();
   $temp2 = array();
    while ( $wynik3 = mysql_fetch_row( $rezultat3 ) )
    {
    $temp1[] = $wynik3[0];
    $temp2[] = $wynik3[1];
    $drzwii = array_combine( $temp1, $temp2 );
    } 

//pobranie wszystkich rodzajów skrzyni samochodów do tablicy  
   $kwerenda3= "SELECT id, typSkrzyni FROM auto_skrzynia_tbl";
   $rezultat3 = mysql_query( $kwerenda3 );
   $temp1 = array();
   $temp2 = array();
    while ( $wynik3 = mysql_fetch_row( $rezultat3 ) )
    {
    $temp1[] = $wynik3[0];
    $temp2[] = $wynik3[1];
    $skrzynie = array_combine( $temp1, $temp2 );
    } 

 //echo("<br />\$ile_samochodow: $ile_samochodow");
 //echo("<br />\$id_pojazdu[0]: $id_pojazdu[0]");
 //echo("<br />\$id_pojazdu[1]: $id_pojazdu[1]<br />");
 
 //wyświetlenie samochodów wraz z nazwą kategorii + opsi auta
   for ( $i = 0; $i < $ile_samochodow; $i++ )
   {
   $j = $i + 1;
   $zmienna = $kategoria_id[$i];
   $zmienna2 = $marka_id[$i];
   $zmienna3 = $kolor_id[$i];
   $skrzynia = $skrzynia_id[$i];
   $drzwi = $drzwi_id[$i];
   
   echo("<br /><h4 style=\"color: #82B8FB\">$j. <a href=\"./index.php?cid=$id_pojazdu[$i]\"> $marki[$zmienna2] $model[$i]</a></h4>");
   echo("<p class=\"akapit_wezszy\">&nbsp;&nbsp;&nbsp;&nbsp;rok produkcji: <b>$rok_produkcji[$i]</b>, skrzynia: <b> $skrzynie[$skrzynia]</b>, liczba drzwi: <b>$drzwii[$drzwi]</b>, <br />
&nbsp;&nbsp;&nbsp;&nbsp;kolor: <b>$kolory[$zmienna3]</b></p>");
   }
   //echo("<br /><h4 style=\"color: red\">DEBUG: kolory aut... są niezbyt.</h4>");
   
   unset( $kwerenda, $rezultat, $wynik, $marka, $kolor, $kolor_id, $markaID, $rok_produkcji );
   unset( $kwerenda2, $rezultat2, $wynik2, $kolory, $marki, $ile_samochodow, $temp1, $temp2,
    $temp3, $temp4 , $temp5, $temp6, $zmienna );

   unset( $kwerenda, $rezultat, $wynik, $marka, $kolor, $kolor_id, $markaID, $rok_produkcji );
   unset( $kwerenda4, $rezultat4, $wynik4, $kwerenda5, $rezultat5, $wynik5 );
   } 
  } //if-else-end
 } //kategorie aut


// ------------------------------------------------------------------------------------------
	//
 if ( isSet( $_GET['cid'] ) )  //menu PUBLICZNE
 {
 $autoID = $_GET['cid'];
 // sprawdzenie jakie są nazwy kategorii dla pzrekazanego ID kategorii
 $kwerenda = "SELECT id FROM auto_tbl WHERE id=$autoID LIMIT 1";
 $rezultat = mysql_query( $kwerenda );
  if ( ! $rezultat )
  {
  echo("<h3 style=\"color: red;\">Brak podanego pojazdu w bazie danych lub błędny odnośnik.</h3>");
  }
  else
  {
  include("./scripts/samochod_szczegoly.php"); 
  } 
 }

// ------------------------------------------------------------------------------------------
 
 if ( isSet( $_GET['menu'] ) )
 {
  if ( isSet( $_SESSION['zalogowany'] ) ) // czy osoba wywołujaca link jest zalogowana w serwisie?
  {
   switch ( $_GET['menu'] )
   {
   case "about":     //dane osobowe
     include("./scripts/dane_uzytkownika.php");
    break; 
  
  case "allnews":   //wszystkie wiadomosci
    include ("./scripts/wiadomosci_wszystkie.php");
   break;

  case "alldiscounts":   //wszystkie promocje
    include ("./scripts/promocje_wszystkie.php");
   break;

   case "booking":     //bieżące rezerwacje
    include("./scripts/rezerwacje_historia.php");
     //include("./scripts/rezerwacje_uzytkownika.php");
    break; 

//   case "booking_h":     //historia rezerwacji
//     include("./scripts/rezerwacje_historia.php");
//    break; 
 
   case "borrow":     //dane wypożyczenia
     include("./scripts/wypozyczenia_historia.php");
	 //include("./scripts/wypozyczenia_uzytkownika.php");
    break; 

//   case "borrow_h":     //historia wypożyczeń
//     include("./scripts/wypozyczenia_historia.php");
//    break; 

 
   case "change":     //dane osobowe
     include("./scripts/dane_uzytkownika_zmien.php");
    break; 
    
   case "dodaj_tresc":
     include("./scripts/tresc_dodaj.php");
    break;
 
   case "adm_kategor":
	 include("./scripts/kategorie_administruj.php");  
    break;
  
   case "dodaj_auto":
     include("./scripts/samochod_dodaj.php");
    break;

   case "users_show":
     include("./scripts/uzytkownicy_wybierz.php"); 
    break;


/*   case "users_admin":
	 include("./scripts/uzytkownicy_administruj.php"); 
    break; */
  
   //case "register":   //rejestracja użytkownika - PRZENIESIONO do GET["link"]
	// include("./scripts/uzytkownicy_rejestruj.php"); 
   // break;
   }  //switch-end 
  }
  else
  {
  echo('<h3 style="color: red;">Musisz być zalogowany, aby wykonać tę czynność!</h3>');
  }
 } //"menu" end

// ------------------------------------------------------------------------------------------

  // szczegóły użytkownika + modyfikacja
 if ( isSet( $_GET['uid'] ) )
 {
  if ( isSet( $_SESSION['zalogowany'] ) ) // czy osoba wywołujaca link jest zalogowana w serwisie?
  {
   if ( SprawdzUprawnieniaAdmina() ) // oprócz tego musi mieć iprawnienai administarcyjne
   {
   echo('<h3>Szczegóły odnośśnie wybranej osoby</h3><br />');
   WyswietlDaneOsoby( $_GET['uid'] ); 
   echo('<br />');

//pobranie wszystkich nazw użytkowników do tabeli   
   $kwerenda = "SELECT id, rolaNazwa FROM userRole_tbl";
   $rezultat = mysql_query( $kwerenda );
   $temp1 = array();
   $temp2 = array();
    while ( $wynik = mysql_fetch_row( $rezultat ) )
    {
    $temp1[] = $wynik[0];
    $temp2[] = $wynik[1];
    $role = array_combine( $temp1, $temp2 );
    } 
//
   $id_osoby = $_GET['uid']; 
   $kwerenda = "SELECT rolaID, blokada FROM user_tbl WHERE id=$id_osoby LIMIT 1";
   $rezultat = mysql_query( $kwerenda );
   	if ( $rezultat )
 	{
	$wynik = mysql_fetch_row( $rezultat );
	$temp2 = $wynik[0];   //rola ID
    $blokada = $wynik[1];
	// if ( $wynik[0] == 0) $zablokowany = "nie";
	// else $zablokowany = "tak";
	}

   echo('<table width="450" border = "0" align="center" cellpadding="0" cellspacing="2" >');
   echo('<tr>');
   echo('<td width="250">');
  
  //nie można w ogóle modyfikować ustawień innych adminów 
    if ( ( $role[$temp2] == "administrator" ) && ($id_osoby == $_SESSION['id'] )
       || ( $role[$temp2] != "administrator" ) )
    {
     if ( $id_osoby != $_SESSION['id'] ) //aby siebie nie można było zablokować
     {
	 echo('<form name="odblokuj_zablokuj" action = "./index.php" method = "post" >');
     echo("<input type=\"hidden\" name=\"osoba\" value=\"$id_osoby\" />");
      if ( $blokada == 0 ) // NIEzablokowany -> pokaż przycisk ZABLOKUJ
      {
      echo("<input type=\"hidden\" name=\"dzialanie\" value=\"zablokuj\" />");
      echo("<input type=\"submit\" value=\"Zablokuj użytkownika\" class=\"przycisk1\" />");
      }
      else // zablokowany -> pokaż przycisk ODBLOKUJ
      {
      echo("<input type=\"hidden\" name=\"dzialanie\" value=\"odblokuj\" />");
      echo("<input type=\"submit\" value=\"Odblokuj użytkownika\" class=\"przycisk1\" />");
      }
     echo('</form>'); 	
     echo('</td>');
	 }
	 else
	 {
 	 echo('&nbsp;</td>');
	 } 
    //echo('<td width="50">&nbsp;</td>');
     echo('<td>');
 
    // przeglądającemu adminowi zezwól na modyfikację TYLKO swoich danych, z wyłączeniem innych adminów  
     echo("<p class=\"akapit_prawy_wezszy\"><a style=\"color: red;\" href=\"./index.php?moduid=$wynik[0]\">modyfikuj dane osoby</a></p></td>");

    }
    else
    {
    echo('&nbsp;</td>');
    echo("<td><b>nie możesz</b> modyfikować ustawień innego administratora</td>");
    }
   echo('</tr>');	
   echo('</table>'); 
   }
   else
   {
   echo("<h2>Brak praw do oglądania wybranej pozycji dla bieżącego użytkownika!</h2>");
   echo("<h3>Nie zezwolono na pokazanie szczegółów!</h3>");
   } //if-"admin"-end
  } //if-zalogowany-end
  else
  {
  echo('<h3 style="color: red;">Musisz być zalogowany, aby wykonać tę czynność!</h3>');
  }
 } //uid

// ------------------------------------------------------------------------------------------

 if ( isSet( $_GET['wid'] ) )
 { 
  if ( isSet( $_SESSION['zalogowany'] ) ) // czy osoba wywołujaca link jest zalogowana w serwisie?
  {
 //przegląd wiadomosci
  $id_wiadomosci = $_GET['wid'];
  include("./scripts/tresc_modyfikuj.php");
  }
  else
  {
  echo('<h3 style="color: red;">Musisz być zalogowany, aby wykonać tę czynność!</h3>');
  } //if-zalogowany-end
 } // modyfikacja wiadomosci


// ****************************************   P O S T   ****************************************** 


       // wyszukiwanie zwykłe  --------------------------------------------- wyszukiwanie zwykłe
 if ( isSet( $_POST["szukaj"] ) )  // menu publiczne
 {
  if ( $_POST["szukaj"] == "" ) //puste pole formularza wyszukiwania 
  {
  echo('<h3 style="color: red;">Nie został podane wyrażenie do wyszukania!</h3>');
  }
  else
  {
  $ciag = $_POST["szukaj"]; 
  $ciag_wyszukiwania = "%".$ciag."%";
  $ile_marek = 0;
  $znalezione_auta_id = array();
  $znalezione_auta_ile = 0;
  
  //pobranie nr wszystkich nazw marek, które są w miarę zgodne z ciągiem  
  $kwerenda = "SELECT id FROM auto_marka_tbl WHERE marka LIKE '$ciag_wyszukiwania'";
  $rezultat = mysql_query( $kwerenda );
   while ( $wynik = mysql_fetch_row( $rezultat ) )
   {
   $ile_marek++;
   $temp = $wynik[0];
   $id_marek[] = $temp;
   } //while-end

   if ( $ile_marek > 0 ) //ze znaleziono cokolwiek pasującego w nazwie marki
   {
    for ( $i = 0; $i < $ile_marek; $i++ )
    {
    $temp = $id_marek[$i];
    $kwerenda = "SELECT id FROM auto_tbl WHERE markaID=$temp";
    $rezultat = mysql_query( $kwerenda );
     if ( $rezultat ) //gdy znaleziono jakąś furę z danej kategorii
 	 {
	  while ( $wynik = mysql_fetch_row( $rezultat ) )
	  {
	  $znalezione_auta_ile++;
	  $temp2 = $wynik[0];
	  $znalezione_auta_id[] = $temp2;
	  } //while-end
	 } //if-znaleziono
    } //for-end
   } //wyszukiwanie samochodów z nazwy marek
 
  $kwerenda = "SELECT id FROM auto_tbl WHERE model LIKE '$ciag_wyszukiwania'";
  $rezultat = mysql_query( $kwerenda );
   if ( $rezultat )
   {
    while ( $wynik = mysql_fetch_row( $rezultat ) )
    {
    $znalezione_auta_ile++;
    $temp = $wynik[0];
    $znalezione_auta_id[] = $temp;
    } //while-end
   }
     //wyświelenie wyników
  echo("<h3>Wyszukiwanie samochodu</h3>");
    
  if ( $znalezione_auta_ile <= 0 )
  {
  echo("<h4>Nie znaleziono pojazdów dla zapytania &bdquo;<span style=\"color: #82b8fb;\">$ciag</span>&rdquo;</h4>");
  }
  else // jeżeli znaleziono cokolwiek ==> wyświetl dane
  {
  echo("<h4>Dla zapytania &bdquo;<span style=\"color: #82b8fb; font-weight: bold; font-size: 120%;\">$ciag</span>&rdquo; znaleziono <b>$znalezione_auta_ile</b> wynik/wyników</h4>");
  
  //pobranie danych dodatkowych pojazdów -----------------------------

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
 
//pobranie wszystkich ilości drzwi samochodów do tablicy   
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
  										//------------------------------------
    for ( $i = 0 ; $i < $znalezione_auta_ile; $i++ )
	{
	$j = $i + 1;
	$nr_auta = $znalezione_auta_id[$i];
    $kwerenda = "SELECT markaID, model, kategoriaID, rokProdukcji, kolorID, skrzyniaID, drzwiID FROM auto_tbl WHERE id=$nr_auta";
    $rezultat = mysql_query( $kwerenda );
    $wynik = mysql_fetch_row( $rezultat );
	
	$marka_nr = $wynik[0];
	$model = $wynik[1];
	$kategoria_nr = $wynik[2];
	$rok_produkcji = $wynik[3];
	$kolor_nr = $wynik[4];
	$skrzynia_nr = $wynik[5];
	$drzwi_nr = $wynik[6];

        //naprawiono: przejście do przypisanej kategorii wyszukanego pojazdu w wyświetlanych wynikach, bezpośrednio z odnośnika danego pojazdu 
	echo("<h4 style=\"color: #82B8FB\">$j. <a href=\"./index.php?cid=$nr_auta\"> $marki[$marka_nr] $model</a> - kategoria <a href=\"./index.php?kat=$kategoria_nr\">$kategorie[$kategoria_nr]</a></h4>");
    echo("<p class=\"akapit_wezszy\">&nbsp;&nbsp;&nbsp;&nbsp;rok produkcji: <b>$rok_produkcji</b>, skrzynia: <b> $skrzynie[$skrzynia_nr]</b>, liczba drzwi: <b>$drzwii[$drzwi_nr]</b>, <br />
&nbsp;&nbsp;&nbsp;&nbsp;kolor: <b>$kolory[$kolor_nr]</b></p><br />");

    } 
  unset( $marki, $kolory, $kategorie, $drzwii, $skrzynie, $nr_auta, $znalezione_auta_ile, $i, $j );
  unset( $kwerenda, $kwerenda2, $rezultat, $rezultat2 );
  } // 
  //for ( 
 
  } // if-end "pusty formularz"
 } 
 

//-------------------------------------------------------------------------------------------- 
        // dodawanie tresci do serwisu  ------------------------------------------------------
 if ( isSet( $_POST["tytul_dodaj"] ) && isSet( $_POST["tresc_dodaj"] ) && isSet( $_POST["rodzaj_tresci_dodaj"] ) )
 {
  if ( isSet( $_SESSION['zalogowany'] ) ) // czy osoba wywołujaca link jest zalogowana w serwisie?
  {
  // gdy BIEŻˇCY UŻYTKOWNIK ma prawo ( ==true ) wykonać tę modyfikację to zezwól dalej na:
   if ( SprawdzUprawnieniaAdmina() )
   {
  
    if ( ( $_POST["tytul_dodaj"] == "") || ( $_POST["tresc_dodaj"] == "") || ( $_POST["rodzaj_tresci_dodaj"] == "") )
    {
    echo("<b>Nie zostały wypełnione wszystkie pola!</b><br />");
    echo("Treści <b>nie dodano!</b>");
    }
  
   $tytul = trim( $_POST["tytul_dodaj"] );
   $tresc = trim( $_POST["tresc_dodaj"] );
 
    switch ( $_POST["rodzaj_tresci_dodaj"] )
    {
    case "aktualnosci":			//ogłoszenie
      $rodzaj_tresci = 1;
     break;
   
    case "promocje":			//pormocje
      $rodzaj_tresci = 2;
     break;
    } //switch-end
  	
    switch ( $_POST["aktywna_promocja"] )
    {
    case "aktualna":			//od razu aktywne ogłoszenie
      $aktywna_promocja = 1;
     break;
   
    case "":			//pormocje
      $aktywna_promocja = 0;
     break;
    } //switch-end
	 		
   $tytul = addslashes( $tytul );  
   $tresc = addslashes( $tresc );
 
  /*echo ("<br />");
  echo( "\$_POST['tytul_dodaj'] = "); 
  echo( $_POST["tytul_dodaj"] ); echo("&nbsp;<b>vs</b>&nbsp;$tytul");
  echo ("<br />");
  echo( "\$_POST['tresc_dodaj'] = ");
  echo( $_POST["tresc_dodaj"] ); echo("&nbsp;<b>vs</b>&nbsp;$tresc");
  echo ("<br />");
  echo( "\$_POST['rodzaj_tresci_dodaj'] = "); 
  echo ($_POST["rodzaj_tresci_dodaj"]); echo("&nbsp;<b>vs</b>&nbsp;$rodzaj_tresci_dodaj"); */
   $id = $_SESSION['id'];
   $data = date( "Y-m-j");
   $czas = date( "G:i:s");
  //dodawanie danych z formularza 
   $kwerenda = "INSERT INTO tresc_tbl SET ID=NULL, trescRodzaj=$rodzaj_tresci, tytul='$tytul',
  			tresc='$tresc', zdjecia=1, autorID=$id, dataTresci='$data', czasTresci='$czas',  aktywne=$aktywna_promocja";
   $rezultat = mysql_query( $kwerenda, $db_link );
    if ( $rezultat ) echo("<h3>Dane dodano!</h3>");
    else echo ("<h3>Wystąpił błąd!</h3>");
   } //end-"uprawnienia-amina"
   else
   {
   echo("<h2>Brak praw dla bieżącego użytkownika!</h2>");
   echo("<h3>Nie zezwolono na modyfikację!</h3>");
   }
  } 
  else
  {
  echo('<h3 style="color: red;">Musisz być zalogowany, aby wykonać tę czynność!</h3>');
  }
 } //END-dodawanie tresci

// ------------------------------------------------------------------------------------------

  // modyfikacja tresci 
 if ( isSet( $_POST["tytul_modyf"] ) && isSet( $_POST["tresc_modyf"] ) && isSet( $_POST["rodzaj_tresci_modyf"] ) && isSet( $_POST['rodzaj_modyfikacji'] ) && isSet( $_POST['id_wiadomosci'] )  )
 {
  if ( isSet( $_SESSION['zalogowany'] ) ) // czy osoba wywołujaca link jest zalogowana w serwisie?
  {
 // gdy BIEŻˇCY UŻYTKOWNIK ma prawo ( ==true ) wykonać tą modyfikację to zezwól dalej na:
   if ( SprawdzUprawnieniaAdmina() )
   {
    if ( $_POST["rodzaj_modyfikacji"] == "usuniecie" )
    {  
   // usun
    $id_wiadomosci = $_POST['id_wiadomosci'];

    $kwerenda = "DELETE FROM tresc_tbl WHERE id=$id_wiadomosci";
    $rezultat = mysql_query( $kwerenda );
     if ( $rezultat ) echo("<h3>Rekord usunięto</h3>");
     else echo("<h3>Nie udało się usunąć rekordu!</h3>");   
    }
  
    if ( $_POST["rodzaj_modyfikacji"] == "edycja" )
    {
    // gdy modyfikacja to sprawdzenie zawartosci pól
     if ( ( $_POST["tytul_modyf"] == "") || ( $_POST["tresc_modyf"] == "") || ( $_POST["rodzaj_tresci_modyf"] == "") )
     {
     echo("<b>Nie zostały wypełnione wszystkie pola!</b><br />");
     echo("Treści <b>nie zamodyfikowano!</b>");
     }
  
    $tytul_modyf = trim( $_POST["tytul_modyf"] );
    $tresc_modyf = trim( $_POST["tresc_modyf"] );
  
     switch ( $_POST["rodzaj_tresci_modyf"] )
     {
     case "aktualnosci":			//ogłoszenie
       $rodzaj_tresci_modyf = 1;
      break;
    
	 case "promocje":			//promocje
       $rodzaj_tresci_modyf = 2;
      break;
     } //switch-end
  	
	 switch ( $_POST['aktywna_promocja_modyf'] )
	 {
     case "aktualna":			//aktywne
       $aktywna_promocja = 1;
      break;
    
	 case "":			//minione
       $aktywna_promocja = 0;
      break;
	 }
	 		
    $tytul = addslashes( $tytul );  
    $tresc = addslashes( $tresc );
    $id_wiadomosci = $_POST['id_wiadomosci'] ;
 
  /* echo ("DEBUG:<br />");
   echo( "\$_POST['tytul_modyf'] = "); 
   echo( $_POST["tytul_modyf"] ); echo("&nbsp;<b>vs</b>&nbsp;$tytul_modyf");
   echo ("<br />");
   echo( "\$_POST['tresc_modyf'] = ");
   echo( $_POST["tresc_modyf"] ); echo("&nbsp;<b>vs</b>&nbsp;$tresc_modyf");
   echo ("<br />");
   echo( "\$_POST['rodzaj_tresci_modyf'] = "); 
   echo ($_POST["rodzaj_tresci_modyf"]); echo("&nbsp;<b>vs</b>&nbsp;$rodzaj_tresci_modyf"); */
    $id = $_SESSION['id'];  // ID_użytkownika !
    $data = date( "Y-m-j");
    $czas = date( "G:i:s");
	$zdjeciaID = 1;
	
// dodawanie danych z formularza 
    $kwerenda = "UPDATE tresc_tbl SET trescRodzaj=$rodzaj_tresci_modyf, tytul='$tytul_modyf',
 			tresc='$tresc_modyf', zdjecia=$zdjeciaID, autorID='$id', dataTresci='$data', czasTresci='$czas', aktywne=$aktywna_promocja WHERE id=$id_wiadomosci";
    $rezultat = mysql_query( $kwerenda, $db_link );
     if ( $rezultat ) echo("<h3>Dane zmieniono!</h3>");
     else echo ("<h3>Wystąpił błąd</h3>");
    } //id-end modyfikacja
   } //zezwolenie na modyfikację
   else
   {
   echo("<h2>Brak praw do modyfikacji dla bieżącego użytkownika!</h2>");
   echo("<h3>Nie zmieniono zawartości w witrynie!</h3>");
   } //if-else-"admin"-end
  }
  else
  {
  echo('<h3 style="color: red;">Musisz być zalogowany, aby wykonać tą czynność!</h3>');
  } //if-zalogowany-end
 } // modyfikacja-wiaomości-end

// ------------------------------------------------------------------------------------------

// wyświtlenie nazw użytkowników
 if ( ( isSet( $_POST['rodzaj_uzytkownikow'] ) ) && ( isSet( $_POST['rodzaj_sortowania'] ) ) )
 {
  if ( isSet( $_SESSION['zalogowany'] ) ) // czy osoba wywołujaca link jest zalogowana w serwisie?
  {
   if ( SprawdzUprawnieniaAdmina() )
   {
    switch ( $_POST['rodzaj_uzytkownikow'] )
    {
    case "administratorzy":
 	   $rola_uzytkownika_zbior = "1";
	 break;

    case "pracownicy":
	   $rola_uzytkownika_zbior = "2";
	 break;
 
    case "wszyscy_pracownicy":
	   $rola_uzytkownika_zbior = "1, 2";
	 break;
	     
    case "klienci":
	   $rola_uzytkownika_zbior = "3";
	 break;
   
    case "wszyscy":
	   $rola_uzytkownika_zbior = "1, 2, 3";
	 break;
    }
 
   switch ( $_POST['imie_szukaj'] )
   {
   case "":
	 $imie_szukaj = "%";
    break;

   default:
      $temp = $_POST['imie_szukaj'];
      $imie_szukaj = "%".$temp."%";
	//break;
   }
	     
   switch ( $_POST['nazwisko_szukaj'] )
   {
   case "":
	  $nazwisko_szukaj = "%";
    break;

   default:
      $temp = $_POST['nazwisko_szukaj'];
 	  $nazwisko_szukaj = "%".$temp."%";
	//break;
   }
  
   switch ( $_POST['wyswietl_zablokow'] )
   {
   case "tylko_zablokowani":
     $zablokowani = "AND blokada <> 0";
    break; 
 
   case "":
     $zablokowani = "";
    break;  
   }
   
   switch ( $_POST['rodzaj_sortowania'] )
   {
   case "rola_nazwisko":
	  $sortowanie = "rolaID, nazwisko, imie, nazwaFirmyID";
	break;

   case "data_rejestr":
	  $sortowanie = "dataRejestracji";
    break;
   }
   
//pobranie wszystkich nazw firm do tabeli   
  $kwerenda = "SELECT id, nazwaFirmy FROM firma_tbl";
  $rezultat = mysql_query( $kwerenda );
  $temp1 = array();
  $temp2 = array();
   while ( $wynik = mysql_fetch_row( $rezultat ) )
   {
   $temp1[] = $wynik[0];
   $temp2[] = $wynik[1];
   $firmy = array_combine( $temp1, $temp2 );
   };

//pobranie wszystkich nazw użytkowników do tabeli   
  $kwerenda = "SELECT id, rolaNazwa FROM userRole_tbl";
  $rezultat = mysql_query( $kwerenda );
  $temp1 = array();
  $temp2 = array();
   while ( $wynik = mysql_fetch_row( $rezultat ) )
   {
   $temp1[] = $wynik[0];
   $temp2[] = $wynik[1];
   $role = array_combine( $temp1, $temp2 );
   };  

  $kwerenda = "SELECT id, nazwisko, imie, nazwaFirmyID, blokada, rolaID FROM user_tbl WHERE nazwisko LIKE '$nazwisko_szukaj' AND imie LIKE '$imie_szukaj' AND rolaID IN ($rola_uzytkownika_zbior) $zablokowani ORDER BY $sortowanie";
  $rezultat = mysql_query( $kwerenda ); 
   if ( ( $rezultat !== NULL) && ( $rezultat != 0 ) )
   {
    //if ( $rezultat != 0 ) 
	//{
	echo('<table width="450" align="center" cellpadding="0" cellspacing="0">');
    echo('<tr class="tab_kolumna"><td class="tab_komorka">Nr</td><td class="tab_komorka">Nazwisko</td><td class="tab_komorka">Imię</td><td class="tab_komorka">Firma</td><td class="tab_komorka">Blokada</td><td class="tab_komorka">Rola</td><td class="tab_komorka">Profil</td></tr>');  
    $temp = 0;
	 while ( $wynik = mysql_fetch_row( $rezultat ) )
     {
     $temp++;
	 echo("<tr><td class=\"tab_komorka\">".$temp.".</td>");   //numer porządkowy
	 echo("<td class=\"tab_komorka\">$wynik[1]</td>");  //nazwisko
	 echo("<td class=\"tab_komorka\">$wynik[2]</td>");  //imię
	 $temp2 = $wynik[3];
	 echo("<td class=\"tab_komorka\">$firmy[$temp2]</td>");  //nazwa firmy
	  if ( $wynik[4] == 0 ) echo("<td class=\"tab_komorka\">nie</td>");    //blokada korzystania
	  else echo("<td class=\"tab_komorka\" style=\"color: red;\">tak</td>");
	 $temp2 = $wynik[5];
     echo("<td class=\"tab_komorka\">");
	  switch ( $temp2 ) //kolorki tła
	  {
	  case 1:
	    echo('<p class="rola_admin">');
	   break;
	  
	  case 2:
	    echo('<p class="rola_pracownik">');
	   break;

      case 3:
	    echo('<p class="rola_klient">');
	   break;
	  }
	 echo("$role[$temp2]</p></td>");  //rola uzytkownika
	 
     echo("<td class=\"tab_komorka\"><a href=\"./index.php?uid=$wynik[0]\">szczegóły</a></td>");  //
// + if admin ....	
 /*     if ( $role[$temp2] == "administrator" )
	  {
	  $temp3 = $wynik[0];
	   if ( $temp3 == $_SESSION['id'] )
	   {
	  // przerglądającemu adminowi zezwól na modyfikację TYLKO swoich danych, z wyłączeniem innych adminów  
	   echo("<td class=\"tab_komorka\"><a style=\"color: red;\" href=\"./index.php?moduid=$wynik[0]\">edit</a></td>");
	   }
	   else
	   {
	   echo("<td class=\"tab_komorka\">&nbsp;</td>");
	   }
	  }
	  else
	  {
	  echo("<td class=\"tab_komorka\"><a style=\"color: red;\" href=\"./index.php?moduid=$wynik[0]\">edit</a></td>");
	  }   */
	 echo("</tr>");
     } //while-end
    echo("</table>");
    } //if (<table
 //  } //
    else
	{
	echo("Brak wyników spełniających kryterium!");
 	}
/*   else
   {
   echo("Brak wyników spełniających kryterium!");
   } */
   } 
   else
   {
   echo("<h2>Brak praw do modyfikacji dla bieżącego użytkownika!</h2>");
   echo("<h3>Nie zmieniono zawartości w witrynie!</h3>");
   } // if-"uprawnienia-admina"
  }
  else
  {
  echo('<h3 style="color: red;">Musisz być zalogowany, aby wykonać tę czynność!</h3>');
  } //if-zalogowany-end
 }
 
 // ------------------------------------------------------------------------------------------
    // blokowanie i odblokowywanie użytkowników
 if ( ( isSet( $_POST['dzialanie'] ) ) && ( isSet( $_POST['osoba'] ) ) )
 {
  if ( isSet( $_SESSION['zalogowany'] ) ) // czy osoba wywołujaca link jest zalogowana w serwisie?
  {
   if ( SprawdzUprawnieniaAdmina() ) // działanie tylko dla adminów 
   {
    if ( $_POST['osoba'] == $_SESSION['id'] )
	{
    echo('<h3 style="color: red;">Nie możesz sam siebie zablokować!</h3>');
	}
	else
	{
    $id_osoby = $_POST['osoba'];
    $kwerenda = "SELECT blokada, rolaID, imie, nazwisko FROM user_tbl WHERE id=$id_osoby";
    $rezultat = mysql_query( $kwerenda );
    $wynik = mysql_fetch_row( $rezultat );
    $temp = $wynik[0];  //0=aktywny (+),  0!=zablokowany (-)
	$temp2 = $wynik[1];  //rolaID osoby
	$imie = $wynik[2];
	$nazwisko = $wynik[3];

    $kwerenda = "SELECT rolaNazwa FROM userRole_tbl WHERE id=$temp2";
    $rezultat = mysql_query( $kwerenda );
    $wynik = mysql_fetch_row( $rezultat );
    $temp3 = $wynik[0];  //
  
     if ( $temp3 == "administrator" )
	 {
     echo('<h3 style="color: red;">Nie możesz zablokować innego administratora!</h3>');
	 }
	 else //inny użytkownik niż administrator 
     {	
	  if ( $temp == 0 ) //konto jest aktywne - można tylko je odblokować
	  {
	   if ( $_POST['dzialanie'] == "zablokuj" )
	   {
	   $kwerenda = "UPDATE user_tbl SET blokada=1 WHERE id=$id_osoby";
       $rezultat = mysql_query( $kwerenda );
        if ( $rezultat )
		{
		echo("<h3>Udało się zablokować konto użytkownika $imię $nazwisko! </h3>");
		echo('<br />');
	    echo("<p class=\"akapit_prawy_wezszy\"><a href=\"./index.php?uid=$id_osoby\">Powrót do szczegółów wybranego konta użytkownika</a></p>");  
		}
	   }
	   
	   if ( $_POST['dzialanie'] == "odblokuj" )
	   {
	   echo("<h3 style=\"color: red;\">Nie można odblokować AKTYWNEGO konta użytkownika! </h3>");
	   }
	  }
	  else // konto zablokowane - można je tylko odblokować
	  {
	   if ( $_POST['dzialanie'] == "zablokuj" )
	   {
	   echo("<h3 style=\"color: red;\">Nie można zablokować już ZABLOKOWANEGO konta użytkownika! </h3>");
  }
	   
	   if ( $_POST['dzialanie'] == "odblokuj" )
	   {
	   $kwerenda = "UPDATE user_tbl SET blokada=0 WHERE id=$id_osoby";
       $rezultat = mysql_query( $kwerenda );
        if ( $rezultat )
		{
		echo("<h3>Udało się zablokować konto użytkownika $imię $nazwisko! </h3>");
		echo('<br />');
	    echo("<p class=\"akapit_prawy_wezszy\"><a href=\"./index.php?uid=$id_osoby\">Powrót do szczegółów wybranego konta użytkownika</a></p>");  
		}
	   }
	  } //?
	 } //czy jest adminem -end 
    }
	
   } 
   else
   {
   echo("<h2>Brak praw do modyfikacji dla bieżącego użytkownika!</h2>");
   echo("<h3>Nie zmieniono zawartości w witrynie!</h3>");
   } // if-"uprawnienia-admina"
  }
  else
  {
  echo('<h3 style="color: red;">Musisz być zalogowany, aby wykonać tę czynność!</h3>');
  } //if-zalogowany-end
 }

// ----------------------------------------------------------------------------------------------
    // dodawanie auta
 if ( ( isSet( $_POST['marka'] ) ) && ( isSet( $_POST['model'] ) ) && ( isSet( $_POST['kategoria'] ) ) && ( isSet( $_POST['kolor'] ) ) )
 {
  if ( isSet( $_SESSION['zalogowany'] ) ) // czy osoba wywołujaca link jest zalogowana w serwisie?
  {
   if ( SprawdzUprawnieniaAdmina() ) // działanie tylko dla adminów 
   {
   
   $markaID = $_POST['marka'];
   $model = $_POST['model'];
   $rok_produkcji = (int) $_POST['rok_produkcji']; 	
   $nr_rejestracyjny = $_POST['nr_rejestracyjny'];
   $status_pojazdu = $_POST['status_pojazdu']; 
   $kategoriaID = $_POST['kategoria'];
   $pojemnosc = (int) $_POST['pojemnosc']; 	
   $moc	= (int) $_POST['moc'];
   $skrzyniaID = $_POST['skrzynia']; 	
   $paliwoID = $_POST['paliwo'];
   $nadwozieID = $_POST['nadwozie']; 	
   $drzwiID = $_POST['liczba_drzwi'];
   //$wyposazenieID = $_POST['wyposazenie']; 	
    if ( $_POST['wyposazenie'] == "") $wyposazenieID = 1;  //?
	else $wyposazenieID = 2;  //???
   $kolorID = $_POST['kolor']; 	
    if ( $_POST['metalik'] == "metalik" ) $metalik = 1; 
	else $metalik = 0;	
    
 						   // ------------------------------  # OBRAZKI
 $pliki_zdjecia = array();
 $zdjecia_nazwy_stare = array();
 $zdjecia_nazwy_nowe = array();
 $zdjecia_bledy = array();
 $zdjecia_tymczasowe_nazwy = array(); 
 $pliki_graficzne = array();
 $ile_zdjec = 0;
 
 if ( isSet( $_FILES['zdjecie1']['error'] ) )
 {
 $ile_zdjec++; 
  if ( $_FILES['zdjecie1']['error'] == UPLOAD_ERR_OK )
  {
  $zdjecia_nazwy_stare[] = $_FILES['zdjecie1']['name'];
  $nazwa_stara = $_FILES['zdjecie1']['name'];
  $zdjecia_nazwy_nowe[] = ZmienNazwePlikuGraficznego( $nazwa_stara );
  $zdjecia_tymczasowe_nazwy[] = $_FILES['zdjecie1']['tmp_name']; 
  $pliki_graficzne[] = true;
  }
 $zdjecia_bledy[] = $_FILES['zdjecie1']['error'];
 }  
 
 if ( isSet( $_FILES['zdjecie2']['error'] ) )
 {
 $ile_zdjec++;
  if ( $_FILES['zdjecie2']['error'] == UPLOAD_ERR_OK )
  {
  $zdjecia_nazwy_stare[] = $_FILES['zdjecie2']['name'];
  $nazwa_stara = $_FILES['zdjecie2']['name'];
  $zdjecia_nazwy_nowe[] = ZmienNazwePlikuGraficznego( $nazwa_stara );
  $zdjecia_tymczasowe_nazwy[] = $_FILES['zdjecie2']['tmp_name']; 
  $pliki_graficzne[] = true;
  }
 $zdjecia_bledy[] = $_FILES['zdjecie2']['error'];
 }  

 if ( isSet( $_FILES['zdjecie3']['error'] ) )
 {
 $ile_zdjec++;
  if ( $_FILES['zdjecie3']['error'] == UPLOAD_ERR_OK )
  {
  $zdjecia_nazwy_stare[] = $_FILES['zdjecie3']['name'];
  $nazwa_stara = $_FILES['zdjecie3']['name'];
  $zdjecia_nazwy_nowe[] = ZmienNazwePlikuGraficznego( $nazwa_stara );
  $zdjecia_tymczasowe_nazwy[] = $_FILES['zdjecie3']['tmp_name']; 
  $pliki_graficzne[] = true;
  }
 $zdjecia_bledy[] = $_FILES['zdjecie3']['error'];
 }  

 if ( isSet( $_FILES['zdjecie4']['error'] ) )
 {
 $ile_zdjec++;
  if ( $_FILES['zdjecie4']['error'] == UPLOAD_ERR_OK )
  {
  $zdjecia_nazwy_stare[] = $_FILES['zdjecie4']['name'];
  $nazwa_stara = $_FILES['zdjecie4']['name'];
  $zdjecia_nazwy_nowe[] = ZmienNazwePlikuGraficznego( $nazwa_stara );
  $zdjecia_tymczasowe_nazwy[] = $_FILES['zdjecie4']['tmp_name'];  
  $pliki_graficzne[] = true;
  }
 $zdjecia_bledy[] = $_FILES['zdjecie4']['error'];
 }  

 for ( $i = 0 ; $i < $ile_zdjec ; $i++ )
 {
  if ( $zdjecia_nazwy_nowe[$i] == false)
  {
  echo("<br /><h3 style=\"color: red;\">Plik załączony jako zdjęcie nr ".($i+1)." nie jest plikiem graficznym!</h3>");
  $pliki_graficzne[$i] = false;
  }
  else //gdy graficzny plik
  {
  $pliki_zdjecia[$i] = $upload_dir.$zdjecia_nazwy_nowe[$i];      // dodanie podkatalogu do nazwy
   
   if ( ( move_uploaded_file( $zdjecia_tymczasowe_nazwy[$i], $pliki_zdjecia[$i] ) ) 
       && ( $pliki_graficzne[$i] ) )
   {
   echo "<h3><a href=\"./$pliki_zdjecia[$i]\">Link</a> do uprzednio wysłanego pliku: ";
   echo "<a href=\"$pliki_zdjecia[$i]\"><img src=\"./$pliki_zdjecia[$i]\" height=101 width=101></a>";
   echo "</h3>";
   echo "<br />";
   } 
   else
   {
   echo "Nieprawidłowy plik <b>$zdjecia_nazwy_nowe[$i]</b><br />";
   } // if-end "przenoszenie pliku"
  } // if-end "błędna nazwa"

  if ( $zdjecia_bledy[$i] != UPLOAD_ERR_OK )
  {
  echo "<p style=\"color: red;\">Wystąpił błąd nr ",  $zdjecia_bledy[$i], ": ";
  
   switch( $zdjecia_bledy[$i] )
   {
   case "UPLOAD_ERR_INI_SIZE" :
   case "UPLOAD_ERR_FORM_SIZE" :
    echo("Przekroczono maksymalny rozmiar pliku!</p>");
    break;
   case "UPLOAD_ERR_PARTIAL" :
    echo("Odebramo tylko część pliku!</p>");
    break;
   case "UPLOAD_ERR_NO_FILE" :
    echo("Plik nie został pobrany!</p>");
    break;
   default :
    echo("Nieznany typ błędu!</p>");
   } //switch-end
  } // if-end "nowa_nazwa_pliku false"
 } // FOR-end
  
   $kwerenda = "INSERT INTO auto_tbl SET `ID`=NULL, `markaID`=$markaID, `model`='$model', `nrRejestracyjny`='$nr_rejestracyjny', `rokProdukcji`='$rok_produkcji', `statusPojazdu`=$status_pojazdu, `kategoriaID`=$kategoriaID, `pojemnosc`=$pojemnosc, `moc`=$moc, `skrzyniaID`=$skrzyniaID, `paliwoID`=$paliwoID, `nadwozieID`=$nadwozieID, `drzwiID`=$drzwiID, `wyposazenieID`=$wyposazenieID, `kolorID`=$kolorID, `metalik`=$metalik"; 

    $rezultat = mysql_query( $kwerenda );
echo("<br /><br />Zapytanie zmodyfikowało ".mysql_affected_rows()." wierszy"); 
 
    if ( ! $rezultat )
	{
    echo("<br /><br />");
	echo ("<h3 style=\"color: red;\">Wystapił błąd!".mysql_error( $rezultat )/"</h3>");
	}
    else
	{
    echo("<br /><br />");
	echo ('<h3>Dane samochodu wstawiono do bazy pomyślnie!</h3>');
	
	// podzapytanie - najpierw wydbycie ID właśnie wstawionego pojazdu
	    // zakładam, ze jest to ten ostatnio dodany pojazd
	$kwerenda2 = "SELECT MAX(id) FROM auto_tbl";
    $rezultat2 = mysql_query( $kwerenda2 );
	$wynik2 = mysql_fetch_row( $rezultat2 );
	
	$id_pojazdu = $wynik2[0];   // ID dodanego właśnie pojazdu
    echo("<h4 style=\"color: red;\">ID dodanego pojazdu: $id_pojazdu");
 
    $id_zdjec = array();
	$ile_zdjec_dodano = 0;
	
     for ( $i = 0 ; $i < $ile_zdjec; $i++ )
	 { 
	  if ( $pliki_graficzne[$i] )
	  {
	  $zmienna = $zdjecia_nazwy_nowe[$i]; //nazwa w katalogu z obrazkami
	  
	  $kwerenda2 = "INSERT INTO zdjecia_tbl SET ID=NULL, url='$zmienna'";
      $rezultat2 = mysql_query( $kwerenda2 );
	
	   if ( $rezultat2 )   // gdy poprawnie dodano zdjecie do bazy
	   {
	   $ile_zdjec_dodano++;  //zwiększ liczbę dodanych zdjeć
	    
		$kwerenda3 = "SELECT id FROM zdjecia_tbl WHERE url='$zmienna'";
        $rezultat3 = mysql_query( $kwerenda3 );
	    $wynik3 = mysql_fetch_row( $rezultat3 ); 
	    $id_zdjec[] = $wynik3[0]; 
	   }
	  } // if-end "pliki graficzne"
	 } // for-end

     for ( $i =0 ; $i <	$ile_zdjec_dodano; $i++ )
	 {
     $zmienna = $id_zdjec[$i]; //nazwa w katalogu z obrazkami
	  
	 $kwerenda2 = "INSERT INTO auto_zdjecia_tbl SET ID=NULL, autoID=$id_pojazdu, zdjecieID=$zmienna";
     $rezultat2 = mysql_query( $kwerenda2 );

	   if ( $rezultat2 )   // gdy poprawnie dodano zdjecie do bazy
	   {
	   echo(" Dodano poprawnie <b> $i </b zdjęcie. ");
	   }
	 } // for-end
	}
	
   // usuwanie zmiennych 
   unset( $markaID, $model, $kategoriaID, $pojemnosc, $moc, $skrzyniaID, $paliwoID, $nadwozieID, $drzwiID, $wyposazenieID, $kolor, $metalik, $zdjecie1, $zdjecie2, $zdjecie3 );
   unset( $zmienna, $zmienna2, $kwerenda, $kwerenda2, $kwerenda3, $rezultat, $rezultat2, $rezultat3, $wynik, $wynik2, $wynik3, $id_pojazdu );
   unset( $pliki_zdjecia, $zdjecia_nazwy_stare, $zdjecia_nazwy_nowe, $zdjecia_bledy, $zdjecia_tymczasowe_nazwy, $pliki_graficzne, $ile_zdjec, $id_zdjec, $ile_zdjec_dodano );

   } 
   else
   {
   echo("<br />");
   echo("<h2>Brak praw do modyfikacji dla bieżącego użytkownika!</h2>");
   echo("<h3>Nie zmieniono zawartości w witrynie!</h3>");
   } // if-"uprawnienia-admina"
  }
  else
  {
  echo('<h3 style="color: red;">Musisz być zalogowany, aby wykonać tę czynność!</h3>');
  } //if-zalogowany-end
 } // end "dodawanie auta"
 
 
//------------------------------------------------------------------------------------------------

      //sprawdzenie rezerwacji
 if ( ( isSet( $_POST['rezerwuj_1_auto_id'] ) ) && ( isSet( $_POST['rezerwuj_1_osoba_id'] ) ) )
 {
  if ( isSet( $_SESSION['zalogowany'] ) ) // czy osoba wywołujaca link jest zalogowana w serwisie?
  {
   if ( SprawdzUprawnieniaAdmina() ) // oprócz tego musi mieć uprawnienai administarcyjne
   {
    if ( $_POST['rezerwuj_1_osoba_id'] == $_SESSION['id'] )
	{
    $dzien_poczatkowy = $_POST['dzien_pocz'];
    $miesiac_poczatkowy = $_POST['miesiac_pocz'];
    $rok_poczatkowy = $_POST['rok_pocz'];
 
    $dzien_koncowy = $_POST['dzien_kon'];
    $miesiac_koncowy = $_POST['miesiac_kon'];
    $rok_koncowy = $_POST['rok_kon'];
   
    $auto_id = $_POST['rezerwuj_1_auto_id'];
   
    $data_poczatkowa_ludzka = $dzien_poczatkowy."-".$miesiac_poczatkowy."-".$rok_poczatkowy;
    $data_poczatkowa = $rok_poczatkowy."-".$miesiac_poczatkowy."-".$dzien_poczatkowy;

    $data_koncowa_ludzka = $dzien_koncowy."-".$miesiac_koncowy."-".$rok_koncowy;
    $data_koncowa = $rok_koncowy."-".$miesiac_koncowy."-".$dzien_koncowy;
    $jest_blad = false;

    //$dzien_teraz = date("j"); 
    //$miesiac_teraz = date( "m" );
    //$rok_teraz = date( "Y" );
   	
	$data_teraz = date( "Y-m-d" );	//"d", NIE "j" !!!
/*
	// ---------------------------------	debug_mode
	echo('<p class="ramka_status">') ;
	echo('DEBUG MODE <br />') ;
	echo('data_początkowa: <strong>'.$data_poczatkowa.'</strong><br />') ; 
	echo('data_końcowa: <strong>'.$data_koncowa.'</strong><br />') ; 	
	echo('data_teraz: <strong>'.$data_teraz.'</strong><br />') ; 
	echo('</p>') ;
// ---------------------------------	debug_mode END	
*/
     if ( $data_poczatkowa < $data_teraz )
	 {
	 echo('<h4 style="color: red">BŁˇD: data początkowa rezerwacji wcześniejsza od obecnej daty!</h4>'); 
     $jest_blad = true;
	 }
	 
	 if ( $data_poczatkowa < $data_teraz )
	 {
	 echo('<h4 style="color: red">BŁˇD: data końcowa rezerwacji wcześniejsza od obecnej daty!</h4>'); 
	 $jest_blad = true;
	 }
	 
	 if (  $data_poczatkowa > $data_koncowa )
	 {
	 echo('<h4 style="color: red">BŁˇD: data końcowa rezerwacji wcześniejsza od daty początkowej!</h4>'); 
	 $jest_blad = true;
	 }

    $kwerenda = "SELECT `model`, `markaID` FROM `auto_tbl` WHERE `ID`=$auto_id LIMIT 1"; 
	$rezultat = mysql_query( $kwerenda );
	 if ( $rezultat )
	 { //znaleziono auto w bazie
	 $wynik = mysql_fetch_row( $rezultat );
	 $model = $wynik[0];
	 $marka_id = $wynik[1];
	
	  $kwerenda2 = "SELECT marka FROM auto_marka_tbl WHERE ID=$marka_id LIMIT 1";
	  $rezultat2 = mysql_query( $kwerenda2 );
	  $wynik2 = mysql_fetch_row( $rezultat2 );
	  $marka = $wynik2[0]; 
	
      echo('<h3>Sprawdzanie dostępnośści auta do rezerwacji</h3>');
      //echo('<br />');
      echo('<p class="akapit_wezszy">');
      echo('<br />Data początkowa: <span style="color: red; font-weight: bold">');
      echo("$data_poczatkowa_ludzka </span> ");
      $data_poczatkowa_ok = SprawdzDate ( $dzien_poczatkowy , $miesiac_poczatkowy, $rok_poczatkowy ); 
       if ( $data_poczatkowa_ok ) 
 	   echo('<span style="color: #162C8C; font-weight: bold;"> (Data OK)</span><br />');
	   else
	   echo('<span style="color: red; font-weight: bold;">Data BŁĘDNA!</span><br />');
      echo('<br />Data końcowa: <span style="color: red; font-weight: bold ">');
      echo("$data_koncowa_ludzka </span>"); 
      $data_koncowa_ok = SprawdzDate ( $dzien_koncowy , $miesiac_koncowy, $rok_koncowy ); 
      
	   if ( $data_koncowa_ok ) 
	   echo('<span style="color: #162C8C; font-weight: bold;"> (Data OK)</span><br />');
	   else
	   echo('<span style="color: red; font-weight: bold;">Data BŁĘDNA!</span><br />');
      echo('</p>');
  
      if ( ( $data_poczatkowa_ok ) && ( $data_koncowa_ok ) && ( ! $jest_blad ) )
      {

	   // sprawdzenie w bazie wolnego okresu dla tego auta 
	   $rezerwacja = true;
	    
	   //$kwerenda2 = "SELECT `ID_rezerwacji`, `dataRez`, `dataPocz`, `dataKonc` FROM `rezerwacje_tbl` WHERE (`fk_autoID`=$auto_id) && ( `dataPocz` BETWEEN '$data_poczatkowa' AND '$data_koncowa' || `dataKonc` BETWEEN '$data_poczatkowa' AND '$data_koncowa' )";
	   
$kwerenda2 = "SELECT `ID_rezerwacji`, `dataRez`, `dataPocz`, `dataKonc` FROM rezerwacje_tbl WHERE `fk_autoID`=$auto_id";


	   $rezultat2 = mysql_query( $kwerenda2 );
	   
	    if ( $rezultat2 )
		{
		$ile_wierszy = mysql_num_rows( $rezultat2 );
		 if ( $ile_wierszy )
		 {
		 //debug:
		 //echo("<p class=\"akapit_wezszy\"><br />ile rezerwacji dla auta w bazie: $ile_wierszy<br />");
		 $ile = 0;
		  while ( $wynik2 = mysql_fetch_row( $rezultat2 ) )
		  {
		  $ile++;
		  $id_rezerwacji = $wynik2[0];
		  $data_rez = $wynik2[1];
		  $data_pocz = $wynik2[2];
		  $data_konc = $wynik2[3];
		  
		  if ( ( $data_koncowa < $data_pocz ) || ( $data_poczatkowa > $data_konc ) ) continue;
		   //? ma nic nie robic, tylko przejsc do nastepnego warunku
	      else 
		  { /*info ze nie mozna, bo zarezerwowane od row[0] do row[1] i break */ 
		  
		  //echo("<br />$ile. id_rez: $id_rezerwacji, data_rez: $data_rez, data_pocz: $data_pocz, data_konc: $data_konc<br />");
		  echo('<br />');
		  echo('<p class="login_klient" >');
		  echo("$ile. id_rez: $id_rezerwacji, data_rez: $data_rez, data_pocz: $data_pocz, data_konc: $data_konc <br />");
		  echo('</p>');
		  
		  }
//}
		  
		  $rezerwacja = false;
		  }
	 	 echo("</p>");
		 
		 } 	
 //$rezerwacja = true;
	    //$rezerwacja = false;  // !!!
		//znaleziono --> nie da się zarezerwawać
 	   
	   
	   
	    }
		else
		{
		//$blad = mysql_error( $rezultat2 ); 
		echo("<p class=\"akapit_wezszy\">".mysql_error()."</p>");
		$rezerwacja = true; // !!!
 //$rezerwacja = false;	
		//nie znaleziono pasujacych aut --> mozemy zazwolić na rezerwację
		
		}
		
			  
	   if ( $rezerwacja ) // debug_2
	   {
	   $osoba_id = $_SESSION['id']; 
	   echo("<br /><br /><h4>W podanym czasie rezerwacja auta<strong> $marka $model </strong>jest możliwa do zrealizowania.</h4>");
//	   echo("<br />");
	   echo('<table width="440" border="0" align="center" cellpadding="0" cellspacing="2" >');
 	   echo('<tr>');
	   echo('<td><h4>Czy na pewno zarezerwować w podanym terminie?</h4><br />');

	   echo('<form name="rezerwuj_auto2" action="./index.php" method="post" >');
       echo("<input type=\"hidden\" name=\"rezerwuj_2_auto_id\" value=\"$auto_id\" />");
       echo("<input type=\"hidden\" name=\"rezerwuj_2_osoba_id\" value=\"$osoba_id\" />");

       echo("<input type=\"hidden\" name=\"dzien_pocz2\" value=\"$dzien_poczatkowy\" />");
       echo("<input type=\"hidden\" name=\"miesiac_pocz2\" value=\"$miesiac_poczatkowy\" />");
       echo("<input type=\"hidden\" name=\"rok_pocz2\" value=\"$rok_poczatkowy\" />");
       echo("<input type=\"hidden\" name=\"dzien_kon2\" value=\"$dzien_koncowy\" />");
       echo("<input type=\"hidden\" name=\"miesiac_kon2\" value=\"$miesiac_koncowy\" />");
       echo("<input type=\"hidden\" name=\"rok_kon2\" value=\"$rok_koncowy\" />");
       echo("<input type=\"submit\" name=\"rezerwuj_2_auto\" value=\"Zatwierdź rezerwację\" class=\"przycisk1\" />");
	   echo("</form>");
	   echo("</td></tr>");
	   echo("</table>");
	   
	   echo("<br /><br />");
	   echo("<p class=\"akapit_prawy_wezszy\"><a href=\"./index.php?cid=$auto_id\">Powrót do wyboru auta i okresu rezerwacji</a></p>"); 
	   }
	   else
	   {
	   //pojazd w tym okresie jest zarezerwowany przez innego klienta
	   echo("<br /><br /><h4>Niestety rezerwacja auta $marka $model <span style=\"color: red\"> nie może być zrealizowana </span>. Auto w podanym czasie jest już zarezerwowane.</h4>");
      
	   echo('<br /><br />');
	   echo("<p class=\"akapit_prawy_wezszy\"><a href=\"./index.php?cid=$auto_id\">Powrót do wyboru auta i okresu rezerwacji</a></p>"); 
	   
       } //debug_2
 
      }
      else  // daty dobre więc można rezerwować
      {
      echo("<br /><br />");
      echo('<h4 style="color: red;">Nie można zarezerwować pojazdu, wprowadzono błędną datę!</h4>');      echo('<br />');
	  echo("<p class=\"akapit_prawy_wezszy\"><a href=\"./index.php?cid=$auto_id\">Powrót do wyboru auta i okresu rezerwacji</a></p>"); 
	   
	  } //dobre daty

	 unset( $rezerwacja, $data_poczatkowa_ok, $data_koncowa_ok, $ile );
     } 
	 else
	 {
	 echo('<h2 style="color: red;">Błędne dane, takie auto nie istnieje</h2>');
	 echo('<br />');
     } //if-end "id-pojazdu_formularz
    }
	else
    { 
    echo("<br />");
    echo("<h2>Brak praw do modyfikacji dla bieżącego użytkownika!</h2>");
    echo("<h3>Nie zmieniono zawartości w witrynie!</h3>");
    } // if-end "link od innego użytkownika"
   }  
   else
   {
   echo("<br />");
   echo("<h2>Brak praw do modyfikacji dla bieżącego użytkownika!</h2>");
   echo("<h3>Nie zmieniono zawartości w witrynie!</h3>");
   } // if-"uprawnienia-admina"
  }
  else
  {
  echo('<h3 style="color: red;">Musisz być zalogowany, aby wykonać tę czynność!</h3>');
  } //if-zalogowany-end
 } // end "sprawdzane rezerwacji"

//------------------------------------------------------------------------------------------------

      //zatwierdzanie rezerwacji!
 if ( ( isSet( $_POST['rezerwuj_2_auto_id'] ) ) && ( isSet( $_POST['rezerwuj_2_osoba_id'] ) ) )
 {
  if ( isSet( $_SESSION['zalogowany'] ) ) // czy osoba wywołujaca link jest zalogowana w serwisie?
  {
   if ( SprawdzUprawnieniaAdmina() ) // oprócz tego musi mieć uprawnienia administarcyjne
   {
    if ( $_POST['rezerwuj_2_osoba_id'] == $_SESSION['id'] )
	{
    $dzien_poczatkowy = $_POST['dzien_pocz2'];
    $miesiac_poczatkowy = $_POST['miesiac_pocz2'];
    $rok_poczatkowy = $_POST['rok_pocz2'];
 
    $dzien_koncowy = $_POST['dzien_kon2'];
    $miesiac_koncowy = $_POST['miesiac_kon2'];
    $rok_koncowy = $_POST['rok_kon2'];
   
    $auto_id = $_POST['rezerwuj_2_auto_id'];
    $osoba_id = $_POST['rezerwuj_2_osoba_id'];
   
    $data_poczatkowa_ludzka = $dzien_poczatkowy.".".$miesiac_poczatkowy.".".$rok_poczatkowy;
    $data_poczatkowa = $rok_poczatkowy."-".$miesiac_poczatkowy."-".$dzien_poczatkowy;

    $data_koncowa_ludzka = $dzien_koncowy.".".$miesiac_koncowy.".".$rok_koncowy;
    $data_koncowa = $rok_koncowy."-".$miesiac_koncowy."-".$dzien_koncowy;

    
	$data_teraz = date( "Y-m-d" );	//znów "d" nie "j" !!!
    $jest_blad = false;

     if ( $data_poczatkowa < $data_teraz )
	 {
	 echo("<br />bład: data początkowa rezeracji mniejsza od obecnej daty!"); 
     $jest_blad = true;
	 }
	 
	 if ( $data_poczatkowa < $data_teraz )
	 {
	 echo("<br />bład: data końcowa rezerwacji mniejsza od obecnej daty!"); 
	 $jest_blad = true;
	 }
	 
	 if (  $data_poczatkowa > $data_koncowa )
	 {
	 echo("<br />bład: data końcowa rezerwacji mniejsza od daty początkowej!"); 
	 $jest_blad = true;
	 }

    $kwerenda = "SELECT `model`, `markaID` FROM `auto_tbl` WHERE `ID`=$auto_id LIMIT 1"; 
	$rezultat = mysql_query( $kwerenda );
	 if ( $rezultat )
	 { //znaleziono auto w bazie
	 $wynik = mysql_fetch_row( $rezultat );
	 $model = $wynik[0];
	 $marka_id = $wynik[1];
	
	  $kwerenda2 = "SELECT marka FROM auto_marka_tbl WHERE ID=$marka_id LIMIT 1";
	  $rezultat2 = mysql_query( $kwerenda2 );
	  $wynik2 = mysql_fetch_row( $rezultat2 );
	  $marka = $wynik2[0]; 
	
      if ( ! $jest_blad )
      {

	   $rezerwacja = false;
	   //ID_rezerwacji 	fk_userID 	fk_autoID 	dataRez 	dataPocz 	dataKonc 	miejscePodstID 	miejsceZwrID 	uwagi
	   $kwerenda3 = "INSERT INTO rezerwacje_tbl SET `ID_rezerwacji`=NULL, `fk_userID`=$osoba_id, `fk_autoID`=$auto_id, `dataRez`='$data_teraz', `dataPocz`='$data_poczatkowa', `dataKonc`='$data_koncowa', `miejscePodstID`=2, `miejsceZwrID`=2, `uwagi`=NULL";


	   $rezultat3 = mysql_query( $kwerenda3 );
	   
	    if ( $rezultat3 )
		{
		$rezerwacja = true;
		} 
		else
		{
		echo mysql_error();
		$rezerwacja = false;
		}
		
			  
	   if ( $rezerwacja ) // debug_2
	   {
	   $osoba_id = $_SESSION['id']; 
	   echo("<br /><h3 style=\"color: red;\">Auto $marka $model zarezerwowano!</h3>");
	   echo("<br />");
	   }
	   else
	   {
	   //pojazd w tym okresie jest zzarezerwowany przez innego klienta
	   echo('<br /><h3 style="color: red;">Wystąpił bład!.</h3>');
	   echo('<br />');
	   } //debug_2
  
	  } //dobre daty

     } 
	 else
	 {
	 echo('<h2 style="color: red;">Błędne dane, takie auto nie istnieje</h2>');
	 echo('<br />');
     } //if-end "id-pojazdu_formularz
    }
	else
    { 
    echo("<br />");
    echo("<h2>Brak praw do modyfikacji dla bieżącego użytkownika!</h2>");
    echo("<h3>Nie zmieniono zawartości w witrynie!</h3>");
    } // if-end "link od innego użytkownika"
   }  
   else
   {
   echo("<br />");
   echo("<h2>Brak praw do modyfikacji dla bieżącego użytkownika!</h2>");
   echo("<h3>Nie zmieniono zawartości w witrynie!</h3>");
   } // if-"uprawnienia-admina"
  }
  else
  {
  echo('<h3 style="color: red;">Musisz być zalogowany, aby wykonać tę czynność!</h3>');
  } //if-zalogowany-end
 } // end "sprawdzane rezerwacji"

//-----------------------------------------------------------------------------------------------

  if ( ( isSet( $_POST['anuluj_rez'] ) ) && ( isSet( $_POST['anuluj_rosoba'] ) ) && ( isSet( $_POST['anuluj_rauto'] ) ) )
 {
  if ( isSet( $_SESSION['zalogowany'] ) ) // czy osoba wywołujaca link jest zalogowana w serwisie?
  {
   if ( SprawdzUprawnieniaAdmina() ) 
   {
    if ( $_SESSION['id'] == $_POST['anuluj_rosoba'] )
	{ 
	$nr_rezerwacji = $_POST['anuluj_rez'];
    $anuluj_auto = $_POST['anuluj_rauto'];
	$anuluj_osoba = $_POST['anuluj_rosoba'];
	
	/*echo("<br />\$nr_rezerwacji: $nr_rezerwacji<br /> \$anuluj_auto: \$anuluj_auto<br />
	\$anuluj_osoba: $anuluj_osoba");*/
	
    $kwerenda = "DELETE FROM `rezerwacje_tbl` WHERE `rezerwacje_tbl`.`ID_rezerwacji`=$nr_rezerwacji LIMIT 1";	
	
	$rezultat = mysql_query( $kwerenda );
	
	 if ( $rezultat )
	 {
	 echo("<h3 style=\"color: red;\">Usunięto rezerwację</h3>");
	 }
	 else
	 {
	 echo("<h3 style=\"color: red;\">Wystąpiły błędy:</h3>");
	 //echo mysql_error();
	 }
	
    }
   }  
   else
   {
   echo("<br />");
   echo("<h2>Brak praw do modyfikacji dla bieżącego użytkownika!</h2>");
   echo("<h3>Nie zmieniono zawartości w witrynie!</h3>");
   } // if-"uprawnienia-admina"
  }
  else
  {
  echo('<h3 style="color: red;">Musisz być zalogowany, aby wykonać tą czynność!</h3>');
  } //if-zalogowany-end
 } // end "sprawdzane rezerwacji" 
   	
	


?>