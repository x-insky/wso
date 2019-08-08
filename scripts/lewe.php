<div class="sekcja_biala">Menu u¿ytkownika</div>
<?php
 if ( isSet( $_SESSION['zalogowany'] ) )
 {
 //zrób co¶ dla zalogowanego u¿ytkownika
  switch ( $_SESSION['rola'] )
  { 
  case "pracownik":
    echo("<p class='login_pracownik'>Jeste¶ zalogowany jako <b>");
   break;
  case "administrator":
    echo("<p class='login_admin'>Jeste¶ zalogowany jako <b>");
   break;  
  default:
    echo("<p class='login_klient'>Jeste¶ zalogowany jako <br /><b>");
   break;
  }
 echo $_SESSION['imie']; echo "&nbsp;"; echo $_SESSION['nazwisko'];
 echo "</b><br />";
 echo ("rola: <b>");
 echo $_SESSION['rola'];
 echo("</b></p>");
 //menu u¿ytkownika
 include("./scripts/menu_uzytkownika.php"); 
 
 //tez wyloguj usera //a mo¿e to poziom wy¿ej, na równi z zewn. IF ?
  if ( isSet( $_POST['wylogowany'] ) )
  {
    // + mo¿e co¶ jeszcze
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
  //$_SESSION['komunikat'] = "Nie jeste¶ zalogowany";
  session_destroy();
  @header("Location: ./index.php"); // !!!
  }

 }
 else
 {
 // gdy niezalogowany to sprawd¼ komunikat i daj formularz o logowania
 echo("<br /><div align='center'><b>");
  if ( isSet( $_SESSION['komunikat']) ) 
  {
  echo $_SESSION['komunikat'];
  }
  else
  {
  echo("Wprowad¼ nazwê u¿ytkownika i has³o");
  }
 echo("</b></div><br />");
 //formularz logowania! 
 include('./scripts/logowanie.php');
 //require_once('./scripts/logowanie.php');
 
 // + rejestracja +
 echo('<br />');
 echo('<p class="akapit_srodek_wezszy"><a href="./index.php?link=register">Za³ó¿ konto</a></p>');
 }
 
  //a teraz sprawd¼ zawarto¶æ przes³anych pól z formularza
 if ( isSet( $_POST["uzytkownik"] ) && isSet( $_POST["haslo"] ) )
 {  //gdy s± przes³ane oba pola
 $wartosc = SprawdzHasloDB( $_POST["uzytkownik"], $_POST["haslo"] );
   if ( $wartosc == 0 ) //haslo i uzytkownik zgodne
   {
   $_SESSION['zalogowany'] = $_POST['uzytkownik'];
   $zalogowany = $_POST['uzytkownik'];
   //odczytanie pozosta³ych danych u¿ytkownika i zapis ich do zmiennych sesji 
   $kwerenda = "SELECT id, imie, nazwisko, email, rolaID, nazwaFirmyID, dataRejestracji, godzinaRejestracji FROM user_tbl WHERE login='$zalogowany'";
   $rezultat = mysql_query( $kwerenda );
    if ( ! $rezultat )
    {
	echo("B³êdy w po³±czeniu z baz± danych! [1]"); 
    exit(1);
    }
    if ( mysql_num_rows( $rezultat ) == 1 )	//¿e znaleziono jeden pasuj±cy
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
	
	
   //$zmienna = $_SESSION['id'];    //wyci±ganie nazwy roli w serwisie
   $kwerenda = "SELECT `rolaNazwa` FROM `userrole_tbl` WHERE `id`=$zmienna2";
   $rezultat = mysql_query( $kwerenda );
    if ( ! $rezultat )
    {
	echo("B³êdy w po³aczeniu z baz± danych! [2]"); 
    //exit(1);  //// ****
    }
    if ( mysql_num_rows( $rezultat ) == 1 )	//¿e znaleziono jeden pasuj±cy
    {
    $wynik = mysql_fetch_row( $rezultat );   
    $_SESSION['rola'] = $wynik[0];
    } // if-poprawny odczyt bazy

   $zmienna = $_SESSION['id'];    //wyci±ganie nazwy roli w serwisie
   $kwerenda = "SELECT nazwaFirmy FROM firma_tbl WHERE ID=$zmienna3";
   $rezultat = mysql_query( $kwerenda );
    if ( ! $rezultat ) //mo¿e byæ pominiêta nazwa
    {
	//echo("B³êdy w po³±czeniu z baz± danych! [3]"); 
    //exit(1);
    $_SESSION['firma'] = "";
	}
	else
	{
     if ( mysql_num_rows( $rezultat ) == 1 )	//¿e znaleziono jeden pasuj±cy
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
   $_SESSION['komunikat'] = "B³±d serwera. Zalogowanie nie by³o mo¿liwe.";
   //header("Location: ./index.php");

   //include("form_v2.php");
   }
    //else
   if ($wartosc == 2 )
   {
   $_SESSION['komunikat'] = "Nieprawid³owa nazwa lub has³o u¿ytkownika";
   //include("form_v2.php");
   @header("Location: ./index.php");
   }
/*   else
   {
   $_SESSION['komunikat'] = "B³±d serwera. Zalogowanie nie by³o mo¿liwe";
   //include("form_v2.php");
   //header("Location: ./index.php");
   }   */
   	//blokada konta
   if ($wartosc == 3 )
   {
   $_SESSION['komunikat'] = "Twoje konto jest zablokowane. Skontaktuj siê z adminem serwisu";
   //include("form_v2.php");
   @session_start();
   @header("Location: ./index.php");
   }
/*   else
   {
   $_SESSION['komunikat'] = "B³±d serwera. Zalogowanie nie by³o mo¿liwe";
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

 <table width="180" border = "0" align="center" cellpadding="0" cellspacing="0">
 <tr>
  <td>Wyra¿enie</td>
 </tr>
 <tr>
  <td><input type="text" name="szukaj" size="30" class="formularz1" /></td>
 </tr>
 <tr>
  <td><input type = "submit" value="Znajd¼" class="przycisk1" /></td>
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
