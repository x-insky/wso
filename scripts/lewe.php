<div class="sekcja_biala">Menu u�ytkownika</div>
<?php
 if ( isSet( $_SESSION['zalogowany'] ) )
 {
 //zr�b co� dla zalogowanego u�ytkownika
 echo("<br /><div align='center'>Jeste� zalogowany jako <b>");
 echo $_SESSION['zalogowany'];
 echo("</b></div><br />");
 //menu u�ytkownika
 include("./scripts/menu_uzytkownika.php"); 
 
 //tez wyloguj usera //a mo�e to poziom wy�ej, na r�wni z zewn. IF ?
  if ( isSet( $_POST['wylogowany'] ) )
  {
    // + mo�e co� jeszcze
  unset( $_SESSION['zalogowany'] );
  unset( $_SESSION['komunikat'] );
  //$_SESSION['zalogowany'] = "";
  //$_SESSION['komunikat'] = "Nie jeste� zalogowany";
  session_destroy();
  header("Location: ./index.php"); // !!!
  }

 }
 else
 {
 // gdy niezalogowany to sprawd� komunikat i daj formularz o logowania
 echo("<br /><div align='center'><b>");
  if ( isSet( $_SESSION['komunikat']) ) 
  {
  echo $_SESSION['komunikat'];
  }
  else
  {
  echo("Wprowad� nazw� u�ytkownika i has�o");
  }
 echo("</b></div><br />");
 //formularz logowania! 
 include('./scripts/logowanie.php');
 //require_once('./scripts/logowanie.php');
 }
 
  //a teraz sprawd� zawarto�� przes�anych p�l z formularza
 if ( isSet( $_POST["uzytkownik"] ) && isSet( $_POST["haslo"] ) )
 {  //gdy s� przes�ane oba pola
 $wartosc = SprawdzHaslo( $_POST["uzytkownik"], $_POST["haslo"] );
   if ( $wartosc == 0 ) //haslo i uzytkownik zgodne
   {
   $_SESSION['zalogowany'] = $_POST["uzytkownik"];
   //$_SESSION['komunikat'] = "";
   unset( $_SESSION['komunikat'] );
   header("Location: ./index.php"); // !!!
   }
   if ( $wartosc == 1 )
   {
   $_SESSION['komunikat'] = "B��d serwera. Zalogowanie nie by�o mo�liwe.";
   //header("Location: ./index.php");

   //include("form_v2.php");
   }
    //else
   if ($wartosc == 2 )
   {
   $_SESSION['komunikat'] = "Nieprawid�owa nazwa lub has�o u�ytkownika";
   //include("form_v2.php");
   //header("Location: ./index.php");
   }
   else
   {
   $_SESSION['komunikat'] = "B��d serwera. Zalogowanie nie by�o mo�liwe";
   //include("form_v2.php");
   //header("Location: ./index.php");
   } 
 }
 else
 {
 // ?
 }
 
?>