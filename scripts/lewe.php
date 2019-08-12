<div class="sekcja_biala">Menu użytkownika</div>
<?php
 if ( isSet( $_SESSION['zalogowany'] ) )
 {
 //zrób coś dla zalogowanego użytkownika
  switch ( $_SESSION['rola'] )
  { 
  case "pracownik":
    echo("<p class='login_pracownik'>Jesteś zalogowany jako <b>");
   break;
  case "administrator":
    echo("<p class='login_admin'>Jesteś zalogowany jako <b>");
   break;  
  default:
    echo("<p class='login_klient'>Jesteś zalogowany jako <br /><b>");
   break;
  }
 echo $_SESSION['imie']; echo "&nbsp;"; echo $_SESSION['nazwisko'];
 echo "</b><br />";
 echo ("rola: <b>");
 echo $_SESSION['rola'];
 echo("</b></p>");
 //menu użytkownika
 include("./scripts/menu_uzytkownika.php"); 
 
 //tez wyloguj usera //a może to poziom wyżej, na równi z zewn. IF ?
  if ( isSet( $_POST['wylogowany'] ) )
  {
    // + może coś jeszcze
  unset( $_SESSION['zalogowany'] );
  unset( $_SESSION['komunikat'] );
  
  unset( $_SESSION['id']);
  unset( $_SESSION['imie']);
  unset( $_SESSION['nazwisko']);
  unset( $_SESSION['email']);
  unset( $_SESSION['rola']);
  unset( $_SESSION['firma']);
  unset( $_SESSION['data_rej']);
  unset( $_SESSION['godz_rej']);
  unset( $_SESSION['id']);
  
  //$_SESSION['zalogowany'] = "";
  //$_SESSION['komunikat'] = "Nie jesteś zalogowany";
  session_destroy();
  @header("Location: ./index.php"); // !!!
  }

 }
 else
 {
 // gdy niezalogowany to sprawdĽ komunikat i daj formularz o logowania
 echo("<br /><div align='center'><b>");
  if ( isSet( $_SESSION['komunikat']) ) 
  {
  echo $_SESSION['komunikat'];
  }
  else
  {
  echo("Wprowadź nazwę użytkownika i hasło");
  }
 echo("</b></div><br />");
 //formularz logowania! 
 include('./scripts/logowanie.php');
 //require_once('./scripts/logowanie.php');
 
 // + rejestracja +
 echo('<br />');
 echo('<p class="akapit_srodek_wezszy"><a href="./index.php?link=register">Załóż konto</a></p>');
 }
 
  //a teraz sprawdĽ zawartość przesłanych pól z formularza
 if ( isSet( $_POST["uzytkownik"] ) && isSet( $_POST["haslo"] ) )
 {  //gdy są przesłane oba pola
 $wartosc = SprawdzHasloDB( $_POST["uzytkownik"], $_POST["haslo"] );
   if ( $wartosc == 0 ) //haslo i uzytkownik zgodne
   {
   $_SESSION['zalogowany'] = $_POST['uzytkownik'];
   $zalogowany = $_POST['uzytkownik'];
   //odczytanie pozostałych danych użytkownika i zapis ich do zmiennych sesji 
   $kwerenda = "SELECT id, imie, nazwisko, email, rolaID, nazwaFirmyID, dataRejestracji, godzinaRejestracji FROM user_tbl WHERE login='$zalogowany'";
   $rezultat = mysql_query( $kwerenda );
    if ( ! $rezultat )
    {
	echo("Błędy w połączeniu z bazą danych! [1]"); 
    exit(1);
    }
    if ( mysql_num_rows( $rezultat ) == 1 )	//że znaleziono jeden pasujący
    {
    $wynik = mysql_fetch_row( $rezultat );   
    $_SESSION['id'] = $wynik[0];
    $_SESSION['imie'] = $wynik[1];
    $_SESSION['nazwisko'] = $wynik[2];
    $_SESSION['email'] = $wynik[3];
	$zmienna2 = $wynik[4]; 				//  <--- rola_id!
	$zmienna3 = $wynik[5];				// <--- nazwa_firmy_id!
    $_SESSION['data_rej'] = $wynik[6];
    $_SESSION['godz_rej'] = $wynik[7];
    } // if-poprawny odczyt bazy
	
	
   //$zmienna = $_SESSION['id'];    //wyciąganie nazwy roli w serwisie
   $kwerenda = "SELECT `rolaNazwa` FROM `userrole_tbl` WHERE `id`=$zmienna2";
   $rezultat = mysql_query( $kwerenda );
    if ( ! $rezultat )
    {
	echo("Błędy w połaczeniu z bazą danych! [2]"); 
    //exit(1);  //// ****
    }
    if ( mysql_num_rows( $rezultat ) == 1 )	//że znaleziono jeden pasujący
    {
    $wynik = mysql_fetch_row( $rezultat );   
    $_SESSION['rola'] = $wynik[0];
    } // if-poprawny odczyt bazy

   $zmienna = $_SESSION['id'];    //wyciąganie nazwy roli w serwisie
   $kwerenda = "SELECT nazwaFirmy FROM firma_tbl WHERE ID=$zmienna3";
   $rezultat = mysql_query( $kwerenda );
    if ( ! $rezultat ) //może być pominięta nazwa
    {
	//echo("Błędy w połączeniu z bazą danych! [3]"); 
    //exit(1);
    $_SESSION['firma'] = "";
	}
	else
	{
     if ( mysql_num_rows( $rezultat ) == 1 )	//że znaleziono jeden pasujący
     {
     $wynik = mysql_fetch_row( $rezultat );
     //echo("<br />nazwa firmy: $wynik[0] !!!");

	 //if (  $wynik[0]=NULL   
    $_SESSION['firma'] = $wynik[0];
     } // if-poprawny odczyt bazy  
    }
   
   //$_SESSION['komunikat'] = "";
   unset( $_SESSION['komunikat'] );
   session_start(); /// ??????
   @header("Location: ./index.php"); // !!!
   }

   
   if ( $wartosc == 1 )
   {
   $_SESSION['komunikat'] = "Błąd serwera. Zalogowanie nie było możliwe.";
   //header("Location: ./index.php");

   //include("form_v2.php");
   }
    //else
   if ($wartosc == 2 )
   {
   $_SESSION['komunikat'] = "Nieprawidłowa nazwa lub hasło użytkownika";
   //include("form_v2.php");
   @header("Location: ./index.php");
   }
/*   else
   {
   $_SESSION['komunikat'] = "Błąd serwera. Zalogowanie nie było możliwe";
   //include("form_v2.php");
   //header("Location: ./index.php");
   }   */
   	//blokada konta
   if ($wartosc == 3 )
   {
   $_SESSION['komunikat'] = "Twoje konto jest zablokowane. Skontaktuj się z adminem serwisu";
   //include("form_v2.php");
   @session_start();
   @header("Location: ./index.php");
   }
/*   else
   {
   $_SESSION['komunikat'] = "Błąd serwera. Zalogowanie nie było możliwe";
   //include("form_v2.php");
   //header("Location: ./index.php");
   }  */
 }
 else
 {
 // ?
 }

?>
<br />
<!-- <br /> -->

<div class="sekcja_biala">Szukaj samochodu</div>

<form name = "wyszukaj" action = "./index.php" method = "post" style="align: center;" >

 <table width="180" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
  <td>Wyrażenie</td>
 </tr>
 <tr>
  <td><input type="text" name="szukaj" size="30" class="formularz1" /></td>
 </tr>
 <tr>
  <td><input type = "submit" value="Znajdź" class="przycisk1" /></td>
 </tr>
 <tr>
  <td>
   <div class="tekst_margines">
<!--  <a href="./index.php?link=szukaj2">Wyszukiwanie zaawansowane</a> -->
   </div>
  </td> 
 </tr>
 </table>

</form> 
